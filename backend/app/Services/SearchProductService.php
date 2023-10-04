<?php

namespace App\Services;

use App\Http\Resources\Api\Frontend\ProductCollection;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class SearchProductService {
    /**
     * Get products by dynamic search.
     */
    public static function searchProductQuery(object $request, ?string $optionalRequest = null): object {
        $products = DB::table('products')
            ->select(DB::raw('DISTINCT(products.id) as p_id'), 'products.name', 'products.sale_price', 'products.slug', 'products.sku', 'products.image', 'products.created_at', 'offers.discount', 'offers.type', 'offers.status', 'offers.expire_date')
            ->leftJoin('offers', 'products.offer_id', '=', 'offers.id')
            ->where('products.status', '=', 1)
            ->when($optionalRequest === 'offers', function ($query) use ($request) {
                $query->where('offers.slug', $request->slug);
            })
            ->when($optionalRequest === 'categories', function ($query) use ($request) {
                $query->join('categories', 'products.category_id', '=', 'categories.id')
                    ->where('categories.slug', $request->slug);
            })
            ->when($optionalRequest === 'subCategories', function ($query) use ($request) {
                $query->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
                    ->where('sub_categories.slug', $request->slug);
            })
            ->when($optionalRequest === 'brands', function ($query) use ($request) {
                $query->join('brands', 'products.brand_id', '=', 'brands.id')
                    ->where('brands.slug', $request->slug);
            })
            ->when($optionalRequest === 'sales', function ($query) {
                $query->where('offers.discount', '>', 0)->where('expire_date', '>', now());
            })
            ->when($request->minPrice && $request->maxPrice, function ($query) use ($request) {
                $query->whereBetween('products.sale_price', [$request->minPrice, $request->maxPrice]);
            })
            ->when($request->attribute, function ($query) use ($request) {
                $query->join('product_attributes', 'products.id', '=', 'product_attributes.product_id')
                    ->where(function ($query) use ($request) {
                        $query->where('product_attributes.values', 'REGEXP', $request->attribute);
                    });
            })
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('products.name', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('products.tags', 'LIKE', '%' . $request->search . '%');
                });
            })
            ->when($request->sort, function ($query) use ($request) {
                if ($request->sort === 'oldest') {
                    $query->oldest();
                } elseif ($request->sort === 'p_low_to_high') {
                    $query->orderBy('products.sale_price');
                } elseif ($request->sort === 'p_high_to_low') {
                    $query->orderByDesc('products.sale_price');
                } elseif ($request->sort === 'asc') {
                    $query->orderBy('products.name');
                } elseif ($request->sort === 'des') {
                    $query->orderByDesc('products.name');
                } elseif ($request->sort === 'latest') {
                    $query->latest();
                }

            }, fn($query) => $query->latest())
            ->paginate($request->limit ?? 20);

        return new ProductCollection($products);
    }
}
