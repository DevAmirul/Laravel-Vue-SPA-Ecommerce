<?php

use App\Http\Controllers\Api\Users\CheckoutController;
use App\Http\Livewire\Categories\CategoriesController;
use App\Http\Livewire\Categories\CategoriesCreateController;
use App\Http\Livewire\Categories\CategoriesUpdateController;
use App\Http\Livewire\Categories\SectionsController;
use App\Http\Livewire\Categories\SectionsCreateController;
use App\Http\Livewire\Categories\SectionsUpdateController;
use App\Http\Livewire\Categories\SubCategoriesController;
use App\Http\Livewire\Categories\SubCategoriesCreateController;
use App\Http\Livewire\Categories\SubCategoriesUpdateController;
use App\Http\Livewire\Contacts\ContactUsController;
use App\Http\Livewire\Contacts\ContactUsReplyController;
use App\Http\Livewire\DashboardController;
use App\Http\Livewire\Editors\EditorsController;
use App\Http\Livewire\Editors\EditorsCreateController;
use App\Http\Livewire\Editors\EditorsUpdateController;
use App\Http\Livewire\Orders\OrdersController;
use App\Http\Livewire\Orders\OrdersUpdateController;
use App\Http\Livewire\Products\AttributesController;
use App\Http\Livewire\Products\AttributesCreateController;
use App\Http\Livewire\Products\BrandsController;
use App\Http\Livewire\Products\BrandsCreateController;
use App\Http\Livewire\Products\BrandsUpdateController;
use App\Http\Livewire\Products\ProductsController;
use App\Http\Livewire\Products\ProductsCreateController;
use App\Http\Livewire\Products\ProductsUpdateController;
use App\Http\Livewire\Products\TagsController;
use App\Http\Livewire\Products\TagsCreateController;
use App\Http\Livewire\ProfileController;
use App\Http\Livewire\Reports\BrandedProductsReportController;
use App\Http\Livewire\Reports\CategorizedProductsReportController;
use App\Http\Livewire\Reports\CouponsReportController;
use App\Http\Livewire\Reports\CustomersOrderReportController;
use App\Http\Livewire\Reports\ProductsPurchaseReportController;
use App\Http\Livewire\Reports\ProductsStockReportController;
use App\Http\Livewire\Reports\ProductsViewReportController;
use App\Http\Livewire\Reports\SalesReportController;
use App\Http\Livewire\Reports\SearchReportController;
use App\Http\Livewire\Reports\ShippingReportController;
use App\Http\Livewire\Settings\Coupons\CouponsController;
use App\Http\Livewire\Settings\Coupons\CouponsCreateController;
use App\Http\Livewire\Settings\Coupons\CouponsUpdateController;
use App\Http\Livewire\Settings\GeneralController;
use App\Http\Livewire\Settings\MailController;
use App\Http\Livewire\Settings\Offers\OffersController;
use App\Http\Livewire\Settings\Offers\OffersCreateController;
use App\Http\Livewire\Settings\Offers\OffersUpdateController;
use App\Http\Livewire\Settings\Shipping\MethodsController;
use App\Http\Livewire\Settings\Shipping\MethodsCreateController;
use App\Http\Livewire\Settings\Shipping\MethodsUpdateController;
use App\Http\Livewire\UsersController;
use App\Repositories\Payments\StripeRepository;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:editor')->group(function(){

    Route::get('/', DashboardController::class)->name('home');

    Route::prefix('products')->name('products')->group(function () {

        Route::get('/', ProductsController::class);

        Route::get('/create', ProductsCreateController::class)->name('.create');

        Route::get('/{id}/edit', ProductsUpdateController::class)->name('.update')->whereNumber('id');
    });

    Route::prefix('brands')->name('brands')->group(function () {

        Route::get('/', BrandsController::class);

        Route::get('/create', BrandsCreateController::class)->name('.create');

        Route::get('/{id}/edit', BrandsUpdateController::class)->name('.update')->whereNumber('id');
    });

    Route::prefix('tags')->name('tags')->group(function () {

        Route::get('/', TagsController::class);

        Route::get('/create', TagsCreateController::class)->name('.create');
    });

    Route::prefix('attributes')->name('attributes')->group(function () {

        Route::get('/', AttributesController::class);

        Route::get('/create', AttributesCreateController::class)->name('.create');
    });

    Route::prefix('sections')->name('sections')->group(function () {

        Route::get('/', SectionsController::class);

        Route::get('/create', SectionsCreateController::class)->name('.create');

        Route::get('/{id}/edit', SectionsUpdateController::class)->name('.update')->whereNumber('id');
    });

    Route::prefix('categories')->name('categories')->group(function () {

        Route::get('/', CategoriesController::class);

        Route::get('/create', CategoriesCreateController::class)->name('.create');

        Route::get('/{id}/edit', CategoriesUpdateController::class)->name('.update')->whereNumber('id');
    });

    Route::prefix('sub-categories')->name('subCategories')->group(function () {

        Route::get('/', SubCategoriesController::class);

        Route::get('/create', SubCategoriesCreateController::class)->name('.create');

        Route::get('/{id}/edit', SubCategoriesUpdateController::class)->name('.update')->whereNumber('id');
    });

    Route::middleware('can:isAdmin')->prefix('editors')->name('editors')->group(function () {

        Route::get('/', EditorsController::class);

        Route::get('/{id}/edit', EditorsUpdateController::class)->name('.update')->whereNumber('id');
    });

    Route::prefix('orders')->name('orders')->group(function () {

        Route::get('/', OrdersController::class);

        Route::get('/{id}/edit', OrdersUpdateController::class)->name('.update')->whereNumber('id');
    });

    Route::prefix('reports')->name('reports')->group(function () {

        Route::get('/brand-products', BrandedProductsReportController::class)->name('.brand.products');

        Route::get('/categorized-products', CategorizedProductsReportController::class)->name('.categorized.products');

        Route::get('/coupons', CouponsReportController::class)->name('.coupons');

        Route::get('/customers-order', CustomersOrderReportController::class)->name('.customers.order');

        Route::get('/products-purchase', ProductsPurchaseReportController::class)->name('.products.purchase');

        Route::get('/products-stock', ProductsStockReportController::class)->name('.products.stock');

        Route::get('/products-view', ProductsViewReportController::class)->name('.products.view');

        Route::get('/sales', SalesReportController::class)->name('.sales');

        Route::get('/search', SearchReportController::class)->name('.search');

        Route::get('/shipping', ShippingReportController::class)->name('.shipping');
    });

    Route::prefix('contacts')->name('contacts')->group(function () {

        Route::get('/', ContactUsController::class);

        Route::get('/{id}/reply', ContactUsReplyController::class)->name('.reply')->whereNumber('id');
    });

    Route::prefix('settings')->name('settings')->group(function () {

        Route::get('/general', GeneralController::class)->name('.general');

        Route::prefix('coupons')->name('.coupons')->group(function () {

            Route::get('/', CouponsController::class);

            Route::get('/create', CouponsCreateController::class)->name('.create');

            Route::get('/{id}/edit', CouponsUpdateController::class)->name('.update')->whereNumber('id');
        });

        Route::prefix('offers')->name('.offers')->group(function () {

            Route::get('/', OffersController::class);

            Route::get('/create', OffersCreateController::class)->name('.create');

            Route::get('/{id}/edit', OffersUpdateController::class)->name('.update')->whereNumber('id');
        });

        Route::prefix('shipping-methods')->name('.shippingMethods')->group(function () {

            Route::get('/', MethodsController::class);

            Route::get('/create', MethodsCreateController::class)->name('.create');

            Route::get('/{id}/edit', MethodsUpdateController::class)->name('.update')->whereNumber('id');
        });

        Route::get('/offer', OffersController::class)->name('.offer');
    });

    Route::get('/users', UsersController::class)->name('users');

    Route::get('/profile/{id}', ProfileController::class)->name('profile')->whereNumber('id');
});

require __DIR__ . '/backendAuth.php';

Route::get( 'payment/success', [StripeRepository::class, 'success'] )->name('payment.success');
Route::get( 'payment/cancel', [StripeRepository::class, 'cancel'] )->name('payment.cancel');
