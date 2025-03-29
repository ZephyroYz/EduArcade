@extends('layouts.app')

@section('content')
    <h2>Mis Tickets</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="list-group">
        @foreach($tickets as $ticket)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>Mensaje:</strong> {{ Str::limit($ticket->user_message, 50) }} <br>
                    <strong>Estado:</strong> {{ $ticket->status }} <br>
                    <strong>Respuesta:</strong> {{ $ticket->response ?? 'Aún sin respuesta' }} <br>
                    <strong>Fecha de Creación:</strong> {{ $ticket->created_at->format('d/m/Y H:i') }} <br> <!-- Aquí agregamos la fecha -->
                </div>
            </div>
        @endforeach
    </div>

    <form action="{{ route('support.createTicket') }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="user_message" class="form-control" placeholder="Escribe tu mensaje aquí..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Ticket</button>
    </form>
@endsection

<style>
    .list-group-item {
        cursor: default; /* Cambio para que el cursor no cambie al hacer hover */
    }
    .list-group-item:hover {
        background-color: #f8f9fa; /* Estilo de hover opcional */
    }
</style>
