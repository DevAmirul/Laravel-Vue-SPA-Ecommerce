<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class TopSaleServices {

    public static function topSalesQuery(): object {
        return DB::table('products')
            ->join('offers', 'products.offer_id', '=', 'offers.id')
            ->join('revenue_from_purchase_and_sale_of_products', 'products.id', '=', 'revenue_from_purchase_and_sale_of_products.product_id')
            ->select('products.id as p_id','products.name', 'products.sale_price', 'products.slug', 'products.image','offers.discount', 'offers.type', 'offers.status', 'offers.expire_date' )
            ->orderByDesc('revenue_from_purchase_and_sale_of_products.revenue')
            ->paginate(12);
    }
}
