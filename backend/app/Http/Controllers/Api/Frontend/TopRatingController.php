<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Services\TopRatingService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TopRatingController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(): Response{
        $topRatings = TopRatingService::topRatings();
        return response(compact('topRatings'), 200);
    }
}
