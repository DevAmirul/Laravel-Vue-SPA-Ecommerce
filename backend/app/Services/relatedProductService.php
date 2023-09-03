<?php

namespace App\Services;

use App\Models\Product;

class relatedProductService {

    public static function relatedProductQuery($subCategoryId): object {
        return Product::where('sub_category_id', $subCategoryId)->take(15)
            ->with('offer:id,discount,type,start_date,expire_date,status')
            ->get(['id', 'slug', 'name', 'image', 'sale_price']);
    }
}
