<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SearchProductService;
use App\Services\TopSaleServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TopSaleController extends Controller {

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Object{
        return SearchProductService::searchProductQuery($request, 'sales');
    }
}
