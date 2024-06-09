<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\driver\LoginController;
use App\Http\Controllers\driver\DashboardController;
use App\Http\Controllers\driver\BookingController;

Route::middleware(['guest'])->group(function () {
    Route::match(['get', 'post'], '/driver/login', [LoginController::class, 'login'])->name('driver.login');
});

Route::middleware(['driver'])->group(function () {
    Route::get('/driver', [DashboardController::class, 'index'])->name('driver.index');
    Route::get('/driver/logout', [LoginController::class, 'logout'])->name('driver.logout');

    Route::get('/driver/dashboard', [DashboardController::class, 'dashboard'])->name('driver.dashboard');
    Route::prefix('driver/bookings')->group(function () {
        Route::get('/', [BookingController::class, 'index'])->name('driver.bookings.index');
        Route::get('/{booking}/status/{status}', [BookingController::class, 'updateStatus'])->name('driver.booking.status');
        Route::get('/{booking}/wait', [BookingController::class, 'wait'])->name('driver.booking.wait');
    });
});