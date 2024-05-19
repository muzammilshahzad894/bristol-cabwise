<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\CarsController;
use App\Http\Controllers\frontend\BookingController;
use App\Http\Controllers\frontend\FrontendController;

Route::get('/', [CarsController::class, 'index'])->name('frontend.index');
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/services', [FrontendController::class, 'services'])->name('frontend.services');

Route::get('/book-online', [BookingController::class, 'index'])->name('frontend.book-online');
Route::get('/car-details/{id}', [CarsController::class, 'carDetails'])->name('frontend.carDetails');
Route::get('/trust-violet', [FrontendController::class, 'trustVoilet'])->name('frontend.trustVoilet');
Route::get('/signIn', [FrontendController::class, 'login'])->name('frontend.login');
Route::get('/signUp', [FrontendController::class, 'signup'])->name('frontend.signup');