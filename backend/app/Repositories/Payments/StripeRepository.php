<?php

namespace App\Repositories\Payments;

use App\Interfaces\Payments;
use App\Models\Order;
use Illuminate\Http\Request;

class StripeRepository implements Payments
{
    public function checkOut()  {
        $stripe = new \Stripe\StripeClient(config('app.stripeSecretKey'));

        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'T-shirt',
                    ],
                    'unit_amount' => 2000,
                ],
                'quantity' => 1,
            ]],
            'customer_creation'=> 'always',
            'payment_method_types' => ['card'],
            'customer_email'=> 'mailbox.amirul@gmail.com',
            'mode' => 'payment',
            'success_url' => config('app.url') . '/payment/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.cancel'),
        ]);

        // return $checkout_session->url;
        return redirect()->away($checkout_session->url);
    }

    public function success() {
        $stripe = new \Stripe\StripeClient(config('app.stripeSecretKey'));

        $session = $stripe->checkout->sessions->retrieve(request()->get('session_id'));

        $customer = $stripe->customers->retrieve($session->customer);
        // dd($retrieveData->payment_intent, $retrieveData->customer, $retrieveData->customer_email, $retrieveData->payment_method_types[0]);
        dd($customer);
        // Order::find()
    }

    public function cancel() {
        return response(['status'=> ],200);
    }
}