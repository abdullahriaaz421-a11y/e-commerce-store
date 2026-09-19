<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\CartRequest;

interface CartInterface
{
    public function addToCart(CartRequest $request, $slug);
    public function updateCart(CartRequest $request);
    public function remove(string $id);
}
