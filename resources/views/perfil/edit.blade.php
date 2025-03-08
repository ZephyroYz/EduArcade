
    <style>
        /* Fondo con la imagen Back2.img */
        .fondo-inicio {
            background-image: url('/img/Back2.jpeg'); /* Ruta de tu imagen */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: black;
        }
    </style>



@extends('layouts.app')

@section('content')
<div class="fondo-inicio">
            <!-- Cuadro blanco con fondo color -->
            <div class="container bg-white p-4 rounded shadow">
    <h2>Editar Perfil</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('perfil.update') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
</div>
@endsection
