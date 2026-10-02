<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class InvoiceController extends Controller
{
    public function index($orderId)
    {
        $order = Order::with('details.product')
            ->where('order_number', $orderId)
            ->firstOrFail();

        // return $order;
        return view('order-invoice', compact('order'));
    }
}
