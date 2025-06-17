<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Checkout\Session as CheckoutSession;

use Stripe\Checkout\Session;
use Stripe\StripeClient;

class StripeService
{
    // public function __construct()
    // {
    //     // Set the Stripe secret key
    //     Stripe::setApiKey(config('services.stripe.secret'));
    // }

    private $stripe;

    public function __construct()
    {
        // $this->stripe = new StripeClient(config('services.stripe.secret'));
        $this->stripe = new StripeClient(config('stripe.stripe_test_sk'));
    }

    /**
     * Create a PaymentIntent
     *
     * @param int $amount
     * @param string $currency
     * @return PaymentIntent
     */


    public function stripeCheckout(array $data,string $successUrl, string $cancelUrl, string $currency = 'usd',$amount, $lineItems = null)
    {
        try {
            // dd("helo");
            // Create a Stripe Checkout Session
            $response = $this->stripe->checkout->sessions->create([
                'success_url' => $successUrl . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => $cancelUrl,
                'customer_email' => $data['email'] ?? null,
                'payment_method_types' => ['link', 'card'],
                'line_items' => $lineItems ?? [
                    [
                        'price_data' => [
                            'currency' => $currency ?? 'usd',
                            'product_data' => [
                                'name' => $data['product_name'] ?? 'Product',
                            ],
                            'unit_amount' => $amount * 100,
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'metadata' => [
                    'order_data' => json_encode($data) ?? null,
                ],
            ]);

            return $response->url ?? false;
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            // dd($e->getMessage());
            return false;
        }
    }


    /**
     * Handle Stripe Checkout Success
     *
     * @param string $sessionId
     * @return array|null
     */
    public function stripeCheckoutSuccess(string $sessionId)
    {
        try {
            // Retrieve session and payment details
            $session = $this->stripe->checkout->sessions->retrieve($sessionId, []);
            $paymentIntent = $session->payment_intent;
            $paymentIntentResponse = $this->stripe->paymentIntents->retrieve($paymentIntent, ['expand' => ['payment_method']]);

            return [
                'session_data' => json_decode($session->metadata->order_data, true),
                'payment_method' => $paymentIntentResponse->payment_method->card,
                'transaction_id' => $paymentIntentResponse->id,
            ];
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            Log::error($e->getMessage());
            return null;
        }
    }
}
