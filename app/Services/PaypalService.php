<?php

namespace App\Services;

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class PayPalService
{
    private $apiContext;

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('paypal.client_id'),
                config('paypal.secret')
            )
        );

        $this->apiContext->setConfig(config('paypal.settings'));
    }

    public function createPayment($total, $currency, $paymentMethod, $intent, $description, $successUrl, $cancelUrl)
    {
        $payer = new Payer();
        $payer->setPaymentMethod($paymentMethod);

        $amount = new Amount();
        $amount->setTotal($total);
        $amount->setCurrency($currency);

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription($description);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($successUrl)->setCancelUrl($cancelUrl);

        $payment = new Payment();
        $payment->setIntent($intent)
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions([$transaction]);

        try {
            $payment->create($this->apiContext);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // Handle exception
            return false;
        }

        return $payment;
    }

    public function executePayment($paymentId, $payerId)
    {
        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $result = $payment->execute($execution, $this->apiContext);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // Handle exception
            return false;
        }

        return $result;
    }
}
