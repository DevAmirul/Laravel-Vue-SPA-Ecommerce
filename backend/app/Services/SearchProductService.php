<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class SearchProductService {
    public string $priceAcce     = '';
    public string $searchStr     = '';
    public string $latest        = '';
    public string $filterByPrice = '';
    public string $category      = '';
    public string $subcategory   = '';
    public string $section       = '';

    public static function searchProductQuery(): object {
        return DB::table('products')
            ->join('discount_prices', 'products.id', '=', 'discount_prices.product_id')
            ->when(false, function ($query) {
                $query->join('brands', 'products.brand_id', '=', 'brands.id');
            })
            ->when(false, function ($query) {
                $query->join('categories', 'products.category_id', '=', 'categories.id');
            })
            ->when(false, function ($query) {
                $query->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id');
            })
            ->select('products.id as p_id', 'products.name', 'products.sale_price', 'products.slug', 'products.sku', 'products.image', 'discount_prices.discount')
            ->when(false, function ($query) {
                $query->whereBetween('products.sale_price', [1, 100]);
            })
            ->when(false, function ($query) {$query->where('brands.slug', 'slug');})
            ->when(false, function ($query) {$query->where('categories.slug', 'slug');})
            ->when(false, function ($query) {$query->where('sub_categories.slug', 'slug');})
            ->when(false, function ($query) {
                $query->where('products.name', 'LIKE', '%' . $this->searchStr . '%')
                    ->orWhere('products.tags', 'LIKE', '%' . $this->searchStr . '%')
                    ->orWhere('products.sku', 'LIKE', '%' . $this->searchStr . '%')
                    ->orWhere('products.sale_price', 'LIKE', '%' . $this->searchStr . '%');
            })
            ->when(false, function ($query) { $query->orderByDesc('products.sale_price'); })
            ->when(false, function ($query) { $query->latest(); })->paginate(20);
    }
}
