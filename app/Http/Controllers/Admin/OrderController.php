<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\OrderInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(private OrderInterface $orderRepo) {}

    public function index(Request $request)
    {
        return $this->orderRepo->index($request);
    }

    public function ordertDetail($orderNumber){
        return $this->orderRepo->ordertDetail($orderNumber);
    }

    public function export(){
        return $this->orderRepo->export();
    }
}
