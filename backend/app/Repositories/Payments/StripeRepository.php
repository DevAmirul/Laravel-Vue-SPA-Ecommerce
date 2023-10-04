<?php

namespace App\Repositories\Payments;

use App\Interfaces\Payments;
use App\Models\Order;
use App\Models\PaymentType;
use App\Models\UserPayment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Redirect;

class StripeRepository implements Payments {

    public function __construct(protected Request $request) {}

    public function checkOut(?object $order): array {

        if (!$order) {
            $order = Order::where('id', $this->request->id)->first();
        }

        $stripe = new \Stripe\StripeClient(config('app.stripeSecretKey'));

        $checkout_session = $stripe->checkout->sessions->create([
            'line_items'           => [[
                'price_data' => [
                    'currency'     => 'usd',
                    'product_data' => [
                        'name' => 'Your total bill',
                    ],
                    'unit_amount'  => $order->total * 100,
                ],
                'quantity'   => 1,
            ]],
            'customer_creation'    => 'always',
            'payment_method_types' => ['card'],
            // 'customer_email'       => 'example@mail.com',
            'mode'                 => 'payment',
            'success_url'          => config('app.url') . '/payment/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'           => route('payment.cancel'),
        ]);

        return ['stripeUrl' => $checkout_session->url, 'sessionId' => $checkout_session->id];
    }

    public function success(): RedirectResponse {
        $sessionId = $this->request->get('session_id');

        $stripe = new \Stripe\StripeClient(config('app.stripeSecretKey'));

        $session = $stripe->checkout->sessions->retrieve($sessionId);

        $paymentType = PaymentType::firstWhere('type', 'Online Payment');

        $order                 = Order::where('session_id', $sessionId)->first();
        $order->payment_status = 1;
        $order->save();

        $order->userPayment()->create([
            'payment_type_id' => $paymentType->id,
            'customer_id'     => $session->customer,
            'payment_intent'  => $session->payment_intent,
            'amount'          => $session->amount_total / 100,
        ]);

        return redirect()->away('http://localhost:3000/payment/success');
    }

    public function cancel(): RedirectResponse {
        return redirect()->away('http://localhost:3000/payment/cancel');
    }
}