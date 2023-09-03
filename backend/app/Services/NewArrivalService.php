<?php

namespace App\Services;

use App\Http\Resources\Api\Frontend\ProductResource;
use Illuminate\Support\Facades\DB;

class NewArrivalService {

    public static function newArrivalQuery(): object {
        $products = DB::table('products')
            ->leftJoin('offers', 'products.offer_id', '=', 'offers.id')
            ->select('products.name','products.id as p_id', 'products.sale_price', 'products.slug', 'products.image', 'products.created_at','products.sku', 'offers.discount', 'offers.type', 'offers.status', 'offers.expire_date')->latest('products.created_at')->paginate(12);

        return ProductResource::collection($products);

    }
}
