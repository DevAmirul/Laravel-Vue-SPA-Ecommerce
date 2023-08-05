<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class NewArrivalService {

    public static function newArrivals(): object {
        return DB::table('products')
            ->join('discount_prices', 'products.id', '=', 'discount_prices.product_id')
            ->select(
                'products.id as p_id', 'products.name', 'products.sale_price', 'products.sku', 'products.image', 'discount_prices.discount'
            )->orderByDesc('products.created_at')->paginate(20);
    }
}
