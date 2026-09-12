<?php

namespace App\Providers;

use App\Repositories\Interfaces\CategoryInterface;
use App\Repositories\Interfaces\ProductInterface;
use App\Repositories\Services\CategoryService;
use App\Repositories\Services\ProductService;
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
