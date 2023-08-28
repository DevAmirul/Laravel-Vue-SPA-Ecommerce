<?php

namespace App\Http\Controllers\Api\Frontend\Layouts;

use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): Response
    {
        $settings = GeneralSettings::first( ['name', 'email', 'logo', 'slogan', 'banner', 'phone', 'address', 'facebook', 'youtube', 'instagram', 'twitter']);
        return response(compact('settings'));
    }
}
