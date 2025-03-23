<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
    
            // Asegurar que Laravel detecte correctamente los encabezados de proxy
            \Illuminate\Support\Facades\Request::setTrustedProxies(
                [Request::server('REMOTE_ADDR')],
                Request::HEADER_X_FORWARDED_ALL
            );
        }
    }
    
}
