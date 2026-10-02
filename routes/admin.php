<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Admin\EditOrderStatusController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\NotificationMarkAsRead;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('colors', ColorController::class);
    Route::get('notifications/read', [NotificationMarkAsRead::class, 'markAsRead'])->name('notifications.read');

    Route::get('orders', [OrderController::class, 'index'])->name('orders.show');

    Route::get('order-details/{orderNumber}', [OrderController::class, 'ordertDetail'])->name('order-detail');

    Route::get('orders/export', [OrderController::class, 'export'])->name('orders.export');

    Route::post('orders/{orderNumber}/update-status', [EditOrderStatusController::class, 'update'])->name('orders.update-status');
});
