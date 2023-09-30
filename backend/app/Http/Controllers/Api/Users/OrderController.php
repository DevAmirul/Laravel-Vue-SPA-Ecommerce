<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Frontend\Users\OrderResource;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller {

    /**
     * Get order list by authenticated user.
     */
    public function __invoke(Request $request): JsonResponse {
        $orders = Order::whereUserId($request->id)->withCount('orderItem')
            ->get(['id', 'user_id', 'order_status', 'total', 'payment_status', 'created_at']);

        return response()->json(['orders' => OrderResource::collection($orders)]);
    }
}
