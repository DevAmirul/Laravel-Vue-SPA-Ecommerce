<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Response;

class ReviewController extends Controller
{
    public function create(ReviewRequest $request) : Response {
        Review::create($request->validated());
        return response(true, 200);
    }
}
