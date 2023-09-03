<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactController extends Controller {

    /**
     * Handle the incoming request.
     */
    public function __invoke(ContactUsRequest $request): Response{
        ContactUs::create($request->validated());
        return response(true, 200);
    }
}
