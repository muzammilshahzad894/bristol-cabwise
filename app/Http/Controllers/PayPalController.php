<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PayPalService;

class PayPalController extends Controller
{
    private $payPalService;

    public function __construct(PayPalService $payPalService)
    {
        $this->payPalService = $payPalService;
    }

    public function createPayment(Request $request)
    {
        $price = $request->get('price');
        // dd($price);
        $payment = $this->payPalService->createPayment(
            $price,
            'USD',
            'paypal', 
            'sale',
            'Book a car payment.', 
            route('paypal.success'), 
            route('paypal.cancel') 
        );

        if ($payment) {
            return redirect()->away($payment->getApprovalLink());
        }

        return redirect()->route('paypal.cancel');
    }

    public function executePayment(Request $request)
    {
        $paymentId = $request->get('paymentId');
        $payerId = $request->get('PayerID');

        $result = $this->payPalService->executePayment($paymentId, $payerId);

        if ($result) {
            // return redirect()->route('/')->with('success', 'Payment successful.');
            return view('welcome');
        }

        return redirect()->route('/')->with('error', 'Payment failed.');
    }

    public function cancelPayment()
    {
        return view('welcome');
        // return redirect()->route('/')->with('error', 'Payment canceled.');
    }
}