<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EduArcade') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
</head>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <!-- Branding Image -->
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('img/Logo1.png') }}" alt="Logo EduArcade" style="height: 30px; margin-right: 10px;">
                    {{ config('app.name', 'EduArcade') }}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('formulario.index') }}">Formularios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('compra') }}">Compra</a>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <!-- Enlace de Soporte -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('soporte') }}">Soporte</a>
                            </li>
                        @endauth

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Registro</a>
                            </li>
                        @endguest

                        @auth
                            <!-- Enlace de Perfil y Logout -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <!-- Mostrar imagen de perfil si existe -->
                                    <img src="{{ asset('img/profile-icons/' . Auth::user()->profile_photo) }}" alt="Foto de perfil" class="img-thumbnail rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('perfil.edit') }}">
                                        Perfil
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Floating Profile Menu -->
    @auth
    <div class="floating-profile-menu">
        <a href="{{ route('perfil.edit') }}" class="profile-icon d-flex justify-content-center align-items-center">
            <img src="{{ asset('img/profile-icons/' . Auth::user()->profile_photo) }}" alt="Foto de perfil" class="img-thumbnail rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
        </a>
    </div>
    @endauth

    <!-- Agregar Scripts de Bootstrap si es necesario -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<style>
    .floating-profile-menu {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
    }

    .profile-icon {
        background-color: #007bff;
        padding: 10px;
        border-radius: 50%;
    }

    .dropdown-menu {
        width: 150px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
</style>
