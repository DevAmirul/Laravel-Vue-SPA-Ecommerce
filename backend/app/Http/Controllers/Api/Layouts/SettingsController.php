<?php

namespace App\Http\Controllers\Api\Layouts;

use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use Illuminate\Http\JsonResponse;

class SettingsController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(): JsonResponse {
        $settings = GeneralSettings::first(['name', 'email', 'logo', 'slogan', 'banner', 'phone', 'address', 'facebook', 'youtube', 'instagram', 'twitter']);

        return response()->json(compact('settings'));
    }
}
