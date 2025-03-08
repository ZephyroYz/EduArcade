<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    public function index()
    {
        // Verificar si ya ha pasado la verificación de edad
        if (!session('verificado_edad')) {
            session(['verificado_edad' => false]); // Si no se ha verificado, se marca como no verificado
        }
    
        return view('compras.index'); // Aquí puedes mostrar el formulario de compra
    }
    
    public function procesarEdad(Request $request, $verificado)
    {
        // Almacenar en la sesión si el usuario es mayor de edad
        session(['verificado_edad' => $verificado]);
    
        return redirect()->route('compra.index'); // Redirigir al formulario de compra
    }
    
}
