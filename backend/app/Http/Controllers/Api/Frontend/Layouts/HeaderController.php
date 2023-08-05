<?php

namespace App\Http\Controllers\Api\Frontend\Layouts;

use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HeaderController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(): Response {
        return response(GeneralSettings::all());
    }
}
