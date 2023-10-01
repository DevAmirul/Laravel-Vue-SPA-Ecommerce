<?php

namespace App\Providers;

use App\Models\Editor;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider {
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void {

        /**
         * If the request comes from an API, change the URL when sending the reset password link.
         */
        if (request()->hasHeader('Authorization')) {
            ResetPassword::createUrlUsing(function (User $user, string $token) {
                return 'http://localhost:3000/reset-password/' . $token . '?email=' . $user->email;
            });
        }

        /**
         * Define all gate.
         */
        Gate::define('isAdmin', function () {
            return Auth::guard('editor')->user()->role === 1;
        });

        Gate::define('isAuthenticateEditor', function (Editor $editor, $requestId) {
            return $editor->id === $requestId;
        });
    }
}
