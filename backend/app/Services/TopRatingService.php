<?php

namespace App\Services;

use App\Http\Resources\Api\Frontend\ProductResource;
use Illuminate\Support\Facades\DB;

class TopRatingService {

    /**
     * Get Top ratting products.
     */
    public static function topRatingsQuery(): object {
        $products = DB::table('products')
            ->join('reviews', 'products.id', '=', 'reviews.product_id')
            ->leftJoin('offers', 'products.offer_id', '=', 'offers.id')
            ->selectRaw('count(reviews.product_id) as p_id_count, avg(rating_value) as rating,  products.name, products.id as p_id, products.sale_price, products.slug, products.sku, products.image, products.created_at, offers.discount, offers.type, offers.status, offers.expire_date')
            ->groupBy('reviews.product_id')
            ->orderByDesc('products.created_at')->paginate(12);

        return ProductResource::collection($products);
    }
}
