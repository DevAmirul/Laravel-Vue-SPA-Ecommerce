<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Frontend\ProductCollection;
use App\Http\Resources\Api\Frontend\ProductResource;
use App\Models\Product;
use App\Services\SearchProductService;
use Illuminate\Http\Request;

class ShopController extends Controller {

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Object{
        return SearchProductService::searchProductQuery($request);
    }
}
