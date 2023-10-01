<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\JsonResponse;

class ReviewController extends Controller {

    /**
     * Save it when users send reviews.
     */
    public function store(ReviewRequest $request): JsonResponse {
        Review::create($request->validated());

        return response()->json(['status' => 'Successfully added review']);
    }
}
