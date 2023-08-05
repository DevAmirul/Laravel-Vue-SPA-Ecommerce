<?php

namespace App\Services;

use App\Models\Product;

class relatedProductService {
    public static function relatedProduct($subCategoryId): object {
        return Product::with('DiscountPrice:product_id,discount,type')
            ->where('sub_category_id', $subCategoryId)
            ->get(['id', 'slug', 'name', 'image', 'sale_price']);
    }
}
