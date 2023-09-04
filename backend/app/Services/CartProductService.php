<?php

namespace App\Services;

use App\Http\Resources\Api\Frontend\Users\CartResource;
use Illuminate\Support\Facades\DB;

class CartProductService
{
    public static function getCartProduct($request): Object{
        $cartItems = DB::table('carts')
            ->select(
                'carts.id',
                'cart_items.id as item_id',
                'cart_items.qty',
                'products.id as p_id',
                'products.name',
                'products.image',
                'products.sale_price',
                'offers.discount',
                'offers.type',
                'offers.status',
                'offers.expire_date'
            )
            ->join('cart_items', 'carts.id', '=', 'cart_items.cart_id')
            ->join('products', 'cart_items.product_id', '=', 'products.id')
            ->leftJoin('offers', 'products.offer_id', '=', 'offers.id')
            ->where('carts.user_id', $request->id)->get();

        return CartResource::collection($cartItems);
    }
}
