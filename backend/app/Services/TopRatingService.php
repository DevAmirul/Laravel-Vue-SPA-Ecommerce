<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class TopRatingService {

    public static function topRatingsQuery(): object {
        return DB::table('products')
            ->join('reviews', 'products.id', '=', 'reviews.product_id')
            ->join('discount_prices', 'reviews.product_id', '=', 'discount_prices.product_id')
            ->selectRaw('count(reviews.product_id) as p_id_count, avg(rating_value) as rating, products.name, products.sale_price, products.slug, products.image')
            ->groupBy('reviews.product_id')
            ->orderByDesc('products.created_at')->paginate(12);
    }
}
