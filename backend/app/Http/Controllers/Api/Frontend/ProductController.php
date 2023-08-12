<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function __invoke(Request $request): Response
    {
        $product = Product::select('id', 'name', 'image', 'slug', 'description', 'sale_price')
            ->where('id', 1)
            // ->where('products.slug', $request->slug)
            ->withCount('review')->withAvg('review', 'rating_value')
            ->with(['discountPrice:product_id,discount,type,start_date,expire_date', 'productAttribute:product_id,attribute_name,attribute_values','review'])
            ->get();


            // :product_id,user_id,rating_value,comment

        // $product = Product::where('id', 1)->with(['review' => function ($query) {
        //         $query->where('status', 1);
        //     }])->get();

        return response (compact('product'), 200);
    }
}
