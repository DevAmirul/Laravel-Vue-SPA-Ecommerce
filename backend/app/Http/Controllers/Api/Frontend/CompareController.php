<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Frontend\ProductResource;
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
        $products = Product::select('id', 'name', 'image', 'slug', 'description', 'sale_price', 'category_id', 'brand_id')
        ->whereIn('products.id', $request->data['productIdArray'])
        ->withCount('review')->withAvg('review', 'rating_value')
        ->with('discountPrice:product_id,discount,type,start_date,expire_date')
        ->get();

        return response(compact('products'), 200);
    }
}
