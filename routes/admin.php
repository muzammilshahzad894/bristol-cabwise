<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\CarsController;
use App\Http\Controllers\admin\ServicesController;
use App\Http\Controllers\admin\FleetController;
use App\Http\Controllers\admin\BlockDatesController;
use App\Http\Controllers\admin\CouponController;
use App\Http\Controllers\admin\DraftController;
use App\Http\Controllers\admin\ConfirmUserController;
use App\Http\Controllers\admin\RefundController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\EmailController;
use App\Http\Controllers\admin\DriverController;
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
    
    Route::prefix('admin/block-dates')->group(function () {
        Route::get('/', [BlockDatesController::class, 'index'])->name('admin.block-dates.index');
        Route::get('/create', [BlockDatesController::class, 'create'])->name('admin.block-dates.create');
        Route::post('/create', [BlockDatesController::class, 'store'])->name('admin.block-dates.store');
        Route::get('/edit/{id}', [BlockDatesController::class, 'edit'])->name('admin.block-dates.edit');
        Route::post('/update/{id}', [BlockDatesController::class, 'update'])->name('admin.block-dates.update');
        Route::get('/delete/{id}', [BlockDatesController::class, 'delete'])->name('admin.block-dates.delete');
    });
    Route::prefix('admin/coupons')->group(function () {
        Route::get('/', [CouponController::class, 'index'])->name('admin.coupons.index');
        Route::get('/create', [CouponController::class, 'create'])->name('admin.coupons.create');
        Route::post('/create', [CouponController::class, 'store'])->name('admin.coupons.store');
        Route::get('/edit/{id}', [CouponController::class, 'edit'])->name('admin.coupons.edit');
        Route::post('/update/{id}', [CouponController::class, 'update'])->name('admin.coupons.update');
        Route::get('/delete/{id}', [CouponController::class, 'delete'])->name('admin.coupons.delete');
    });
    Route::prefix('admin/draft')->group(function () {
        Route::get('/', [DraftController::class, 'index'])->name('admin.draft.index');
        Route::get('/edit/{id}', [DraftController::class, 'edit'])->name('admin.draft.edit');
        Route::post('/update/{id}', [DraftController::class, 'bookingupdate'])->name('admin.draft.bookingupdate');
        Route::get('/booking-by-admin', [DraftController::class, 'bookByAdmin'])->name('admin.booking');
        Route::get('/delete/{id}', [DraftController::class, 'delete'])->name('admin.draft.delete');
    });
    Route::prefix('admin/confirm')->group(function () {
        Route::get('/', [ConfirmUserController::class, 'index'])->name('admin.confirm.index');
        Route::get('/delete/{id}', [ConfirmUserController::class, 'delete'])->name('admin.confirm.delete');
        Route::post('/update/{id}', [ConfirmUserController::class, 'update'])->name('admin.confirm.update');
        Route::post('/assign/{id}', [ConfirmUserController::class, 'assign'])->name('admin.confirm.assign');
        Route::get('/edit/{id}', [ConfirmUserController::class, 'edit'])->name('admin.confirm.edit');
        Route::post('/update/{id}', [ConfirmUserController::class, 'bookingupdate'])->name('admin.confirm.bookingupdate');
    });
    Route::prefix('admin/refund')->group(function () {
        Route::get('/', [RefundController::class, 'index'])->name('admin.refund.index');
        Route::get('/delete/{id}', [RefundController::class, 'delete'])->name('admin.refund.delete');
        Route::post('/update/{id}', [RefundController::class, 'update'])->name('admin.refund.update');
        Route::post('/assign/{id}', [RefundController::class, 'assign'])->name('admin.refund.assign');
        Route::get('/edit/{id}', [RefundController::class, 'edit'])->name('admin.refund.edit');
        Route::post('/update/{id}', [RefundController::class, 'bookingupdate'])->name('admin.refund.bookingupdate');
    });
    Route::prefix('admin/settings')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('admin.settings.index');
        Route::post('/update', [SettingController::class, 'update'])->name('admin.settings.update');
    });
    Route::prefix('admin/emails')->group(function () {
        Route::get('/', [EmailController::class, 'index'])->name('admin.emails.index');
        Route::post('/confirm-booking', [EmailController::class, 'confirmBooking'])->name('admin.emails.confirm-booking');
        Route::post('/cancel-booking', [EmailController::class, 'cancelBooking'])->name('admin.emails.cancel-booking');
        Route::post('/reminder-booking', [EmailController::class, 'reminderBooking'])->name('admin.emails.reminder-booking');
        Route::post('/thank-you-feedback', [EmailController::class, 'feedback'])->name('admin.emails.thank-you-feedback');
    });
    Route::prefix('admin/drivers')->group(function () {
        Route::get('/', [DriverController::class, 'index'])->name('admin.drivers.index');
        Route::get('/create', [DriverController::class, 'create'])->name('admin.drivers.create');
        Route::post('/create', [DriverController::class, 'store'])->name('admin.drivers.store');
        Route::get('/edit/{id}', [DriverController::class, 'edit'])->name('admin.drivers.edit');
        Route::post('/update/{id}', [DriverController::class, 'update'])->name('admin.drivers.update');
        Route::get('/delete/{id}', [DriverController::class, 'delete'])->name('admin.drivers.delete');
    });
});