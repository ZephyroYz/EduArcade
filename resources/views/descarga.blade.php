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
        <h1>Descarga del Software</h1>
        <p><strong>Nota:</strong> El navegador puede marcar este archivo como inseguro porque es un archivo .zip que contiene un ejecutable. Puedes proceder con la descarga de manera segura.</p>
        <p>Gracias por tu compra. Descarga el software aquí:</p>
        
        <a href="{{ asset('descargas/PruebaEduBeaver.zip') }}" class="btn btn-success" download>Descargar</a>
    </div>
</div>
@endsection
