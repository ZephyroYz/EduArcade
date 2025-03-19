<!-- resources/views/soporte.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Soporte</h1>
        <p>Aquí puedes encontrar preguntas frecuentes o contactar con nosotros si tienes alguna duda.</p>

        <!-- Preguntas frecuentes -->
        <div>
            <h3>Preguntas Frecuentes</h3>
            <ul>
                <li>
                    <strong>¿Cómo puedo contactar con soporte?</strong>
                    <p>Puedes contactarnos enviando un correo a <strong>elisyum1@gmail.com</strong>. Estamos disponibles de lunes a viernes, de 9:00 a 18:00.</p>
                </li>
                <li>
                    <strong>¿Cómo puedo cambiar mi contraseña?</strong>
                    <p>Para cambiar tu contraseña, ve a la sección de "Perfil" y navega al apartado de "Cambiar contraseña". Introduce tu contraseña actual y la nueva contraseña.</p>
                </li>
                <li>
                    <strong>¿Cómo puedo actualizar mi perfil?</strong>
                    <p>Para actualizar tu perfil, ve a la sección de configuración de tu cuenta y edita la información que deseas actualizar, (como la foto de perfil, correo, y contraseña). No olvides guardar los cambios.</p>
                </li>
                <li>
                    <strong>¿Cómo puedo eliminar mi cuenta?</strong>
                    <p>Si deseas eliminar tu cuenta, por favor, envíanos un correo a soporte@ejemplo.com con tu solicitud. Procesaremos la eliminación de tu cuenta en un plazo de 48 horas.</p>
                </li>
            </ul>
        </div>

        <!-- Botón de contacto (solo si está autenticado) -->
        @auth
        <a href="{{ route('contacto') }}" class="btn btn-primary">Contactar</a>
        @else
            <p>Por favor, <a href="{{ route('login') }}">inicia sesión</a> para poder contactarnos.</p>
        @endauth
    </div>
@endsection
