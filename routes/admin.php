<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\CarsController;

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

    Route::get('/admin/cars', [CarsController::class, 'index'])->name('admin.cars.index');
    Route::get('/admin/cars/create', [CarsController::class, 'create'])->name('admin.cars.create');
    Route::post('/admin/cars/create', [CarsController::class, 'store'])->name('admin.cars.store');
    Route::get('/admin/cars/edit/{id}', [CarsController::class, 'edit'])->name('admin.cars.edit');
    Route::post('/admin/cars/update/{id}', [CarsController::class, 'update'])->name('admin.cars.update');
    Route::get('/admin/cars/delete/{id}', [CarsController::class, 'delete'])->name('admin.cars.delete');
});