<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('adminPages.dashboard');
})->name('home');

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

Route::get('/add-categories', function () {
    return view('adminPages.addCategories');
})->name('addCategories');

Route::get('/categories/{id}', function () {
    return view('adminPages.editCategories');
})->name('editCategories');

Route::get('/categories', function () {
    return view('adminPages.categoriesTable');
})->name('categoriesTable');

Route::get('/sub-categories', function () {
    return view('adminPages.subCategoriesTable');
})->name('subCategoriesTable');

Route::get('/edit-sub-categories', function () {
    return view('adminPages.editSubCategories');
})->name('editSubCategories');

Route::get('/add-sub-categories', function () {
    return view('adminPages.addSubCategories');
})->name('addSubCategories');

Route::get('/add-editors', function () {
    return view('adminPages.addEditors');
})->name('addEditors');

Route::get('/editors', function () {
    return view('adminPages.editorsTable');
})->name('editorsTable');

// Route::get('/editors/{id}', function () {
//     return view('adminPages.editEditors');
// })->name('editEditors');

Route::get('/products', function () {
    return view('adminPages.productsTable');
})->name('productsTable');

Route::get('/products-details/{id}', function () {
    return view('adminPages.productsDetails');
})->name('productsDetails');

Route::get('/add-products', function () {
    return view('adminPages.addProducts');
})->name('addProducts');

Route::get('/products/{id}', function () {
    return view('adminPages.editProducts');
})->name('editProducts');

Route::get('/users', function () {
    return view('adminPages.usersTable');
})->name('usersTable');

Route::get('/users/{id}', function () {
    return view('adminPages.usersDetails');
})->name('usersDetails');

Route::get('/orders', function () {
    return view('adminPages.ordersTable');
})->name('ordersTable');

Route::get('/orders-details', function () {
    return view('adminPages.ordersDetails');
})->name('ordersDetails');

Route::get('/contact-us', function () {
    return view('adminPages.contactUsTable');
})->name('contactUsTable');

Route::get('/profile', function () {
    return view('adminPages.profile');
})->name('profile');

Route::get('/profile/{id}', function () {
    return view('adminPages.editProfile');
})->name('editProfile');

Route::get('/404', function () {
    return view('errorPages.404');
})->name('404');

Route::get('/500', function () {
    return view('errorPages.500');
})->name('500');

Route::get('/invoice', function () {
    return view('adminPages.invoice');
})->name('invoice');
