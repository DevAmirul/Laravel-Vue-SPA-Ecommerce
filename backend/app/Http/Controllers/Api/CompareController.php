<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Frontend\ProductResource;
use App\Http\Resources\Api\Frontend\ProductShowCollection;
use App\Http\Resources\Api\Frontend\ProductShowResources;
use App\Http\Resources\Api\Frontend\Users\ProductCollection;
use App\Models\Product;
use App\Services\ProductService;
use DB;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $products = Product::select('id', 'name', 'image', 'slug', 'description', 'sale_price', 'offer_id')
        ->whereIn('products.id', $request->data['productIdArray'])
        ->withCount('review')->withAvg('review', 'rating_value')
        ->with('offer:id,discount,type,status,expire_date')
        ->get();

        return response(['products'=>ProductShowResources::collection($products)], 200);
    }
}
