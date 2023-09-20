<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function checkOut(Request $request) : void {

        $stripe = new \Stripe\StripeClient();

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
                'mode' => 'payment',
                'success_url' => 'http://localhost:3000/payment/success',
                'cancel_url' => 'http://localhost:3000/payment/cancel',
            ]);
    }

    // public function success() : View {
    //     return view('payment.success');
    // }

    // public function cancel() : View {
    //     return view('payment.cancel');
    // }
}
