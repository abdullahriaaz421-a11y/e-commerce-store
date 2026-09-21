<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Interfaces\OrderInterface;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(private OrderInterface $orderRepo)
    {
        
    }
    public function index(Request $request)
    {
       return $this->orderRepo->index($request);
    }
}
