<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    // Mostrar los tickets del usuario
    public function showUserTickets()
    {
        // Obtener tickets solo del usuario autenticado
        $tickets = Ticket::where('user_id', Auth::id())->get();
        return view('support.tickets', compact('tickets'));
    }

    // Crear un ticket
    public function createTicket(Request $request)
    {
        // Validar los datos del ticket
        $request->validate([
            'user_message' => 'required|string|max:255',
        ]);

        // Crear el ticket con el mensaje del usuario
        $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'status' => 'pendiente',
            'user_message' => $request->user_message,
        ]);

        return redirect()->route('support.tickets')->with('success', 'Ticket creado exitosamente');
    }

    // Mostrar los tickets para los administradores
    public function showAdminTickets()
    {
        // Asegurarse de que solo un administrador pueda acceder a esta función
        $this->authorize('is-admin'); 

        // Obtener todos los tickets (admin puede verlos todos)
        $tickets = Ticket::all();

        return view('admin.tickets', compact('tickets'));
    }

    // Responder un ticket (solo admin puede hacer esto)
    public function respondTicket(Request $request, $ticketId)
    {
        // Buscar el ticket correspondiente
        $ticket = Ticket::findOrFail($ticketId);

        // Validación de la respuesta del administrador
        $request->validate([
            'response' => 'required|string|max:255', // Validar que la respuesta no esté vacía
            'status' => 'required|string|in:pendiente,en proceso,finalizado', // Validar el estado
        ]);

        // Actualizar el ticket con la respuesta del administrador y el nuevo estado
        $ticket->update([
            'status' => $request->status, // Actualiza el estado del ticket
            'response' => $request->response, // Respuesta del administrador
            'admin_id' => Auth::id(), // Administrador que está respondiendo
        ]);

        // Redirigir al panel de administración con un mensaje de éxito
        return redirect()->route('admin.tickets')->with('success', 'Respuesta enviada correctamente');
    }

    public function getTicket($ticketId)
    {
        // Buscar el ticket por ID
        $ticket = Ticket::with('user')->find($ticketId);

        // Verificar si el ticket existe
        if ($ticket) {
            return response()->json([
                'user_message' => $ticket->user_message,
                'response' => $ticket->response,
                'user' => [
                    'name' => $ticket->user->name,
                ]
            ]);
        }

        // Si no se encuentra el ticket, devolver un error
        return response()->json(['error' => 'Ticket no encontrado'], 404);
    }
}
