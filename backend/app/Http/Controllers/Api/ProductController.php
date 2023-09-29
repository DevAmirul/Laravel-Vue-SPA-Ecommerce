<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductView;
use App\Services\relatedProductService;
use DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller {

    public function index(Request $request): JsonResponse {
        $product = Product::select('id', 'name', 'image', 'slug', 'description', 'sale_price', 'category_id', 'gallery', 'offer_id')
            ->where('slug', $request->slug)
            ->withCount('review')
            ->withAvg('review', 'rating_value')
            ->with(['offer:id,discount,type,start_date,expire_date,status',
                'review' => function ($query) {
                    $query->take(10)->with('user:id,name');
                }])
            ->first();

        $relatedProducts = relatedProductService::relatedProductQuery($product->category_id);

        return response()->json(compact('product', 'relatedProducts'));
    }

    public function productViewCount(Request $request) {
        ProductView::updateOrCreate(['product_id' => $request->id], ['view_count' => DB::raw('view_count+' . 1)]);
    }
}
