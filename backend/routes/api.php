<?php

use App\Http\Controllers\Api\Frontend\ContactController;
use App\Http\Controllers\Api\Frontend\HomeController;
use App\Http\Controllers\Api\Frontend\Layouts\FooterController;
use App\Http\Controllers\Api\Frontend\Layouts\HeaderController;
use App\Http\Controllers\Api\Frontend\Layouts\SidebarController;
use App\Http\Controllers\Api\Frontend\NewArrivalController;
use App\Http\Controllers\Api\Frontend\ProductController;
use App\Http\Controllers\Api\Frontend\relatedProductController;
use App\Http\Controllers\Api\Frontend\TopRatingController;
use App\Http\Controllers\Api\Frontend\TopSaleController;
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

Route::get('home', HomeController::class)->name('api.home');
Route::get('footer', FooterController::class)->name('api.footer');
Route::get('header', HeaderController::class)->name('api.header');
Route::get('arrivals', NewArrivalController::class)->name('api.arrivals');
Route::get('ratings', TopRatingController::class)->name('api.ratings');
Route::get('sales', TopSaleController::class)->name('api.sales');

Route::prefix('products')->name('api.products')->group(function () {
    Route::get('/{id}', ProductController::class);
    Route::get('/related/{subCateId}', relatedProductController::class)->name('.related');
});

Route::get('contacts', ContactController::class)->name('api.contacts');
Route::get('sidebar', [SidebarController::class, 'sidebarCategory'])->name('api.sidebar');

