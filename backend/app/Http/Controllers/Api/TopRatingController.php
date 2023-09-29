<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TopRatingService;
use Illuminate\Http\JsonResponse;

class TopRatingController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(): JsonResponse {
        $topRatings = TopRatingService::topRatingsQuery();
        return response()->json(compact('topRatings'));
    }
}
