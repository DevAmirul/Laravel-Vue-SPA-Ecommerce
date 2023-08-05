<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Services\NewArrivalService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewArrivalController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(): Response{
        $newArrivals = NewArrivalService::newArrivals();
        return response(compact('newArrivals'), 200);
    }
}
