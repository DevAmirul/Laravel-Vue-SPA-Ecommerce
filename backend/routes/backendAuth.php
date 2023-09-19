<?php

use App\Http\Controllers\BackendAuth\AuthenticatedSessionController;
use App\Http\Controllers\BackendAuth\NewPasswordController;
use App\Http\Controllers\BackendAuth\PasswordResetLinkController;
use App\Http\Controllers\BackendAuth\RegisteredUserController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest:editor')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth:editor')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register')->middleware('can:isAdmin');

    Route::post('register', [RegisteredUserController::class, 'store'])->middleware('can:isAdmin');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});