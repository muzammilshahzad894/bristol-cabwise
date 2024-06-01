<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use App\Models\Booking;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function createCheckoutSession(Request $request)
    
    {
        
        Stripe::setApiKey(config('services.stripe.secret'));
        
        $price = $request->price;
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Sample Product',
                    ],
                    'unit_amount' => $price * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ]);

        return response()->json(['id' => $session->id]);
    }

    public function paymentSuccess()
    {
        $booking = Booking::where('user_id', 1)->first();
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
        return view('payment.cancel');
    }
    
}
