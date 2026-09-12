<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ProductInterface;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public string $modelName = 'web.';

    public function __construct(private ProductInterface $productRepo)
    {
        View::share('modelName', $this->modelName);
    }

    public function index()
    {
        $products   = $this->productRepo->getHomeProducts();
        $categories = $this->productRepo->allCategories();
        return view($this->modelName . 'index', compact('products', 'categories'));
    }
}
