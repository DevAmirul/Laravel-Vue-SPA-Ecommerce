<?php

namespace App\Http\Controllers\Api\Frontend\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): Response{
        $topSales = TopSaleServices::topSalesQuery();
        return response(compact('topSales'), 200);
    }
}
