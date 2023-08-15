<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class NewArrivalService {

    public static function newArrivalQuery(): object {
        return DB::table('products')
            ->join('discount_prices', 'products.id', '=', 'discount_prices.product_id')
            ->select('products.name','products.id as p_id', 'products.sale_price', 'discount_prices.discount', 'products.slug', 'products.image')->latest('products.created_at')->paginate(12);
    }
}
