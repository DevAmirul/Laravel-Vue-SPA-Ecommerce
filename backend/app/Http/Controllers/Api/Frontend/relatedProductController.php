<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Services\relatedProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class relatedProductController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response{
        $relatedProducts = relatedProductService::relatedProduct($request->subCateId);
        return response(compact('relatedProducts'), 200);
    }
}
