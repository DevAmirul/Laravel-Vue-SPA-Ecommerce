<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TopRatingService;
use Illuminate\Http\JsonResponse;

class TopRatingController extends Controller {

    /**
     * Get Top ratting products from service.
     */
    public function __invoke(): JsonResponse {
        $topRatings = TopRatingService::topRatingsQuery();

        return response()->json(compact('topRatings'));
    }
}
