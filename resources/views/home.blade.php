<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EduArcade - Inicio</title>
    <style>
        /* Fondo con la imagen Back2.img */
        .fondo-inicio {
            background-image: url('/img/Back2.jpeg'); /* Ruta de tu imagen 
            /*background-color:rgb(247, 0, 0);*/
            background-size: cover;
            background-position: center; 
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: black;
        }
    </style>
</head>

<body>
    <!-- TITULO Y USUARIO -->
    @extends('layouts.app')

    @section('content')
    <div class="fondo-inicio">
        <!-- Cuadro blanco con fondo color -->
        <div class="container bg-white p-4 rounded shadow" style="background-color: rgba(255, 255, 255, 0.8); margin-left: 150px; margin-right: 450px;">
            <h1>¡Bienvenidos a EduArcade!</h1>
            <p class="text-justify">
                En EduArcade, el aprendizaje se convierte en una emocionante aventura. Hemos diseñado una plataforma interactiva especialmente para ti, donde las lecciones de matemáticas, ciencias y lenguaje se mezclan con juegos divertidos y educativos. A través de desafiantes rompecabezas, lluvias de palabras, y memoramas, podrás mejorar tus habilidades mientras te diviertes. Nuestro objetivo es ofrecerte una experiencia única que te permita aprender jugando, sin importar si estás en el aula o en casa.
                ¡Únete a nosotros y empieza a disfrutar del aprendizaje de una manera completamente nueva!
            </p>

            <div class="card mx-auto" style="width: 190px; height: 254px; background: rgb(236, 236, 236); box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;">
                <img src="/img/Game1.png" alt="Matemáticas 2" class="card-img-top" style="width: 100%; height: auto;">
            </div>


        </div>
        <img src="{{ asset('img/Castor.png') }}" alt="castor" class="ml-3 img-fluid" style="max-width: 300px; position: absolute; right: 120px;">
    </div>





    @endsection
