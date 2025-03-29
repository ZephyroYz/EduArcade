@extends('layouts.app')

@section('content')
    <h2>Tickets Pendientes</h2>

    <div class="ticket-list">
        @foreach($tickets as $ticket)
            <div class="ticket" onclick="openChat({{ $ticket->id }})">
                <p><strong>Usuario:</strong> {{ $ticket->user->name }} </p>
                <p><strong>Estado:</strong> {{ $ticket->status }}</p>
                <p><strong>Mensaje:</strong> {{ Str::limit($ticket->user_message, 50) }}</p>
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
@endsection

<script>
    function openChat(ticketId) {
        let modal = document.getElementById('chatModal');
        let chatContent = document.getElementById('chatContent');
        let responseForm = document.getElementById('responseForm');
        
        fetch(`/admin/getTicket/${ticketId}`)
            .then(response => response.json())
            .then(data => {
                chatContent.innerHTML = `<p><strong>Usuario:</strong> ${data.user.name}</p>
                                         <p><strong>Mensaje:</strong> ${data.user_message}</p>
                                         <p><strong>Respuesta:</strong> ${data.response || 'Aún sin respuesta'}</p>`;
                responseForm.action = `/admin/respondTicket/${ticketId}`;
                modal.style.display = "block";
            });
    }

    function closeChat() {
        document.getElementById('chatModal').style.display = "none";
    }
</script>

<style>
    .ticket-list { display: flex; flex-direction: column; gap: 10px; }
    .ticket { padding: 10px; border: 1px solid #ccc; cursor: pointer; }
    .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); }
    .modal-content { background: white; padding: 20px; margin: 10% auto; width: 50%; }
    .close { float: right; cursor: pointer; }
</style>
