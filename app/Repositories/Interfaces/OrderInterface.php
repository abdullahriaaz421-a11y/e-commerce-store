<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface OrderInterface
{
    public function index(Request $request);

    public function ordertDetail($orderNumber);

    public function export();
}
