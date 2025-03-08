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
                <li><strong>¿Cómo puedo recuperar mi contraseña?</strong> ...</li>
                <li><strong>¿Cómo reportar un error?</strong> ...</li>
                <li><strong>¿Cómo puedo cambiar mi dirección de correo electrónico?</strong> ...</li>
                <li><strong>¿Dónde puedo ver mis facturas?</strong> ...</li>
                <li><strong>¿Cómo puedo cancelar mi suscripción?</strong> ...</li>
                <li><strong>¿Qué métodos de pago aceptan?</strong> ...</li>
                <!-- Agrega más preguntas frecuentes aquí -->
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
