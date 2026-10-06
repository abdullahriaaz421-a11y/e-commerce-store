<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Wishlist Page
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $wishlists = Wishlist::with(['product.images'])->where('user_id', auth()->id())->latest()->get();

        $wishlistProductIds = [];
        if (auth()->check()) {
            $wishlistProductIds = Wishlist::where('user_id', auth()->id())->pluck('product_id')->toArray();
        }
        return view('web.wishlist', compact('wishlists', 'wishlistProductIds'));
    }


    /*
    |--------------------------------------------------------------------------
    | Add / Remove Wishlist
    |--------------------------------------------------------------------------
    */

    public function toggle(Product $product)
    {
        $wishlist = Wishlist::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->first();

        if ($wishlist) {

            $wishlist->delete();
            $count = Wishlist::where('user_id', auth()->id())->count();

            return response()->json([
                'status' => true,
                'action' => 'removed',
                'message' => 'Product removed from wishlist.',
                'count' => $count
            ]);
        }

        Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
        ]);

        $count = Wishlist::where('user_id', auth()->id())->count();

        return response()->json([
            'status' => true,
            'action' => 'added',
            'message' => 'Product added to wishlist.',
            'count' => $count
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Remove From Wishlist
    |--------------------------------------------------------------------------
    */

    public function remove($id)
    {
        $wishlist = Wishlist::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $wishlist->delete();
        $count = Wishlist::where('user_id', auth()->id())->count();

        return response()->json([
            'status' => true,
            'message' => 'Product removed from wishlist.',
            'count' => $count
        ]);
    }
}