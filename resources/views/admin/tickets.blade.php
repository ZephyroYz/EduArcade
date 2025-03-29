@extends('layouts.app')

@section('content')
    <h2>Tickets Pendientes</h2>

    @foreach($tickets as $ticket)
        <div>
            <p><strong>Usuario:</strong> {{ $ticket->user->name }} </p>
            <p><strong>Estado:</strong> {{ $ticket->status }}</p>
            <p><strong>Mensaje del Usuario:</strong> {{ $ticket->user_message }}</p>

            <form action="{{ route('admin.respondTicket', $ticket->id) }}" method="POST">
                @csrf
                <textarea name="response" placeholder="Respuesta del Administrador" required>{{ $ticket->response }}</textarea>
                <select name="status">
                    <option value="pendiente" {{ $ticket->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="en proceso" {{ $ticket->status == 'en proceso' ? 'selected' : '' }}>En proceso</option>
                    <option value="finalizado" {{ $ticket->status == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                </select>
                <button type="submit">Responder</button>
            </form>
        </div>
    @endforeach
@endsection
