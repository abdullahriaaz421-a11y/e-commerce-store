<?php
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Enums\OrderStatusEnum;
use App\Events\OrderCreatedEvent;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatues;
use App\Models\TransactionHistories;
use App\Models\User;
use App\Notifications\OrderNotification;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Throwable;

class StripeController extends Controller
{
    public function stripePaymentSuccess(Request $request)
    {
        $request->validate([
            'session_id' => 'required|string',
        ]);

        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

        try {
            // Stripe Checkout Session retrieve
            $session = $stripe->checkout->sessions->retrieve($request->session_id);
            // Payment verify
            if ($session->payment_status !== 'paid') {
                return redirect()->route('web.stripe-payment.cancel')->with('error', 'Stripe payment was not completed.');
            }

            // checkout data from Session
            $data = session('stripe_order_data');
            $orderNumber = session('stripe_order_number');
            $totalPrice = session('stripe_total_price');

            if (!$data || !$orderNumber || !$totalPrice) {
                return redirect()->route('web.checkout')->with('error', 'Order session expired. Please try again.');
            }

            // Duplicate order protection
            $existingOrder = Order::where('order_number',$orderNumber)->first();

            if ($existingOrder) {
                session()->forget(['stripe_order_data','stripe_order_number','stripe_total_price',]);

                Cart::clear();

                return redirect()->route('web.thankyou',['order' => $existingOrder->order_number]);
            }

            DB::beginTransaction();
            // Create Order
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
                'payment_method' => 'stripe',
            ]);

            // Order Status
            OrderStatues::create([
                'order_number' => $orderNumber,
                'status'       => OrderStatusEnum::CONFIRMED,
            ]);

            // Transaction History
            TransactionHistories::create([
                'order_id' => $order->id,
                'card_type' => null,
                'card_last4' => null,
                'txn_id' => $session->payment_intent,
                'amount' => $totalPrice,
                'status' => $session->payment_status,
                'currency' => $session->currency,
            ]);

            // Order Details
            $items = Cart::getContent();

            foreach ($items as $item) {

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'qty' => $item->quantity,
                    'total_price' => $item->getPriceSum(),
                ]);
            }

            DB::commit();

            // Admin notification
            $admin = User::where('roll', 'admin')->first();

            if ($admin) {
                $admin->notify(
                    new OrderNotification(
                        "New order #{$order->order_number} has been placed by {$order->fname} {$order->lname}."
                    )
                );
            }

            // Event
            event(
                new OrderCreatedEvent($order)
            );

            // Emails
            Mail::to($data['email'])->send(new OrderMail($order));

            Mail::to(config('mail.admin_address'))->send(new OrderMail($order));

            // Clear cart
            Cart::clear();

            // Clear Stripe session data
            session()->forget([
                'stripe_order_data',
                'stripe_order_number',
                'stripe_total_price',
            ]);

            // Thank You
            return redirect()->route('web.thankyou', ['order' => $order->order_number])
                ->with('success','Stripe payment successful and your order has been placed.');

        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('web.checkout')
                ->with('error','Something went wrong after Stripe payment: '. $e->getMessage());
        }
    }


    public function stripePaymentCancel()
    {
        return redirect()->route('web.checkout')->with('error','Stripe payment was cancelled.');
    }
}