<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(ContactUsRequest $request): JsonResponse {
        ContactUs::create($request->validated());

        return response()->json(['message' => 'We will respond you very soon']);
    }
}
