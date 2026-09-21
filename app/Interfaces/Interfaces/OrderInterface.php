<?php

namespace App\Interfaces\Interfaces;

use Illuminate\Http\Request;

interface OrderInterface
{
    public function index(Request $request);
}
