<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Services\TopSaleServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TopSaleController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(): Response{
        $topSales = TopSaleServices::topSales();
        return response(compact('topSales'), 200);
    }
}
