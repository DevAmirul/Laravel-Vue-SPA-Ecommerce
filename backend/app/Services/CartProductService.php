<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class CartProductService
{
    public static function getCartProduct($request){
        return DB::table('carts')
            ->select(
                'cart_items.id as item_id',
                'cart_items.cart_id',
                'cart_items.qty',
                'products.id as p_id',
                'products.name',
                'products.image',
                'products.sale_price',
                'discount_prices.discount',
                'discount_prices.type',
                'discount_prices.start_date',
                'discount_prices.expire_date'
            )
            ->join('cart_items', 'carts.id', '=', 'cart_items.cart_id')
            ->join('products', 'cart_items.product_id', '=', 'products.id')
            ->join('discount_prices', 'products.id', '=', 'discount_prices.product_id')
            ->where('carts.user_id', $request->id)->get();
    }
}
