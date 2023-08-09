<?php

namespace App\Http\Controllers\Api\Frontend\Users;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckoutController extends Controller
{

    public function createCheckout(Request $request): Response
    {
        return response($request->data, 200);

        $user = new Order();
        $user->user_id = $request->data['user_id'];
        $user->discount = $request->data['discount'];
        $user->subtotal = $request->data['subtotal'];
        $user->total = $request->data['total'];
        $user->payment_status = $request->data['payment_status'];
        $user->shipping_method_id = $request->data['shipping_method_id'];
        $user->coupon_id = $request->data['coupon_id'];
        $user->save();
        $user->orderItem()->create(
            [
                'product_id' => $request->data['discount'],
                'qty' => $request->data['discount'],
                'discount_price' => $request->data['discount'],
            ]
        );

        return response(true, 200);
    }
}
