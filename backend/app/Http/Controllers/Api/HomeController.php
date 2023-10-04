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

    /**
     * Get json data for frontend home.
     */
    public function index(): JsonResponse {
        return response()->json([
            'topSales'    => TopSaleServices::topSalesQuery(),
            'topRatings'  => TopRatingService::topRatingsQuery(),
            'newArrivals' => NewArrivalService::newArrivalQuery(),
        ]);
    }

    /**
     * Get all offer.
     */
    public function getOffer(): JsonResponse {
        $offers = Offer::whereStatus('1')->where('expire_date', '>', now())
            ->latest()->take(3)
            ->get(['name', 'slug', 'image', 'type', 'title', 'discount', 'status', 'expire_date']);

        return response()->json(['offers' => OfferResource::collection($offers)]);
    }

    /**
     * Get all category.
     */
    public function getCategory(): JsonResponse {
        $categories = Category::whereStatus(1)->get(['name', 'image', 'slug']);
        return response()->json(['categories' => CategoryResource::collection($categories)]);
    }

    /**
     * Get sections and categories for navbar.
     */
    public function getNavbar(): JsonResponse {
        $allCategory = Section::with('category:id,section_id,name,slug')->get(['id', 'name']);
        return response()->json(compact('allCategory'));
    }
}
