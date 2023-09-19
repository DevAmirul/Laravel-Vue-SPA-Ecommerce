<?php

namespace App\Http\Controllers\FrontendAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontendAuth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): Response
    {
        $authUser = $request->authenticate();

        return response([
            'user' => $authUser['user'],
            'access_token' => $authUser['token'],
            'token_type' => 'bearer',
        ], 200);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        Auth::user()->tokens()->delete();

        return response(['message'=> 'Successfully Logout'], 200);
    }
}
