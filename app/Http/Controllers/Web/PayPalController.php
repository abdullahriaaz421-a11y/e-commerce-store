<?php
namespace App\Http\Controllers\Web;

use App\Enums\OrderStatusEnum;
use App\Events\OrderCreatedEvent;
use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\TransactionHistories;
use App\Models\User;
use App\Notifications\OrderNotification;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Throwable;

class PayPalController extends Controller
{
    public function paypalSuccess(Request $request)
    {
        $token = $request->token;

        if (!$token) {
            return redirect()->route('web.checkout')->with('error', 'PayPal payment token is missing.');
        }

        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        try {
            // PayPal payment capture
            $paypalOrder = $provider->capturePaymentOrder($token);
            if (!isset($paypalOrder['status']) || $paypalOrder['status'] !== 'COMPLETED') 
            {
                return redirect()->route('web.checkout')->with('error', 'PayPal payment was not completed.');
            }

            // Checkout data session se nikalo
            $data = session('paypal_order_data');
            $orderNumber = session('paypal_order_number');
            $totalPrice = session('paypal_total_price');

            if (!$data || !$orderNumber || !$totalPrice) {
                return redirect()->route('web.checkout')->with('error','Checkout session expired. Please place your order again.');
            }

            // Cart
            $items = Cart::getContent();
            if ($items->isEmpty()) 
            {
                return redirect()->route('web.checkout')->with('error', 'Your cart is empty.');
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
                'payment_method' => 'paypal',
            ]);

            // Transaction History
            TransactionHistories::create([
                'order_id' => $order->id,

                'card_type' => null,
                'card_last4' => null,

                // PayPal transaction/capture ID
                'txn_id' => $paypalOrder['id'] ?? $token,
                'amount' =>  $totalPrice,
                'status' => $paypalOrder['status'],
                'currency' => 'USD',
            ]);

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
                        "New order #{$order->order_number} has been placed by {$order->fname} {$order->lname}."
                    )
                );
            }
            // Event
            event(
                new OrderCreatedEvent($order)
            );

            // Customer Email
            Mail::to($data['email'])->send(new OrderMail($order));

            // Admin Email
            Mail::to(config('mail.admin_address'))->send(new OrderMail($order));

            // Cart Clear
            Cart::clear();

            // PayPal session data clear
            session()->forget([
                'paypal_order_data',
                'paypal_order_number',
                'paypal_total_price',
                'paypal_order_id',
            ]);

            // Thank You
            return redirect()->route('web.thankyou', ['order' => $order->order_number])
                ->with('success','PayPal payment completed and your order has been placed successfully!');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route('web.checkout')
            ->with('error','Something went wrong while processing your PayPal payment: '. $e->getMessage());
        }
    }

    public function paypalCancel()
    {
        // PayPal cancel hone par session data remove
        session()->forget([
            'paypal_order_data',
            'paypal_order_number',
            'paypal_total_price',
            'paypal_order_id',
        ]);

        return view('web.paypal-cancel');
    }
}
