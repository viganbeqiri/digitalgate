<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (!app()->isLocal()) {
            URL::forceScheme('https');
            Log::info('force https');
        } else {
            Log::info('force http');
        }
        Blade::component('components.datatable', 'datatable');
    }
}
