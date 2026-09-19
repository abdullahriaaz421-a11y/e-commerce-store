<?php

namespace App\Repositories\Interfaces;

use App\Models\Product;

interface ProductInterface
{
    public function allCategories();

    public function getAllColors();

    public function getAllPaginatedProducts();

    public function getShopCategoryProducts($slug);

    public function getHomeProducts();

    public function getProductDetail($slug);

    public function getRelatedProducts($categoryId, $productId);

    public function createProduct(array $data);

    public function updateProduct(Product $product, array $data);

    public function deleteProduct(Product $product);
}
