<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Frontend\ProductShowResources;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompareController extends Controller {
    /**
     * Get compare products.
     */
    public function __invoke(Request $request): JsonResponse {
        $products = Product::select('id', 'name', 'image', 'slug', 'description', 'sale_price', 'offer_id')
            ->whereIn('products.id', $request->data['productIdArray'])
            ->withCount('review')->withAvg('review', 'rating_value')
            ->with('offer:id,discount,type,status,expire_date')
            ->get();

        return response()->json(['products' => ProductShowResources::collection($products)]);
    }
}
