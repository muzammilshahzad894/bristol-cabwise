<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        Stripe::setApiKey('YOUR_STRIPE_SECRET_KEY');

        $paymentMethodId = $request->input('payment_method_id');

        // Create a PaymentIntent and confirm it
        $intent = PaymentIntent::create([
            'payment_method' => $paymentMethodId,
            'amount' => 1000, // Amount in cents
            'currency' => 'usd',
            'confirmation_method' => 'manual',
            'confirm' => true,
        ]);

        // Handle payment success/failure and return response
        return response()->json(['success' => true]);
    }
    public function paymentSuccess()
    {
        dd('heere');
        return view('frontend.payment.success');
    }
}
