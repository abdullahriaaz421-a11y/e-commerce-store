<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProductInterface;

class ProductController extends Controller
{
    public function __construct(private ProductInterface $productRepo) {}

    public function getProductDetail($slug)
    {
        $product = $this->productRepo->getProductDetail($slug);
        $relatedProducts = $this->productRepo->getRelatedProducts($product->category_id, $product->id);
        return view('web.product-detail', compact('product', 'relatedProducts'));
    }
}
