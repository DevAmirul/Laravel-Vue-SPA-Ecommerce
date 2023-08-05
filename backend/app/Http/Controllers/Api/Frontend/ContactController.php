<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Response;

class ContactController extends Controller {

    /**
     * Handle the incoming request.
     */
    public function __invoke(): Response{
        // $validate          = $this->validate();
        Contact::create();
        return response(true, 200);
    }
}
