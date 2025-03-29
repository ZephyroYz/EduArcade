@extends('layouts.app')

@section('content')
<div class="fondo-inicio">
    <div class="container bg-white p-4 rounded shadow">
        <h2>Editar Perfil</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('perfil.update') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>

            <hr>

            <h4>Foto de Perfil</h4>
            <div class="mb-3">
                <label for="profile_photo" class="form-label">Selecciona una imagen</label>
                <div class="d-flex">
                    @foreach(['icon1.png', 'icon2.png', 'icon3.png', 'icon4.png', 'icon5.png'] as $icon)
                        <div class="p-2">
                            <img src="{{ asset('img/profile-icons/' . $icon) }}" alt="Icono de perfil" class="img-thumbnail rounded-circle" style="cursor: pointer; width: 80px; height: 80px;" onclick="selectProfileImage('{{ $icon }}')">
                        </div>
                    @endforeach
                </div>
                <input type="hidden" id="selected_profile_photo" name="selected_profile_photo" value="{{ old('selected_profile_photo', $user->profile_photo) }}">
            </div>

            <hr>

            <h4>Cambiar Contraseña</h4>
            <div class="mb-3">
                <label for="current_password" class="form-label">Contraseña Actual</label>
                <input type="password" class="form-control" id="current_password" name="current_password">
            </div>

            <div class="mb-3">
                <label for="new_password" class="form-label">Nueva Contraseña</label>
                <input type="password" class="form-control" id="new_password" name="new_password">
            </div>

            <div class="mb-3">
                <label for="new_password_confirmation" class="form-label">Confirmar Nueva Contraseña</label>
                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</div>

<script>
    function selectProfileImage(imageName) {
        // Actualizar el valor del input oculto con el nombre de la imagen seleccionada
        document.getElementById('selected_profile_photo').value = imageName;

        // Mostrar la imagen seleccionada en formato círculo
        const profileImagePreview = document.getElementById('profile-image-preview');
        profileImagePreview.src = "{{ asset('img/profile-icons/') }}/" + imageName;
    }
</script>
@endsection

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

    #profile-image-preview {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-top: 10px;
    }
</style>
