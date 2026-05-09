<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DescargaController extends Controller
{
    public function index()
    {
        // Verifica si el usuario ha realizado alguna compra
        $hasPurchased = Compra::where('user_id', Auth::id())->exists();

        // Pasa la variable a la vista
        return view('descarga', compact('hasPurchased'));
    }
}
