<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller {
    /**
     * Handle the incoming request.
     */

    public function __invoke(Request $request): Response{
        $product = Product::find($request->id);
        return response(compact('product'), 200);
    }
}
