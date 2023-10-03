<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CompareController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\Layouts\SettingsController;
use App\Http\Controllers\Api\Layouts\SidebarController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\ShopController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\TopSaleController;
use App\Http\Controllers\Api\Users\CartController;
use App\Http\Controllers\Api\Users\CheckoutController;
use App\Http\Controllers\Api\Users\OrderController;
use App\Http\Controllers\Api\Users\OrderItemController;
use App\Http\Controllers\Api\Users\UserController;
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


Route::name('api.')->group(function () {

    Route::prefix('/home')->name('home.')->group(function () {

        Route::get('/', [HomeController::class, 'index']);

        Route::get('/offers', [HomeController::class, 'getOffer'])->name('offers');

        Route::get('/categories', [HomeController::class, 'getCategory'])->name('categories');

        Route::get('/navbar', [HomeController::class, 'getNavbar'])->name('navbar');
    });

    Route::get('/site-settings', SettingsController::class)->name('settings');

    Route::get('/sidebar', [SidebarController::class, 'index'])->name('sidebar');

    Route::post('/contacts', ContactController::class)->name('contacts');

    Route::post('/compare', CompareController::class)->name('compare');

    Route::get('/search/{keyword}', [SearchController::class, 'index'])->name('search')->where('keyword', '[A-Za-z0-1]+');

    Route::get('/shop', ShopController::class)->name('shop');

    Route::get('/categories/{slug}', CategoryController::class)->name('categories');

    Route::get('/sub-categories/{slug}', SubCategoryController::class)->name('subCategories');

    Route::get('/brands/{slug}', BrandController::class)->name('brands');

    Route::get('/offers/{slug}', OfferController::class)->name('offers');

    Route::get('/sales', TopSaleController::class)->name('sales');

    Route::get('/products/{slug}', [ProductController::class, 'index'])->name('products.show');

    Route::get('/products/view-count/{id}', [ProductController::class, 'productViewCount'])->name('products.viewCount')->whereNumber('id');

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::middleware('auth:sanctum')->prefix('/users')->name('users.')->group(function () {

        Route::prefix('/cart')->name('cart.')->group(function () {

            Route::get('/{id}', [CartController::class, 'inbox'])->whereNumber('id');

            Route::delete('/{id}', [CartController::class, 'destroy'])->name('destroy')->whereNumber('id');

            Route::get('/{cartId}/{productId}/{qty}', [CartController::class, 'update'])->name('update')->where(['cartId' => '[0-9]+', 'productId' => '[0-9]+', 'qty' => '[0-9]+']);

            Route::get('/count/{userId}', [CartController::class, 'count'])->name('count')->whereNumber('userId');

            Route::get('/coupon/{code}', [CartController::class, 'getCoupon'])->name('coupon')->where('code', '[A-Za-z0-1]+');

            Route::get('/add/{userId}/{productId}', [CartController::class, 'add'])->name('add')->where(['userId' => '[0-9]+', 'productId' => '[0-9]+']);
        });

        Route::post('/review', [ReviewController::class, 'store'])->name('review');

        Route::get('/checkout/{id}', [CheckoutController::class, 'inbox'])->name('checkout.inbox')->whereNumber('id');

        Route::post('/checkout/{id}', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder')->whereNumber('id');

        Route::prefix('orders')->name('orders.')->group(function () {

            Route::get('/{id}', OrderController::class)->whereNumber('id');

            Route::get('/{id}/items', OrderItemController::class)->name('items')->whereNumber('id');

            Route::get('/{id}/pay', [CheckoutController::class, 'payOrder'])->name('pay')->whereNumber('id');
        });

        Route::prefix('profiles')->name('profiles.')->group(function () {

            Route::get('/{id}', [UserController::class, 'index'])->whereNumber('id');

            Route::put('/{id}', [UserController::class, 'update'])->name('update')->whereNumber('id');

            Route::post('/create', [UserController::class, 'create'])->name('create');
        });
    });
});
