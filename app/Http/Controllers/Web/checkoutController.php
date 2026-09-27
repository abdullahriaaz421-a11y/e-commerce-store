<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use App\Repositories\Interfaces\CheckoutInterface;

class CheckoutController extends Controller
{
    public function __construct(private CheckoutInterface $checkoutRepo) {}

    public function index()
    {
        return view('web.checkout');
    }

    public function store(CheckoutRequest $request)
    {
        // return $request->all();
        return $this->checkoutRepo->createOrder($request->validated());
    }

    public function thankYou($orderNumber)
    {
        $order = Order::with([ 'details.product.images' ])->where('order_number', $orderNumber)->firstOrFail();
        return view('web.thankyou', compact('order'));
    }
}
