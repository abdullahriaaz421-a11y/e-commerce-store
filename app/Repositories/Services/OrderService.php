<?php

namespace App\Repositories\Services;

use App\Interfaces\Interfaces\OrderInterface;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderService implements OrderInterface
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query  = $search
            ? Order::search($search)
            : Order::query();
        // Status
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }
        // Date
        if ($request->filled('date')) {
            $query->where('created_at', '>=', $request->date . ' 00:00:00')
                ->where('created_at', '<=', $request->date . ' 23:59:59');
        }
        $orders = $query->orderBy('created_at', 'desc')->paginate(config('app.pagination_limit'))->withQueryString();
        // return $orders;
        return view('admin.orders.index', compact('orders'));
    }
}
