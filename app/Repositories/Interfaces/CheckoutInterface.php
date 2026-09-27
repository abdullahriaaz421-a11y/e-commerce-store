<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\CheckoutRequest;

interface CheckoutInterface
{
    public function createOrder(array $data);
}
