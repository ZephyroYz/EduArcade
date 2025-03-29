@extends('layouts.app')

@section('content')
    <h2>Mis Tickets</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Lista de tickets -->
    <div class="ticket-list">
        @foreach($tickets as $ticket)
            <div class="ticket" data-ticket-id="{{ $ticket->id }}">
                <p><strong>Usuario:</strong> {{ $ticket->user->name }} </p>
                <p><strong>Estado:</strong> {{ $ticket->status }}</p>
                <p><strong>Mensaje:</strong> {{ Str::limit($ticket->user_message, 50) }}</p>
                <button class="open-chat-btn">Ver y Responder</button>
            </div>
        @endforeach
    </div>

    <!-- Modal para responder tickets -->
    <div id="chatModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeChat()">&times;</span>
            <h3>Responder Ticket</h3>
            <div id="chatContent"></div>
            <form id="responseForm" method="POST">
                @csrf
                <textarea name="response" id="responseText" placeholder="Escribe tu respuesta..." required></textarea>
                <select name="status" id="statusSelect">
                    <option value="pendiente">Pendiente</option>
                    <option value="en proceso">En proceso</option>
                    <option value="finalizado">Finalizado</option>
                </select>
                <button type="submit">Responder</button>
            </form>
        </div>
    </div>

    <!-- Formulario para crear un nuevo ticket -->
    <div class="new-ticket">
        <h3>Crear Nuevo Ticket</h3>
        <form action="{{ route('support.createTicket') }}" method="POST">
            @csrf
            <textarea name="user_message" placeholder="Escribe tu mensaje aquí..." required></textarea>
            <button type="submit">Enviar Ticket</button>
        </form>
    </div>

@endsection

<script>
    // Función para abrir el chat/modal con la información del ticket
    document.querySelectorAll('.open-chat-btn').forEach(button => {
        button.addEventListener('click', function () {
            const ticketId = this.closest('.ticket').getAttribute('data-ticket-id');
            openChat(ticketId);
        });
    });

    function openChat(ticketId) {
        let modal = document.getElementById('chatModal');
        let chatContent = document.getElementById('chatContent');
        let responseForm = document.getElementById('responseForm');
        
        // Obtener el ticket desde el servidor usando fetch
        fetch(`/admin/getTicket/${ticketId}`)
            .then(response => response.json())
            .then(data => {
                // Insertar los datos en el modal
                chatContent.innerHTML = `
                    <p><strong>Usuario:</strong> ${data.user.name}</p>
                    <p><strong>Mensaje:</strong> ${data.user_message}</p>
                    <p><strong>Respuesta:</strong> ${data.response || 'Aún sin respuesta'}</p>`;
                // Actualizar el action del formulario
                responseForm.action = `/admin/respondTicket/${ticketId}`;
                // Mostrar el modal
                modal.style.display = "block";
            })
            .catch(error => console.error('Error al obtener el ticket:', error));
    }

    // Función para cerrar el modal
    function closeChat() {
        document.getElementById('chatModal').style.display = "none";
    }
</script>

<style>
    .ticket-list { display: flex; flex-direction: column; gap: 10px; }
    .ticket { padding: 10px; border: 1px solid #ccc; cursor: pointer; }
    .open-chat-btn { background-color: #007bff; color: white; border: none; padding: 5px 10px; cursor: pointer; }
    .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); }
    .modal-content { background: white; padding: 20px; margin: 10% auto; width: 50%; }
    .close { float: right; cursor: pointer; }
    .new-ticket { margin-top: 20px; padding: 10px; border: 1px solid #ccc; background: #f9f9f9; }
    .new-ticket textarea { width: 100%; height: 100px; margin-bottom: 10px; }
    .new-ticket button { padding: 10px 20px; background-color: #28a745; color: white; border: none; cursor: pointer; }
</style>
