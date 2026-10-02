<?php

namespace App\Repositories\Services;

use App\Repositories\Interfaces\OrderInterface;
use App\Models\Order;
use App\Models\TransactionHistories;
use App\Models\OrderStatues;
use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;

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

    public function ordertDetail($orderNumber){
        $order = Order::with(['details.product'])->where('order_number', $orderNumber)->firstOrFail();
        $transactions = TransactionHistories::where('order_id', $order->id)->latest()->get();
        $statuses = OrderStatues::where('order_number', $orderNumber)->get();

        return view('admin.orders.order-detail', compact('order','transactions','statuses'));
    }

    public function export()
    {
        return Excel::download( new OrdersExport, 'orders.xlsx');
    }
}
