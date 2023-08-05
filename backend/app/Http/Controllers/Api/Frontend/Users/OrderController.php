<?php

namespace App\Http\Controllers\Api\Frontend\Users;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller {

    public function showOrdersQuery(Request $request): Response{
        $orders = Order::whereUserId($request->id)->get(['id', 'order_status', 'total', 'payment_status']);
        return response(compact('orders'), 200);
    }
}
