<?php

namespace App\Http\Controllers\BackendAuth;

use App\Http\Controllers\Controller;
use App\Models\Editor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:editors,email|max:255',
            'phone'    => 'required|string|max:11',
            'city'     => 'required|string|max:255',
            'address'  => 'required|string|max:255',
            'state'    => 'required|string|max:255',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ]);
        
        $editor = Editor::create($validated);

        event(new Registered($editor));

        return redirect()->route('editors');
    }
}
