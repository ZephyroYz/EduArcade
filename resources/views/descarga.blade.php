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
            <p>
            ¡Gracias por tu compra! Te presentamos <strong>EduArcade Shooter 2D</strong>, un emocionante juego arcade de disparos en 2D diseñado con la temática única de EduArcade. Sumérgete en una aventura llena de acción y desafíos, donde la habilidad y la estrategia son clave para alcanzar la victoria.
        </p>
        <p>
            Esta es la versión <strong>1.7</strong>, que incluye mejoras significativas y nuevas características para una experiencia de juego aún más inmersiva.
        </p>
        <p>
            <strong> Descarga el software aquí:</strong>
           
        </p>

        
        <a href="{{ asset('descargas/PruebaEduBeaver.zip') }}" class="btn btn-success" download>Descargar EduBeaver</a>
        <a href="{{ asset('descargas/EduLecV3.1.exe') }}" class="btn btn-success" download>Descargar EduLec</a>
    </div>
</div>
@endsection
