<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('authVendor', function () {
            return auth()->user()->role === 'vendor';
        });
        Blade::if('vendor', function ($user) {
            return $user->role === 'vendor';
        });
        Blade::if('authDelivery', function () {
            return auth()->user()->role === 'delivery';
        });
        Blade::if('delivery', function ($user) {
            return $user->role === 'delivery';
        });
    }
}
