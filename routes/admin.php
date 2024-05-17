<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\CarsController;
use App\Http\Controllers\admin\ServicesController;
use App\Http\Controllers\admin\FleetController;
use Illuminate\Support\Facades\Artisan;

Route::get('/optimize', function () {
    Artisan::call('optimize:clear');
    return 'Cache cleared';
});

// check if user is already logged in then redirect to dashboard
Route::middleware(['guest'])->group(function () {
    Route::match(['get', 'post'], '/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
});

// protected routes
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');
    Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [DashboardController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/profile', [DashboardController::class, 'profileUpdate'])->name('admin.profile.update');

    Route::prefix('admin/cars')->group(function () {
        Route::get('/', [CarsController::class, 'index'])->name('admin.cars.index');
        Route::get('/create', [CarsController::class, 'create'])->name('admin.cars.create');
        Route::post('/create', [CarsController::class, 'store'])->name('admin.cars.store');
        Route::get('/edit/{id}', [CarsController::class, 'edit'])->name('admin.cars.edit');
        Route::post('/update/{id}', [CarsController::class, 'update'])->name('admin.cars.update');
        Route::get('/delete/{id}', [CarsController::class, 'delete'])->name('admin.cars.delete');
    });

    Route::prefix('admin/services')->group(function () {
        Route::get('/', [ServicesController::class, 'index'])->name('admin.services.index');
        Route::get('/create', [ServicesController::class, 'create'])->name('admin.services.create');
        Route::post('/create', [ServicesController::class, 'store'])->name('admin.services.store');
        Route::get('/edit/{id}', [ServicesController::class, 'edit'])->name('admin.services.edit');
        Route::post('/update/{id}', [ServicesController::class, 'update'])->name('admin.services.update');
        Route::get('/delete/{id}', [ServicesController::class, 'delete'])->name('admin.services.delete');
    });

    Route::prefix('admin/fleets')->group(function () {
        Route::get('/', [FleetController::class, 'index'])->name('admin.fleets.index');
        Route::get('/create', [FleetController::class, 'create'])->name('admin.fleets.create');
        Route::post('/create', [FleetController::class, 'store'])->name('admin.fleets.store');
        Route::get('/edit/{id}', [FleetController::class, 'edit'])->name('admin.fleets.edit');
        Route::post('/update/{id}', [FleetController::class, 'update'])->name('admin.fleets.update');
        Route::get('/delete/{id}', [FleetController::class, 'delete'])->name('admin.fleets.delete');
    });
});