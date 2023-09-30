<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Frontend\Users\OrderItemResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderItemController extends Controller {

    /**
     * Get the item ordered by the authenticated user.
     */
    public function __invoke(Request $request): JsonResponse {
        $orderItems = DB::table('orders')->where('orders.id', '=', $request->id)
            ->leftJoin('coupons', 'orders.coupon_id', '=', 'coupons.id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('billing_details', 'users.id', '=', 'billing_details.user_id')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->select(
                'orders.id',
                'orders.order_status',
                'orders.payment_status',
                'orders.discount',
                'orders.subtotal',
                'orders.total',
                'orders.created_at',
                'coupons.discount as c_discount',
                'users.name as user_name',
                'users.email',
                'billing_details.phone',
                'billing_details.city',
                'billing_details.state',
                'billing_details.zip_code',
                'billing_details.address',
                'order_items.qty',
                'order_items.discount_price',
                'products.id as p_id',
                'products.name',
                'products.image',
                'products.sale_price',
                'products.original_price',
            )->get();

        return response()->json(['orderItems' => OrderItemResource::collection($orderItems)]);
    }
}
