<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Frontend\CategoryResource;
use App\Http\Resources\Api\Frontend\OfferResource;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Section;
use App\Services\NewArrivalService;
use App\Services\TopRatingService;
use App\Services\TopSaleServices;
use Illuminate\Http\Response;

class HomeController extends Controller {

    public function index(): Response {
        return response([
            'topSales'    => TopSaleServices::topSalesQuery(),
            'topRatings'  => TopRatingService::topRatingsQuery(),
            'newArrivals' => NewArrivalService::newArrivalQuery(),
        ], 200);
    }

    public function getOffer(): Response{
        $offers = Offer::where('id', '!==', 1)->whereStatus(true)->where('expire_date', '>', now())
            ->latest('created_at')->take(3)
            ->get(['name', 'image', 'type', 'title', 'discount', 'status', 'expire_date']);
        return response(['offers' => OfferResource::collection($offers)], 200);
    }

    public function getCategory(): Response{
        $categories = Category::all(['name', 'image', 'slug']);
        return response(['categories' => CategoryResource::collection($categories)], 200);
    }

    public function getSidebar(): Response{
        $allCategory = Section::with('category:id,section_id,name,slug')->get(['id', 'name']);
        return response(compact('allCategory'), 200);
    }
}
