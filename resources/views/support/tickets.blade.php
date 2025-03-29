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
            <div class="list-group-item d-flex justify-content-between align-items-center" onclick="openChat({{ $ticket->id }})">
                <div>
                    <strong>Mensaje:</strong> {{ Str::limit($ticket->user_message, 50) }} <br>
                    <strong>Estado:</strong> {{ $ticket->status }} <br>
                    <strong>Respuesta:</strong> {{ $ticket->response ?? 'Aún sin respuesta' }} <br>
                </div>
                <button class="btn btn-primary btn-sm">Ver y Responder</button>
            </div>
        @endforeach
    </div>

    <!-- Modal para responder tickets -->
    <div id="chatModal" class="modal fade" tabindex="-1" aria-labelledby="chatModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chatModalLabel">Responder Ticket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="chatContent" class="mb-3"></div>
                    <form id="responseForm" method="POST">
                        @csrf
                        <div class="mb-3">
                            <textarea name="response" id="responseText" class="form-control" placeholder="Escribe tu respuesta..." required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="statusSelect">Estado</label>
                            <select name="status" id="statusSelect" class="form-select">
                                <option value="pendiente">Pendiente</option>
                                <option value="en proceso">En proceso</option>
                                <option value="finalizado">Finalizado</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Responder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('support.createTicket') }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="user_message" class="form-control" placeholder="Escribe tu mensaje aquí..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Ticket</button>
    </form>
@endsection

<script>
    function openChat(ticketId) {
        let modal = new bootstrap.Modal(document.getElementById('chatModal'));
        let chatContent = document.getElementById('chatContent');
        let responseForm = document.getElementById('responseForm');

        // Solicitar el ticket con la ID proporcionada
        fetch(`/admin/getTicket/${ticketId}`)
            .then(response => response.json())
            .then(data => {
                // Mostrar el mensaje del usuario y la respuesta del admin (si la hay)
                chatContent.innerHTML = `
                    <p><strong>Usuario:</strong> ${data.user_message}</p>
                    <p><strong>Respuesta del Administrador:</strong> ${data.response || 'Aún sin respuesta'}</p>
                `;
                // Ajustar la URL del formulario para la respuesta
                responseForm.action = `/admin/respondTicket/${ticketId}`;
                modal.show(); // Mostrar el modal
            })
            .catch(error => {
                console.error('Error al cargar el ticket:', error);
                alert('Hubo un problema al cargar el ticket.');
            });
    }
</script>

<style>
    .list-group-item {
        cursor: pointer;
    }
    .list-group-item:hover {
        background-color: #f8f9fa;
    }
</style>
