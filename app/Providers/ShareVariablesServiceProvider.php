<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;

class ShareVariablesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Verificar si el usuario está autenticado y ha comprado el software
        if (Auth::check()) {
            $compra = Compra::where('user_id', Auth::id())->first();
            $hasPurchased = $compra ? true : false;

            // Compartir la variable globalmente
            View::share('hasPurchased', $hasPurchased);
        }
    }

    public function register()
    {
        //
    }
}
