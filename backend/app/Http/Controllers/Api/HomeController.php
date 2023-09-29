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
use Illuminate\Http\JsonResponse;

class HomeController extends Controller {

    public function index(): JsonResponse {
        return response()->json([
            'topSales'    => TopSaleServices::topSalesQuery(),
            'topRatings'  => TopRatingService::topRatingsQuery(),
            'newArrivals' => NewArrivalService::newArrivalQuery(),
        ]);
    }

    public function getOffer(): JsonResponse {
        $offers = Offer::where('id', '!==', 1)->whereStatus(true)->where('expire_date', '>', now())
            ->latest('created_at')->take(3)
            ->get(['name', 'image', 'type', 'title', 'discount', 'status', 'expire_date']);

        return response()->json(['offers' => OfferResource::collection($offers)]);
    }

    public function getCategory(): JsonResponse {
        $categories = Category::all(['name', 'image', 'slug']);
        return response()->json(['categories' => CategoryResource::collection($categories)]);
    }

    public function getSidebar(): JsonResponse {
        $allCategory = Section::with('category:id,section_id,name,slug')->get(['id', 'name']);
        return response()->json(compact('allCategory'));
    }
}
