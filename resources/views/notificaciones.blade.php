@foreach ($tickets as $ticket)
    <div class="ticket">
        <p><strong>Asunto:</strong> {{ $ticket->subject }}</p>
        <p><strong>Detalles:</strong> {{ $ticket->details }}</p>
        <p><strong>Enviado por:</strong> {{ $ticket->user->name }} ({{ $ticket->user->email }})</p>
        <p><strong>Hora de envío:</strong> {{ $ticket->created_at }}</p>
        <a href="{{ route('respuesta', $ticket->id) }}">Responder</a> | 
        <a href="{{ route('eliminar', $ticket->id) }}">Eliminar</a>
    </div>
@endforeach
