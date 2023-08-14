<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Section;
use App\Services\CategoryService;
use App\Services\NewArrivalService;
use App\Services\TopRatingService;
use App\Services\TopSaleServices;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return response([
            'topSales'    => TopSaleServices::topSalesQuery(),
            'topRatings'  => TopRatingService::topRatingsQuery(),
            'newArrivals' => NewArrivalService::newArrivalQuery(),
        ], 200);
    }

    public function getOffer(): Response
    {
        $offers = Offer::whereStatus(true)->where('expire_date', '>', now())
            ->latest('created_at')->take(3)
            ->get(['id', 'name', 'image', 'type', 'title', 'discount', 'status', 'expire_date']);
        return response(compact('offers'), 200);
    }

    public function getCategory(): Response
    {
        $categories = Category::all(['id', 'name', 'slug']);
        return response(compact('categories'), 200);
    }

    public function getSidebar(): Response
    {
        $allCategory = Section::with('category:id,section_id,name,slug')->get(['id', 'name']);
        return response(compact('allCategory'), 200);
    }
}
