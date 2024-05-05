<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\CarsController;
use App\Http\Controllers\frontend\BookingController;

Route::get('/', [CarsController::class, 'index'])->name('frontend.index');
Route::get('/book-online', [BookingController::class, 'index'])->name('frontend.book-online');