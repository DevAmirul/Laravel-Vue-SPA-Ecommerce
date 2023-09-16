<?php

use App\Http\Controllers\FrontendAuth\AuthenticatedSessionController;
use App\Http\Controllers\FrontendAuth\EmailVerificationNotificationController;
use App\Http\Controllers\FrontendAuth\NewPasswordController;
use App\Http\Controllers\FrontendAuth\PasswordResetLinkController;
use App\Http\Controllers\FrontendAuth\RegisteredUserController;
use App\Http\Controllers\FrontendAuth\VerifyEmailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::name('api.')->group(function(){

    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest')
        ->name('register');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest')
        ->name('login');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest')
        ->name('password.email');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest')
        ->name('password.store');

    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:sanctum')
        ->name('logout');
});