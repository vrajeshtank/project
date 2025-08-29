<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\CustomClass; // Import your custom class

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CustomClass::class, function ($app) {
            return new CustomClass();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
