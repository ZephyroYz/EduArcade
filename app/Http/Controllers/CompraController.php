<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    public function index()
    {
        return view('compras.index'); // Aquí puedes mostrar el formulario de compra
    }

    public function procesarCompra(Request $request)
    {
        // Aquí puedes simular un proceso de compra sin preocuparte por la validación de datos bancarios
        // Solo validamos el nombre y la CLABE, que son los datos que realmente nos interesan para la simulación
        $request->validate([
            'nombre' => 'required|string',
            'clabe' => 'required|digits:18',
            // No validamos los detalles de la tarjeta, ya que solo estamos simulando
        ]);

        // Verificar si el usuario ya compró el software
        if (Compra::where('user_id', Auth::id())->exists()) {
            return redirect()->route('descarga')->with('message', 'Ya has comprado el software.');
        }

        // Simular la compra, ya que en este caso no estamos conectándonos a un servicio de pago real
        Compra::create([
            'user_id' => Auth::id(),
            'monto' => 99.99, // Ajusta el precio según corresponda
            'estatus' => 'completado',  // Aquí simulas que la compra fue exitosa
        ]);

        // Redirigir al usuario a la página de descarga con un mensaje
        return redirect()->route('descarga')->with('message', 'Compra realizada con éxito.');
    }
}
