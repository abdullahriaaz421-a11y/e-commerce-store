<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Repositories\Services\CheckoutService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Cart;

class CheckoutController extends Controller
{
    public function __construct(private CheckoutService $checkoutRepo)
    {
       
    }
    public function index(){
        return view('web.checkout');
    }

    public function store(CheckoutRequest $request)
    {
        // return $request;
        return $this->checkoutRepo->createOrder($request);
    }

    public function thankYou(Order $order)
    {
        $orderDetails = OrderDetail::where('order_id', $order->id)
        ->get();
        // return $orderDatails;
        // return $order;
        return view('thankyou', compact('order', 'orderDetails'));
    }
}
