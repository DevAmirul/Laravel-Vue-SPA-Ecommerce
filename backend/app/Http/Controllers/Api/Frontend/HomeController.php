<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\NewArrivalService;
use App\Services\TopRatingService;
use App\Services\TopSaleServices;
use Illuminate\Http\Response;

class HomeController extends Controller {

    /**
     * Handle the incoming request.
     */

    public function __invoke(): Response {
        return response([
            'categories'  => Category::all(['id', 'name']),
            'topSales'    => TopSaleServices::topSales(),
            'topRatings'  => TopRatingService::topRatings(),
            'newArrivals' => NewArrivalService::newArrivals(),
        ], 200);
    }
}
