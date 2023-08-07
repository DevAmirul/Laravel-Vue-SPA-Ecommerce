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
        // return response($request->input(), 200);

        $user = new Order();
        $user->user_id = $request->user_id;
        $user->order_status = $request->order_status;
        $user->discount = $request->discount;
        $user->subtotal = $request->subtotal;
        $user->total = $request->total;
        $user->payment_status = $request->payment_status;
        $user->shipping_method_id = $request->shipping_method_id;
        $user->coupon_id = $request->coupon_id;
        $user->save();

        return response(true, 200);
    }
}
