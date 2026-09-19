<?php

namespace App\Providers;

use App\Repositories\Interfaces\CartInterface;
use App\Repositories\Interfaces\CategoryInterface;
use App\Repositories\Interfaces\CheckoutInterface;
use App\Repositories\Interfaces\ContactInterface;
use App\Repositories\Interfaces\ProductInterface;
use App\Repositories\Interfaces\ColorInterface;
use App\Repositories\Services\CartService;
use App\Repositories\Services\CategoryService;
use App\Repositories\Services\CheckoutService;
use App\Repositories\Services\ContactService;
use App\Repositories\Services\ProductService;
use App\Repositories\Services\ColorService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryInterface::class, CategoryService::class);
        $this->app->bind(ProductInterface::class, ProductService::class);
        $this->app->bind(ContactInterface::class, ContactService::class);
        $this->app->bind(ColorInterface::class, ColorService::class);
        $this->app->bind(CartInterface::class, CartService::class);
        $this->app->bind(CheckoutInterface::class, CheckoutService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.admin-navbar', function ($view) {
            $notifications = DB::table('notifications')->latest()->limit(20)->get();

            $totalUnreadNotifications = DB::table('notifications')->whereNull('read_at')->latest()->count();

            $view->with([
                'notifications'            => $notifications,
                'totalUnreadNotifications' => $totalUnreadNotifications,
            ]);
        });
    }
}
