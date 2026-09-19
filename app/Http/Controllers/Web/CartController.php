<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Repositories\Interfaces\CartInterface;
// use Darryldecode\Cart\Facades\CartFacade as Cart;
use Cart;

class CartController extends Controller
{
    public function __construct(private CartInterface $cartrepo)
    {
        
    }
    public function index()
    {
        return view('web.cart');
    }

    public function store(CartRequest $request, $slug)
    {
        return $this->cartrepo->addToCart($request, $slug);
    }
    public function update(CartRequest $request)
    {
        return $this->cartrepo->updateCart($request);
    }

    public function remove(string $id)
    {
        return $this->cartrepo->remove($id);
    }
}