<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; // Asegúrate de importar Carbon

class CompraController extends Controller
{
    public function index()
    {
        return view('compras.index'); // Aquí puedes mostrar el formulario de compra
    }

    public function procesarCompra(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string',
            'numero_tarjeta' => 'required|digits:16', // Validación para número de tarjeta
            'fecha_caducidad' => 'required|date|after_or_equal:today', // Validación de fecha de caducidad
            'cvv' => 'required|digits:3', // Validación para CVV
            'fecha_nacimiento' => 'required|date|before:'.Carbon::now()->subYears(18)->toDateString(), // Verifica la mayoría de edad
            // Agrega cualquier otra validación que necesites
        ]);

        // Verificar si el usuario ya compró el software
        if (Compra::where('user_id', Auth::id())->exists()) {
            return redirect()->route('descarga')->with('message', 'Ya has comprado el software.');
        }

        // Simular la compra
        Compra::create([
            'user_id' => Auth::id(),
            'monto' => 99.99, // Ajusta el precio según corresponda
            'estatus' => 'completado',
        ]);

        // Redirigir al usuario a la página de descarga con un mensaje
        return redirect()->route('descarga')->with('message', 'Compra realizada con éxito.');
    }
}
