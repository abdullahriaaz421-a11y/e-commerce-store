<?php
// use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\ShopCategoriesController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\AboutController;
use Illuminate\Support\Facades\Route;

Route::name('web.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/product/{slug}', [ProductController::class, 'getProductDetail'])->name('product.show');
    Route::get('/shop-by-categories/{slug}', [ShopCategoriesController::class, 'shopByCategories'])->name('shop-by-categories');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'sendContactMessage'])->name('contact.message');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');    
});

require __DIR__ . '/auth.php';
