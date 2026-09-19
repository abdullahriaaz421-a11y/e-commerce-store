<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Admin\NotificationMarkAsRead;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('colors', ColorController::class);
    Route::get('notifications/read', [NotificationMarkAsRead::class, 'markAsRead'])->name('notifications.read');
});
