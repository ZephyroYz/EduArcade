<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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
        // Forzar HTTPS en producción
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        // Definir la política de autorización para administradores
        Gate::define('is-admin', function (User $user) {
            return $user->role === 'admin';
        });
    }
}
