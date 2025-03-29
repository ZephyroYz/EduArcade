@extends('layouts.app')

@section('content')
    <h2>Tickets Pendientes</h2>

    <div class="ticket-container">
        @foreach($tickets as $ticket)
            <div class="ticket-card">
                <p><strong>Usuario:</strong> {{ $ticket->user->name }}</p>
                <p><strong>Estado:</strong> {{ ucfirst($ticket->status) }}</p>
                <button class="open-modal" data-ticket-id="{{ $ticket->id }}">Responder</button>
            </div>

            <!-- Modal de respuesta -->
            <div id="modal-{{ $ticket->id }}" class="modal">
                <div class="modal-content">
                    <span class="close-modal" data-ticket-id="{{ $ticket->id }}">&times;</span>
                    <h3>Chat de Soporte</h3>
                    <div class="chat-box">
                        <div class="message user-message">
                            <strong>{{ $ticket->user->name }}:</strong> {{ $ticket->user_message }}
                        </div>
                        @if($ticket->response)
                            <div class="message admin-message">
                                <strong>Administrador:</strong> {{ $ticket->response }}
                            </div>
                        @endif
                    </div>

                    <form action="{{ route('admin.respondTicket', $ticket->id) }}" method="POST">
                        @csrf
                        <textarea name="response" placeholder="Escribe tu respuesta..." required></textarea>
                        <select name="status">
                            <option value="pendiente" {{ $ticket->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="en proceso" {{ $ticket->status == 'en proceso' ? 'selected' : '' }}>En proceso</option>
                            <option value="finalizado" {{ $ticket->status == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                        </select>
                        <button type="submit">Enviar Respuesta</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.open-modal').forEach(button => {
                button.addEventListener('click', function () {
                    const ticketId = this.getAttribute('data-ticket-id');
                    document.getElementById(`modal-${ticketId}`).style.display = 'block';
                });
            });

            document.querySelectorAll('.close-modal').forEach(button => {
                button.addEventListener('click', function () {
                    const ticketId = this.getAttribute('data-ticket-id');
                    document.getElementById(`modal-${ticketId}`).style.display = 'none';
                });
            });
        });
    </script>

    <style>
        .ticket-container { display: flex; flex-wrap: wrap; gap: 10px; }
        .ticket-card { padding: 10px; border: 1px solid #ccc; border-radius: 5px; cursor: pointer; }
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); }
        .modal-content { background: white; padding: 20px; margin: 10% auto; width: 50%; border-radius: 5px; }
        .chat-box { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; max-height: 200px; overflow-y: auto; }
        .message { padding: 5px; margin-bottom: 5px; border-radius: 5px; }
        .user-message { background: #f1f1f1; }
        .admin-message { background: #d1ecf1; text-align: right; }
        .close-modal { cursor: pointer; float: right; font-size: 20px; }
    </style>
@endsection
