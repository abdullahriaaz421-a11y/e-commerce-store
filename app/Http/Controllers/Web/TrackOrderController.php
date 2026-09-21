<?php
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrackOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class TrackOrderController extends Controller
{
    public function index()
    {
        $order = session('order');
        return view('web.track-order', compact('order'));
    }

    public function orderTracking(TrackOrderRequest $trackOrderRequest)
    {
        $order = Order::with('details.product')
            ->where('email', $trackOrderRequest->email)
            ->where('order_number', $trackOrderRequest->order_number)
            ->first();

        // return $order;

        if (!$order) {
            return redirect()
                ->route('web.track-order')
                ->with('error', 'No Order Found');
        }

        return redirect()
            ->route('web.track-order')
            ->with('order', $order);
    }
}
