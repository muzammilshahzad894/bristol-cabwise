<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

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
        return view('payment.success');
    }

    public function paymentCancel()
    {
        return view('payment.cancel');
    }
}
