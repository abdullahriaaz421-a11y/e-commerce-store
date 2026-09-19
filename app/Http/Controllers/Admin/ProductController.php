<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\Interfaces\ProductInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private ProductInterface $productRepo) {}

    public function index()
    {
        $products = $this->productRepo->getAllPaginatedProducts();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->productRepo->allCategories();
        $colors = $this->productRepo->getAllColors();
        return view('admin.products.create', compact('categories', 'colors'));
    }

    public function store(ProductRequest $request)
    {
        return $this->productRepo->createProduct($request->validated());
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Product $product)
    {
        $categories = $this->productRepo->allCategories();
        $colors = $this->productRepo->getAllColors();
        return view('admin.products.edit', compact('product', 'categories', 'colors'));
    }

    public function update(ProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        return $this->productRepo->updateProduct($product, $request->validated());
    }

    public function destroy(Product $product)
    {
        return $this->productRepo->deleteProduct($product);
    }
}
