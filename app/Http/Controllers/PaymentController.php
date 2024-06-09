<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use App\Models\Booking;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function createCheckoutSession($id, Request $request)
    
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $booking = Booking::find($id);
        $price = $booking->total_price;
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Booking Car',
                    ],
                    'unit_amount' => $price * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success', ['id' => $id]),
            'cancel_url' => route('payment.cancel', ['id' => $id]),
        ]);

        return response()->json(['id' => $session->id]);
    }
public function showStripePaymentPage($id)
{
    return view('create-checkout-session', ['bookingId' => $id]);
}
    public function paymentSuccess($id)
    {
        $booking = Booking::find($id);
        if ($booking) {
            $booking->is_payment = 1;
            $booking->is_draft = 0;
            $booking->save();
            
        Log::info('Payment successful, redirecting to booking success page.');
            return redirect()->route('booking.success')->with('success', 'Payment successful.');
        } else {
            // If the booking does not exist, redirect back with an error message
            return redirect()->back()->with('error', 'Booking not found.');
        }
    }
    

    public function paymentCancel()
    {
        return view('frontend.booking.cancel');
    }
    public function generatePayPalLink($bookingId)
{
    $paypalLink = "https://www.paypal.com/checkoutnow?token=" . $bookingId;
    
    return response()->json(['paypal_link' => $paypalLink]);
}
    
}
