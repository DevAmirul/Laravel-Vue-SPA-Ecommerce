<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductView;
use App\Services\relatedProductService;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller {

    public function index(Request $request): Response{
        $product = Product::select('id', 'name', 'image', 'slug', 'description', 'sale_price', 'category_id', 'gallery', 'offer_id')
            ->where('slug', $request->slug)
            ->withCount('review')->withAvg('review', 'rating_value')
            ->with(['offer:id,discount,type,start_date,expire_date,status', 'productAttribute:product_id,color_attribute_values,size_attribute_values', 'review' => function ($query) {
                $query->take(10)->with('user:id,name');
            }])
            ->first();

        $relatedProducts = relatedProductService::relatedProductQuery($product->category_id);

        return response(compact('product', 'relatedProducts'), 200);
    }

    public function productViewCount(Request $request)  {
        ProductView::updateOrCreate(['product_id'=> $request->id],['view_count'=> DB::raw('view_count+' . 1)]);
    }
}
