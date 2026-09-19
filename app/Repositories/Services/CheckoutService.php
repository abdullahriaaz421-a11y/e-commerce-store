<?php

namespace App\Repositories\Services;

use App\Events\OrderCreatedEvent;
use App\Http\Requests\CheckoutRequest;
use App\Repositories\Interfaces\CheckoutInterface;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Cart;

class CheckoutService implements CheckoutInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function createOrder(CheckoutRequest $request)
    {
        // return $request;
        $items = Cart::getContent();

        // return $items;
        if ($items->isEmpty()) {
            return redirect()
                ->back()
                ->with('error', 'Your cart is empty.');
        }

        DB::beginTransaction();

        try {

            $cartTotal = Cart::getTotal();
            $shipping = 300;
            $totalPrice = $cartTotal + $shipping;

            // Entry in Order Table
            $order = Order::create([
                'order_number' => rand(10000, 99999),
                'user_id' => Auth::id(),
                // 'user_id' => 5,
                'fname' => $request->first_name,
                'lname' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country,
                'city' => $request->city,
                'state' => $request->state,
                'street' => $request->street,
                'postal_code' => $request->postal_code,
                'note' => $request->note,
                'total_price' => $totalPrice,
                // 'payment_method' => $request->payment_method,
                'status' => 'pending',
            ]);

            // Entry in Order Details Table
            foreach ($items as $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'qty' => $item->quantity,
                    'total_price' => $item->getPriceSum(),
                ]);
            }

            DB::commit();

            event(new OrderCreatedEvent($order));

            Mail::to($request->email)->send(new OrderMail($order));

            Mail::to(config('mail.admin_address'))->send(new OrderMail($order));
            
            
            Cart::clear();

            return redirect()
            ->route('web.thankyou', ['order' => $order->id])
            ->with('success', 'Your order has been placed successfully!');

        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Something went wrong while placing your order.');
        }
    }
}
