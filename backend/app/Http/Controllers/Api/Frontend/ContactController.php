<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactController extends Controller {

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response{
        // $validate          = $this->validate();
        ContactUs::create($request->formData);
        return response(true, 200);
    }
}
