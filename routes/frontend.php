<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\CarsController;
use App\Http\Controllers\frontend\BookingController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\ApplyCouponController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayPalController;
use Illuminate\Support\Facades\Auth;


Auth::routes(['verify' => true]);

// $this->redirectIfAuthenticated();
Route::get('/', [CarsController::class, 'index'])->name('frontend.index');
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::post('/contact', [FrontendController::class, 'contactPost'])->name('frontend.contactPost');
Route::get('/services', [FrontendController::class, 'services'])->name('frontend.services');
Route::get('/faqs', [FrontendController::class, 'faqs'])->name('frontend.faqs');
Route::get('/term-condition', [FrontendController::class, 'termCondition'])->name('frontend.termCondition');
Route::get('/fleet-Detail/{id}',[FrontendController::class, 'fleetDetailsFrontend'])->name('frontend.fleetDetailsFrontend');
Route::get('/get-quote',[FrontendController::class, 'getquote'])->name('frontend.getquote');
Route::post('/get-quote',[FrontendController::class, 'getquotePost'])->name('frontend.getquotePost');


Route::get('/client-booking-payment', [BookingController::class, 'clientBookingPayment'])->name('frontend.clientBookingPayment');
// Route::middleware(['auth'])->group(function () {
    Route::get('/book-online', [BookingController::class, 'index'])->name('frontend.book-online');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/success', [BookingController::class, 'bookingSuccess'])->name('booking.success');
    Route::get('/apply-coupon/{code}', [ApplyCouponController::class, 'index'])->name('apply.coupon');
    Route::post('/store-coupon', [ApplyCouponController::class, 'store'])->name('apply.coupon.store');
    Route::get('/all-fleets', [BookingController::class, 'allFleets'])->name('frontend.allFleets');
    Route::get('/get-service-tax', [BookingController::class, 'getServiceTax']);
    Route::get('/get-select-service-tax', [BookingController::class, 'getSelectServiceTax']);


    Route::get('/fleet-details/{id}', [BookingController::class, 'fleettaxDetails'])->name('frontend.fleetDetails');
    
    Route::get('/user-history', [FrontendController::class, 'userHistory'])->name('frontend.userHistory');
    Route::get('/refund-payment',[FrontendController::class, 'refund'])->name('frontend.refund');
    Route::post('/refund-request',[FrontendController::class, 'refundRequest'])->name('frontend.refundRequest');

    Route::get('/review',[FrontendController::class, 'reviewget'])->name('frontend.reviewget');
    Route::post('/reviews',[FrontendController::class, 'reviewPost'])->name('frontend.reviewPost');
// });


Route::get('/fleet-details/{id}', [BookingController::class, 'fleetDetails'])->name('frontend.fleetDetails');
Route::get('/car-details/{id}', [CarsController::class, 'carDetails'])->name('frontend.carDetails');
Route::get('/trust-violet', [FrontendController::class, 'trustVoilet'])->name('frontend.trustVoilet');


Route::get('/signIn', [FrontendController::class, 'login'])->name('frontend.login');
Route::get('/signUp', [FrontendController::class, 'signup'])->name('frontend.signup');




Route::get('/paypal/payment', [PayPalController::class, 'createPayment'])->name('paypal.payment');
Route::get('/paypal/success', [PayPalController::class, 'executePayment'])->name('paypal.success');
Route::get('/paypal/cancel', [PayPalController::class, 'cancelPayment'])->name('paypal.cancel');


Route::post('/create-checkout-session/{id}', [PaymentController::class, 'createCheckoutSession'])->name('create.checkout.session');
Route::get('/payment-success/{id}', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment-cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');
Route::get('/get-payment/{id}', [PaymentController::class, 'showStripePaymentPage'])->name('stripe.payment');
Route::post('/prepare-for-registration', [PaymentController::class, 'prepareForRegistration'])->name('prepare-for-registration');



Route::get('/generate-paypal-link/{booking}', [PaymentController::class, 'generatePayPalLink']);
Route::get('/generate-stripe-link/{booking}', [PaymentController::class, 'generateStripeLink']);
Route::post('/paypal-webhook', [PaymentController::class, 'handlePayPalWebhook']);



