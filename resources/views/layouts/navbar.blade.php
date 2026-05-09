<nav style="background-color: #384; color: white; padding: 10px;">
    <ul style="list-style: none; display: flex; gap: 20px;">
        <li><a href="{{ route('home') }}" style="color: white; text-decoration: none;">Inicio</a></li>
        @auth
            <li><a href="{{ route('formulario.index') }}" style="color: white; text-decoration: none;">Formularios</a></li>

            @if (Route::has('compra'))
                <li><a href="{{ route('compra') }}" style="color: white; text-decoration: none;">Compra</a></li>
            @endif

            @if (Route::has('descarga'))
                <li><a href="{{ route('descarga') }}" style="color: white; text-decoration: none;">Descargas</a></li>
            @endif

            @if (Route::has('soporte'))
                <li><a href="{{ route('soporte') }}" style="color: white; text-decoration: none;">Soporte</a></li>
            @endif

            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: white;">Cerrar sesión</button>
                </form>
            </li>
        @else
            <li><a href="{{ route('login') }}" style="color: white; text-decoration: none;">Login</a></li>
            <li><a href="{{ route('register') }}" style="color: white; text-decoration: none;">Registro</a></li>
        @endauth
    </ul>
</nav>
