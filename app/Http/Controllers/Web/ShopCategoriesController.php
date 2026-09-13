<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProductInterface;

class ShopCategoriesController extends Controller
{
    public function __construct(private ProductInterface $productRepo) {}

    public function shopByCategories($slug)
    {
        $products = $this->productRepo->getShopCategoryProducts($slug);
        return view('web.shop-by-categories', compact('products'));
    }
}
