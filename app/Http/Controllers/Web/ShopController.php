<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ShopInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __construct(protected ShopInterface $shopRepo){

    }

    public function index(Request $request)
    {
        $products = $this->shopRepo->index($request);
        $categories = $this->shopRepo->getShopCategories();
        $colors = $this->shopRepo->getColors();
        // return $colors;
        return view('web.shop', compact('products', 'categories', 'colors'));
    }

}


