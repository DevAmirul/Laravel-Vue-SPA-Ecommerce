<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Frontend\Users\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller {

    public function index(Request $request): Response{
        $orders = Order::whereUserId($request->id)->withCount('orderItem')
        ->get(['id','user_id','order_status', 'total', 'payment_status','created_at']);

        $orders = OrderResource::collection($orders);
        return response(compact('orders'), 200);
    }
}
