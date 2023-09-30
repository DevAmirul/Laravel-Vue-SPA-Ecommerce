<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SearchProductService;
use Illuminate\Http\Request;

class ShopController extends Controller {

    /**
     * Get products for shop page.
     */
    public function __invoke(Request $request): object {
        return SearchProductService::searchProductQuery($request);
    }
}
