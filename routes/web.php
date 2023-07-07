<?php

use App\Http\Livewire\CategoriesController;
use App\Http\Livewire\CategoriesCreateController;
use App\Http\Livewire\CategoriesUpdateController;
use App\Http\Livewire\ContactsController;
use App\Http\Livewire\DashboardController;
use App\Http\Livewire\EditorsController;
use App\Http\Livewire\EditorsCreateController;
use App\Http\Livewire\EditorsUpdateController;
use App\Http\Livewire\OrdersController;
use App\Http\Livewire\OrdersCreateController;
use App\Http\Livewire\OrdersShowController;
use App\Http\Livewire\OrdersUpdateController;
use App\Http\Livewire\ProductsController;
use App\Http\Livewire\ProductsCreateController;
use App\Http\Livewire\ProductsShowController;
use App\Http\Livewire\ProductsUpdateController;
use App\Http\Livewire\SectionsController;
use App\Http\Livewire\SectionsCreateController;
use App\Http\Livewire\SectionsUpdateController;
use App\Http\Livewire\SubCategoriesController;
use App\Http\Livewire\SubCategoriesCreateController;
use App\Http\Livewire\SubCategoriesUpdateController;
use App\Http\Livewire\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class)->name('home');

Route::get('/sign-in', function () {
    return view('guestPages.signIn');
})->name('signIn');

Route::get('/sign-up', function () {
    return view('guestPages.signUp');
})->name('signUp');

Route::get('/recovery-password', function () {
    return view('guestPages.recoveryPassword');
})->name('recoveryPassword');

Route::get('/forget-password', function () {
    return view('guestPages.forgetPassword');
})->name('forgetPassword');


Route::prefix('products')->name('products')->group(function () {
    Route::get('/', ProductsController::class);

    Route::get('/create', ProductsCreateController::class)->name('.create');

    Route::get('/{id}', ProductsShowController::class)->name('.show');

    Route::get('/{id}/edit', ProductsUpdateController::class)->name('.update');
});

Route::prefix('sections')->name('sections')->group(function () {
    Route::get('/', SectionsController::class);

    Route::get('/create', SectionsCreateController::class)->name('.create');

    Route::get('/{id}/edit', SectionsUpdateController::class)->name('.update');
});

Route::prefix('categories')->name('categories')->group(function () {
    Route::get('/', CategoriesController::class);

    Route::get('/create', CategoriesCreateController::class)->name('.create');

    Route::get('/{id}/edit', CategoriesUpdateController::class)->name('.update');
});

Route::prefix('sub-categories')->name('subCategories')->group(function () {
    Route::get('/', SubCategoriesController::class);

    Route::get('/create', SubCategoriesCreateController::class)->name('.create');

    Route::get('/{id}/edit', SubCategoriesUpdateController::class)->name('.update');
});

Route::prefix('editors')->name('editors')->group(function () {
    Route::get('/', EditorsController::class);

    Route::get('/create', EditorsCreateController::class)->name('.create');

    Route::get('/{id}/edit', EditorsUpdateController::class)->name('.update');
});

Route::prefix('orders')->name('orders')->group(function () {
    Route::get('/', OrdersController::class);

    Route::get('/create', OrdersCreateController::class)->name('.create');

    Route::get('/{id}', OrdersShowController::class)->name('.show');

    Route::get('/{id}/edit', OrdersUpdateController::class)->name('.update');
});

Route::get('/users', UsersController::class)->name('users');

Route::get('/contacts',ContactsController::class)->name('contacts');


Route::get('/404', function () {
    return view('errors.404');
})->name('404');

Route::get('/500', function () {
    return view('errors.500');
})->name('500');

Route::get('/invoice', function () {
    return view('adminPages.invoice');
})->name('invoice');
