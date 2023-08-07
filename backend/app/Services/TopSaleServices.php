<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class TopSaleServices {

    public static function topSalesQuery(): object {
        return DB::table('products')
            ->join('discount_prices', 'products.id', '=', 'discount_prices.product_id')
            ->join('revenue_from_purchase_and_sale_of_products', 'products.id', '=', 'revenue_from_purchase_and_sale_of_products.product_id')
            ->select( 'products.name', 'products.sale_price', 'discount_prices.discount', 'products.slug', 'products.image' )
            ->orderByDesc('revenue_from_purchase_and_sale_of_products.revenue')
            ->paginate(12);
    }
}
