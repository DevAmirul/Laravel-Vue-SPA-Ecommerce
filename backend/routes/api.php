<?php

use App\Http\Controllers\Api\Frontend\BrandController;
use App\Http\Controllers\Api\Frontend\CategoryController;
use App\Http\Controllers\Api\Frontend\CompareController;
use App\Http\Controllers\Api\Frontend\ContactController;
use App\Http\Controllers\Api\Frontend\HomeController;
use App\Http\Controllers\Api\Frontend\Layouts\SettingsController;
use App\Http\Controllers\Api\Frontend\Layouts\SidebarController;
use App\Http\Controllers\Api\Frontend\ProductController;
use App\Http\Controllers\Api\Frontend\ReviewController;
use App\Http\Controllers\Api\Frontend\SearchController;
use App\Http\Controllers\Api\Frontend\ShopController;
use App\Http\Controllers\Api\Frontend\SubCategoryController;
use App\Http\Controllers\Api\Frontend\TopSaleController;
use App\Http\Controllers\Api\Frontend\Users\CartController;
use App\Http\Controllers\Api\Frontend\Users\CheckoutController;
use App\Http\Controllers\Api\Frontend\Users\OrderController;
use App\Http\Controllers\Api\Frontend\Users\OrderItemController;
use App\Http\Controllers\Api\Frontend\Users\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')->group(function () {
    Route::prefix('/home')->name('home.')->group(function () {
        Route::get('/', [HomeController::class, 'index']);
        Route::get('/offers', [HomeController::class, 'getOffer'])->name('offers');
        Route::get('/categories', [HomeController::class, 'getCategory'])->name('categories');
        Route::get('/navbar', [HomeController::class, 'getSidebar'])->name('navbar');
    });
    Route::get('/site-settings', SettingsController::class)->name('settings');
    Route::get('/sidebar', [SidebarController::class, 'index'])->name('sidebar');
    Route::post('/contacts', ContactController::class)->name('contacts');
    Route::post('/compare', CompareController::class)->name('compare');
    Route::get('/search', SearchController::class)->name('search');
    Route::get('/offers', SearchController::class)->name('offers');
    Route::get('/shop', ShopController::class)->name('shop');
    Route::get('/categories/{slug}', CategoryController::class)->name('categories');
    Route::get('/sub-categories/{slug}', SubCategoryController::class)->name('subCategories');
    Route::get('/brands/{slug}', BrandController::class)->name('brands');
    Route::get('/sales', TopSaleController::class)->name('sales');
    Route::get('/products/{slug}', ProductController::class)->name('products.show');

    Route::post('/login', [ProfileController::class, 'login'])->name('login');
    Route::post('/register', [ProfileController::class, 'register'])->name('register');
    Route::post('/reset', [ProfileController::class, 'reset'])->name('reset');

    Route::prefix('/users')->name('users.')->group(function () {
        Route::prefix('/cart')->name('cart.')->group(function () {
            Route::get('/{id}', [CartController::class, 'inbox'])->where('id', '[0-9]+');
            Route::delete('/{id}', [CartController::class, 'destroy'])->name('destroy')->where('id', '[0-9]+');
            Route::put('/{cartId}/{productId}/{qty}', [CartController::class, 'update'])->name('update');
            Route::get('/count/{userId}', [CartController::class, 'count'])->name('count');
            Route::get('/coupon/{code}', [CartController::class, 'getCoupon'])->name('coupon');
            Route::get('/add/{userId}/{productId}', [CartController::class, 'add'])->name('add');
        });
        Route::post('/review', [ReviewController::class, 'create'])->name('review');
        Route::get('/checkout/{id}', [CheckoutController::class, 'inbox'])->name('checkout.inbox');
        Route::post('/checkout', [CheckoutController::class, 'create'])->name('checkout.create');

        Route::prefix('orders')->name('orders.')->group(function () {
            Route::get('/{id}', [OrderController::class, 'index'])->where('id', '[0-9]+');
            Route::post('/', [OrderController::class, 'create'])->name('create')->where('id', '[0-9]+');
            Route::get('/{id}/items', [OrderItemController::class, 'index'])->name('items')->where('id', '[0-9]+');
        });
        Route::prefix('profiles')->name('profiles.')->group(function () {
            Route::get('/{id}', [ProfileController::class, 'index'])->where('id', '[0-9]+');
            Route::put('/{id}', [ProfileController::class, 'update'])->name('update')->where('id', '[0-9]+');
            Route::post('/create', [ProfileController::class, 'create'])->name('create');
        });
    });
});
