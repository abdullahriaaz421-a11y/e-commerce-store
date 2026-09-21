<?php

namespace App\Repositories\Services;

use App\Interfaces\Interfaces\OrderInterface;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderService implements OrderInterface
{
    public function index(Request $request){
         // Base Query
        $query = Order::select(
            'order_number',
            'fname',
            'lname',
            'total_price',
            'status',
            'created_at'
        );

        // Search Filter
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('order_number', 'like', "%{$search}%")
                    ->orWhere('fname', 'like', "%{$search}%")
                    ->orWhere('lname', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('country', 'like', "%{$search}%")
                    ->orWhere('street', 'like', "%{$search}%")
                    ->orWhere('city', 'like', "%{$search}%");
            });
        }

        // Date Filter
        if ($request->filled('date')) {

            $query->whereDate('created_at', $request->date);
        }

        // Status Filter
        if ($request->filled('status') && $request->status != 'all') {

            $query->where('status', $request->status);
        }

        // Latest Orders First
        $orders = $query
            ->orderBy('created_at', 'desc')
            ->paginate(config('app.pagination_limit'))
            ->withQueryString();

        return view('admin.orders.index', compact('orders'));
    }
}
