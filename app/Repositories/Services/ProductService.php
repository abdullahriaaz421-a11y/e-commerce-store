<?php

namespace App\Repositories\Services;

use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Notifications\ProductNotification;
use App\Repositories\Interfaces\ProductInterface;
use Illuminate\Support\Facades\Cache;

class ProductService implements ProductInterface
{
    public function __construct() {}

    public function allCategories()
    {
        return Category::select('id', 'category_name', 'slug', 'status')->get();
    }

    public function getAllColors(){
        return Color::select('id', 'name', 'code')->get();
    }

    public function getHomeProducts()
    {
        return Cache::rememberForever('home_products', function () {
            return Product::with('images')->active()->latest()->take(12)->get()->toArray();
        });
    }

    public function getShopCategoryProducts($slug)
    {
        $category = Category::where('slug', $slug)->active()->firstOrFail();
        $products = Product::with('images')->where('category_id', $category->id)->active()->get();

        return $products;
    }

    public function getProductDetail($slug)
    {
        return Product::with('images')->where('slug', $slug)->firstOrFail();
    }

    public function getRelatedProducts($categoryId, $productId)
    {
        return Product::with('images')->active()->where('category_id', $categoryId)->where('id', '!=', $productId)->take(4)->get();
    }

    public function getAllPaginatedProducts()
    {
        return Product::with('images')->select('id', 'name', 'price', 'colors', 'sizes', 'status')->paginate(config('app.pagination_limit'));
        // $data = Product::with('images')->select('id', 'name', 'price', 'colors', 'sizes', 'status')->paginate(config('app.pagination_limit'));
        // return dd($data);
    }

    public function createProduct(array $data)
    {
        $images = $data['images'] ?? [];
        unset($data['images']);

        $product = Product::create($data);

        if (!empty($images)) {
            foreach ($images as $image) {
                $imageName = $image->getClientOriginalName();
                $image->storeAs('uploads', $imageName, 'public');
                $product->images()->create([
                    'image_name' => $imageName,
                ]);
            }
        }

        $user = auth()->user();
        $user->notify(new ProductNotification(
            $user->name . ' Created Product "' . $product->name . '"',
        ));

        return redirect()->route('admin.products.index')->withSuccess('Product Created Successfully!');
    }
    public function updateProduct(Product $product, array $data)
    {
        $images = $data['images'] ?? [];
        unset($data['images']);

        $product->update($data);

        if (!empty($images)) {
            foreach ($images as $image) {
                $imageName = $image->getClientOriginalName();
                $image->storeAs('uploads', $imageName, 'public');
                $product->images()->create([
                    'image_name' => $imageName,
                ]);
            }
        }

        $user = auth()->user();
        $user->notify(new ProductNotification(
            $user->name . ' Updated Product "' . $product->name . '"',
        ));

        return redirect()->route('admin.products.index')->withSuccess('Product Updated Successfully!');
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();

        $user = auth()->user();
        $user->notify(new ProductNotification(
            $user->name . ' Deleted Product "' . $product->name . '"',
        ));

        return redirect()->route('admin.products.index')->with('Product Deleted Successfully');
    }
}
