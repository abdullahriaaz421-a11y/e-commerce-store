<?php

namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

interface ShopInterface
{
    public function index(Request $request);

    public function getShopCategories();

    public function getColors();
}
