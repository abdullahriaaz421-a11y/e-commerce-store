<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchValue = $request->global_search; 
        $products = Product::search($searchValue) 
            ->query(function ($query) {
                $query->with('images'); 
            }) ->get();

        if ($products->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No products found.',
            ]);
        }
        
        return response()->json([
            'status' => true,
            'data' => $products,
        ]); 

    }
}