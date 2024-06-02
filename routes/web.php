<?php

require __DIR__.'/frontend.php';
require __DIR__.'/admin.php';
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
