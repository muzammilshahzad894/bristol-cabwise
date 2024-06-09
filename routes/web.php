<?php

require __DIR__.'/frontend.php';
require __DIR__.'/admin.php';
require __DIR__.'/driver.php';
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
