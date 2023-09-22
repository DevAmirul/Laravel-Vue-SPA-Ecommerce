<?php

namespace App\Providers;

use App\Interfaces\Payments;
use App\Repositories\Payments\StripeRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Payments::class,function(){
            return new StripeRepository;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
