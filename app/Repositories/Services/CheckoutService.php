<?php

namespace App\Repositories\Services;

use Illuminate\Support\Str;
use App\Enums\OrderStatusEnum;
use App\Events\OrderCreatedEvent;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatues;
use App\Models\TransactionHistories;
use App\Models\User;
use App\Notifications\OrderNotification;
use App\Repositories\Interfaces\CheckoutInterface;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Stripe;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use Throwable;

class CheckoutService implements CheckoutInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function createOrder(array $data)
    {
        abort_if(Auth::check() && Auth::user()->roll == 'admin', 401, 'Admin cannot Access to this page.');

        $items = Cart::getContent();
        abort_if($items->isEmpty(), 422, 'Your Cart is empty.');

        $cartTotal  = Cart::getTotal();
        $shipping   = 300;
        $totalPrice = $cartTotal + $shipping;

        $orderNumber = $this->generateOrderNumber();
        $paymentIntent = null;
        $paymentMethod = null;

        // Stripe Payment
        if ($data['payment_method'] === 'stripe') {
            Stripe\Stripe::setApiKey(config('services.stripe.secret'));
            try {
                $paymentIntent = PaymentIntent::create([
                    'amount' => (int) ($totalPrice * 100),
                    'currency' => 'usd',
                    'payment_method_data' => [
                        'type' => 'card',
                        'card' => [
                            'token' => $data['stripe_token'],
                        ],
                    ],
                    'automatic_payment_methods' => [
                        'enabled' => true,
                        'allow_redirects' => 'never',
                    ],
                    'confirm' => true,
                    'description' => 'Order Payment for Order #' . $orderNumber,
                ]);

                if ($paymentIntent->status !== 'succeeded') {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with(
                            'error',
                            'Stripe payment was not completed.'
                        );
                }

                $paymentMethod = PaymentMethod::retrieve(
                    $paymentIntent->payment_method
                );
            } catch (Throwable $e) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Stripe payment failed: ' . $e->getMessage()
                    );
            }
        }

        // Paypal Payment
        if ($data['payment_method'] === 'paypal') {
            $provider = new PayPalClient();
            $provider->setApiCredentials(config('paypal'));
            $provider->getAccessToken();
            // PayPal ke liye order data session mein save karo
            session([
                'paypal_order_data' => $data,
                'paypal_order_number' => $orderNumber,
                'paypal_total_price' => $totalPrice,
            ]);
            $paypalData = [
                'intent' => 'CAPTURE',
                'application_context' => [
                    'return_url' => route('web.paypal-payment.success'),
                    'cancel_url' => route('web.paypal-payment.cancel'),
                ],
                'purchase_units' => [
                    [
                        'reference_id' => $orderNumber,
                        'description' => 'Order Payment for Order #' . $orderNumber,
                        'amount' => [
                            'currency_code' => 'USD',
                            'value' => number_format($totalPrice, 2, '.', ''),
                        ],
                    ],
                ],
            ];
            try {
                $paypalOrder = $provider->createOrder($paypalData);
                if (!isset($paypalOrder['id']) || !isset($paypalOrder['links'])) 
                    {
                        return redirect()->back()->withInput()->with('error', 'Unable to create PayPal payment.');
                    }

                $approveLink = collect($paypalOrder['links'])->firstWhere('rel', 'approve');

                if (!$approveLink) {
                    return redirect()->back()->withInput()->with('error', 'PayPal approval link not found.');
                }

                // PayPal Order ID save
                session([
                    'paypal_order_id' => $paypalOrder['id'],
                ]);

                return redirect()->away($approveLink['href']);
            } catch (Throwable $e) {
                return redirect()->back()->withInput()->with('error','PayPal payment failed: ' . $e->getMessage());
            }
        }

        // Order Create
        DB::beginTransaction();
        try {

            // Orders
            $order = Order::create([
                'order_number'   => $orderNumber,
                'user_id'        => Auth::id() ?? null,
                'fname'          => $data['first_name'],
                'lname'          => $data['last_name'],
                'email'          => $data['email'],
                'phone'          => $data['phone'],
                'country'        => $data['country'],
                'city'           => $data['city'],
                'state'          => $data['state'],
                'street'         => $data['street'],
                'postal_code'    => $data['postal_code'],
                'note'           => $data['note'],
                'total_price'    => $totalPrice,
                'status'         => OrderStatusEnum::CONFIRMED,
                'payment_method' => $data['payment_method'],
            ]);

            // Order Statuses
            OrderStatues::create([
                'order_number' => $orderNumber,
                'status'       => OrderStatusEnum::CONFIRMED,
            ]);

            // transaction History
            if ($paymentIntent && $paymentMethod) {
                TransactionHistories::create([
                    'order_id' => $order->id,
                    'card_type' => $paymentMethod->card->brand ?? null,
                    'card_last4' => $paymentMethod->card->last4 ?? null,
                    'txn_id' => $paymentIntent->id,
                    'amount' =>  $totalPrice,
                    'status'     => $paymentIntent->status,
                    'currency'   => $paymentIntent->currency,
                ]);
            }


            // Order Details
            foreach ($items as $item) {
                OrderDetail::create([
                    'order_id'    => $order->id,
                    'product_id'  => $item->id,
                    'qty'         => $item->quantity,
                    'total_price' => $item->getPriceSum(),
                ]);
            }
            DB::commit();

            // Admin Notification
            $admin = User::where('roll', 'admin')->first();
            if ($admin) {
                $admin->notify(
                    new OrderNotification(
                        "New order #{$order->order_number} has been placed by {$order['fname']} {$order['lname']}.",
                    ),
                );
            }

            // Event
            event(
                new OrderCreatedEvent($order),
            );

            // Emails
            Mail::to($data['email'])->send(new OrderMail($order));
            Mail::to(config('mail.admin_address'))->send(new OrderMail($order));

            // Clear Cart
            Cart::clear();

            // Thank You
            return redirect()->route('web.thankyou', ['order' => $order->order_number])
                ->with('success', 'Your order has been placed successfully!');
        } catch (\Throwable $e) {
            DB::rollBack();
            // return $e->getMessage();
            return redirect()->back()->withInput()->with('error', 'Something went wrong while placing your order.');
        }
    }

    private function generateOrderNumber(): string
    {
        do {
            $number = 'TB-' . now()->format('ymd') . '-' . strtoupper(Str::random(5));
        } while (Order::query()->where('order_number', $number)->exists());

        return $number;
    }
}
