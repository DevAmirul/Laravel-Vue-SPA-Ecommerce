<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TopRatingService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TopRatingController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(): Response{
        $topRatings = TopRatingService::topRatingsQuery();
        return response(compact('topRatings'), 200);
    }
}
