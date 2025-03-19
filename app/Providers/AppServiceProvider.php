<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Artisan;

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
        if ($this->app->environment('production')) {
            URL::forceScheme('https'); // Asegura que los enlaces sean HTTPS
    
            // Verifica si el enlace simbólico de storage existe, si no, lo crea
            if (!is_link(public_path('storage'))) {
                Artisan::call('storage:link');
            }
        }
    }
}

