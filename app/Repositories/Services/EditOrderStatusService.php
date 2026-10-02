<?php

namespace App\Repositories\Services;

use App\Repositories\Interfaces\EditOrderStatusInterface;
use App\Models\Order;
use App\Models\OrderStatues;
use App\Mail\OrderStatusUpdatedMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Notifications\OrderStatusUpdateNotification;

class EditOrderStatusService implements EditOrderStatusInterface
{
    public function updateOrderStatus(array $data, string $orderNumber)
    {
        $status = $data['status_update'];
        $courierCompany = $data['courier_company'] ?? null;
        $trackingNumber = $data['tracking_number'] ?? null;
        $deliveryDays = $data['delivery_days'] ?? null;

        // Order find by order number
        $order = Order::where('order_number', $orderNumber)->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }


        // Update order status and other details
        $order->status = $status;
        $order->courier_company = $courierCompany;
        $order->tracking_number = $trackingNumber;
        $order->delivery_days = $deliveryDays;
        $order->save();

        // return $order;

        // Check if the status already exists in the order status history
        $statusAlreadyExists = OrderStatues::where('order_number', $orderNumber)->where('status', $status)->exists();

        // if status history not found
        if (!$statusAlreadyExists) {

            //New Status history 
            OrderStatues::create([
                'order_number' => $orderNumber,
                'status' => $status,
            ]);

            //email to Customer
            Mail::to($order->email)->send(
                new OrderStatusUpdatedMail($order, $status)
            );

            // Admin Notification
            $admin = User::where('roll', 'admin')->first();
            if ($admin) {
                $admin->notify(
                    new OrderStatusUpdateNotification(
                        "{$admin->name} Order #{$order->order_number} status updated to {$status}.",
                    ),
                );
            }
        }

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
}