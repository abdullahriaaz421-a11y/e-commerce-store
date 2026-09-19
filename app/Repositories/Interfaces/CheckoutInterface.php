<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\CheckoutRequest;
use App\Models\Order;

interface CheckoutInterface
{
    public function createOrder(CheckoutRequest $request);
}
