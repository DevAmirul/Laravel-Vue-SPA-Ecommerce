<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Services\relatedProductService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function productDetails(Request $request): Response
    {
        $product = Product::select('id', 'name', 'image', 'slug', 'description', 'sale_price','category_id','gallery')
            ->where('slug', $request->slug)
            ->withCount('review')->withAvg('review', 'rating_value')
            ->with(['discountPrice:product_id,discount,type,start_date,expire_date', 'productAttribute:product_id,attribute_name,attribute_values', 'review' => function ($query) {
                    $query->take(10)->with('user:id,name');
                }
            ])
            ->get();

        $relatedProducts = relatedProductService::relatedProductQuery($product[0]->category_id);
        return response(compact('product', 'relatedProducts'), 200);
    }
}
