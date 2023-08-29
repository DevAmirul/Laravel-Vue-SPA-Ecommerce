<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class NewArrivalService {

    public static function newArrivalQuery(): object {
        return DB::table('products')
            ->join('offers', 'products.offer_id', '=', 'offers.id')
            ->select('products.name','products.id as p_id', 'products.sale_price', 'products.slug', 'products.image','offers.discount', 'offers.type', 'offers.status', 'offers.expire_date')->latest('products.created_at')->paginate(12);
    }
}
