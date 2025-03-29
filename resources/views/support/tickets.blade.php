@extends('layouts.app')

@section('content')
    <h2>Mis Tickets</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul>
        @foreach($tickets as $ticket)
            <li>{{ $ticket->user_message }} - Estado: {{ $ticket->status }} - Respuesta: {{ $ticket->response }}</li>
        @endforeach
    </ul>

    <form action="{{ route('support.createTicket') }}" method="POST">
        @csrf
        <textarea name="user_message" placeholder="Escribe tu mensaje aquí..." required></textarea>
        <button type="submit">Enviar Ticket</button>
    </form>
@endsection

