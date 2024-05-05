<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\CarsController;

Route::get('/', [CarsController::class, 'index'])->name('frontend.index');