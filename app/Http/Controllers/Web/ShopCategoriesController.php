<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProductInterface;

class ShopCategoriesController extends Controller
{
    public function __construct(private ProductInterface $productRepo) {}

    public function shopByCategories($slug)
    {
        // return $slug;
        $products = $this->productRepo->getShopCategoryProducts($slug);
        // return $products;
        return view('website.shop-by-categories', compact('products'));
    }
}
