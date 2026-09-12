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
        return view('admin.products.create', compact('categories'));
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
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(Product $product)
    {
        return $this->productRepo->deletProduct($product);
    }
}
