<?php

namespace App\Repositories\Services;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Repositories\Interfaces\ShopInterface;
use Illuminate\Http\Request;

class ShopService implements ShopInterface
{
    public function getShopCategories()
    {
        return Category::select('id', 'category_name', 'slug', 'status')->get();
    }

    public function getColors()
    {
        $colors = Color::select('id', 'name', 'code')->get();
        foreach ($colors as $color) {
            $color->products = Product::where('colors','like','%"' . $color->code . '"%')->get();
        }
        return $colors;
    }

    public function index(Request $request)
    {
        $products = Product::query()

            // Category Filter
            ->when($request->filled('category'), function ($query) use ($request) {
                $category = Category::where('slug', $request->category)->first();
                if ($category) {
                    $query->where('category_id', $category->id);
                }
            })

             // Color Filter
            ->when($request->filled('color'), function ($query) use ($request) {

                $query->where(
                    'colors',
                    'like',
                    '%"' . $request->color . '"%'
                );
            })

            // Size Filter
            ->when($request->filled('size'), function ($query) use ($request) {

                $query->where(
                    'sizes',
                    'like',
                    '%"' . $request->size . '"%'
                );
            })

            // A-Z
            ->when($request->sort == 'a-z', function ($query) {
                $query->orderBy('name', 'asc');
            })

            // Z-A
            ->when($request->sort == 'z-a', function ($query) {
                $query->orderBy('name', 'desc');
            })

            // Price Low to High
            ->when($request->sort == 'price-low-high', function ($query) {
                $query->orderBy('price', 'asc');
            })

            // Price High to Low
            ->when($request->sort == 'price-high-low', function ($query) {
                $query->orderBy('price', 'desc');
            })



            ->paginate(12)
            ->withQueryString();

        return $products;
    }
}
