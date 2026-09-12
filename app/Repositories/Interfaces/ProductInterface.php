<?php

namespace App\Repositories\Interfaces;

use App\Models\Product;

interface ProductInterface
{
    public function allCategories();

    public function getAllPaginatedProducts();

    public function getShopCategoryProducts($slug);

    public function getHomeProducts();

    public function getProductDetail($slug);

    public function getRelatedProducts($categoryId, $productId);

    public function createProduct(array $data);

    public function deletProduct(Product $product);
}
