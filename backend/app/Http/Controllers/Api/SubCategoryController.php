<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SearchProductService;
use Illuminate\Http\Request;

class SubCategoryController extends Controller {
    /**
     * Get products based on subcategory.
     */
    public function __invoke(Request $request): object {
        return SearchProductService::searchProductQuery($request, 'subCategories');
    }
}
