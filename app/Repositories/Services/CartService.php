<?php

namespace App\Repositories\Services;

use App\Http\Requests\CartRequest;
use App\Models\Product;
use App\Repositories\Interfaces\CartInterface;
use Illuminate\Support\Str;
use Cart;
class CartService implements CartInterface
{
    public function __construct()
    {
        //
    }

    public function addToCart(CartRequest $request, $slug)
    {
        // return $request->all();
        $product = Product::with('images')
            ->active()
            ->where('slug', $slug)
            ->firstOrFail();

        $quantity = (int) ($request->quantity ?? 1);

        // Check product already exists in cart
        $item = Cart::get($product->id);

        if ($item) {

            // Already exists -> quantity increase
            Cart::update($product->id, [
                'quantity' => [
                    'relative' => true,
                    'value' => $quantity,
                ],
            ]);

        } else {

            // New product -> add to cart
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => (int) $product->price,
                'quantity' => $quantity,
                'attributes' => [
                    'image' => $product->images->first()->image_name ?? null,
                    'size' => $request->size,
                    'color' => $request->color,
                    'slug'  => $product->slug,
                ],
            ]);
        }

        return redirect()
            ->route('web.cart.index')
            ->with('success', 'Product added to cart successfully.');
    }

    public function updateCart(CartRequest $request)
    {
        // return $request->all();
        $quantities = $request->input('quantity', []);
        foreach ($quantities as $itemId => $quantity) {
            Cart::update($itemId, [
                'quantity' => [
                    'relative' => false,
                    'value' => (int) $quantity,
                ],
            ]);
        }

        return redirect()
            ->route('web.cart.index')
            ->with('success', 'Cart updated successfully!');
    }

    public function remove(string $id)
    {
        $item = Cart::get($id);

        if (!$item) {
            return redirect()->route('web.cart.index')->with('error', 'Cart item not found.');
        }

        Cart::remove($id);

        return redirect()->route('web.cart.index')->with('success', 'Product removed from cart.');
    }
}
