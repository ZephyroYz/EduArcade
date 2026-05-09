<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SupportTicket;

class SupportController extends Controller
{
    // Muestra la vista de soporte
    public function show()
    {
        return view('soporte');
    }

    // Envía el ticket por correo
    public function sendTicket(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'asunto' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        // Enviar el correo
        Mail::to('soporte@tucorreo.com')->send(new SupportTicket($request));

        return redirect()->route('soporte')->with('status', 'Ticket enviado exitosamente.');
    }
}
