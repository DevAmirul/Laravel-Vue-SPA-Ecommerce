<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SearchProductService;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    /**
     * Get products based on category.
     */
    public function __invoke(Request $request): object {
        return SearchProductService::searchProductQuery($request, 'categories');
    }
}
