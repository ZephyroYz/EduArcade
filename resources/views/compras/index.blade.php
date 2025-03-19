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

@extends('layouts.app')

@section('content')
<div class="fondo-inicio">
    <!-- Cuadro blanco con fondo color -->
    <div class="container bg-white p-4 rounded shadow">
        <h1>Realizar Compra</h1>

        <form action="{{ route('compra.procesar') }}" method="POST" id="compraForm">
            @csrf

            <!-- Nombre del Propietario -->
            <div class="mb-3">
                <p>  <strong>Nota: Esto solo es para entornos de prueba, por favor, no ingrese datos reales</strong></p>
                <label for="nombre" class="form-label">Nombre en la tarjeta:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                @error('nombre') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <!-- Número de Tarjeta -->
            <div class="mb-3">
                <label for="numero_tarjeta" class="form-label">Número de Tarjeta:</label>
                <input type="text" id="numero_tarjeta" name="numero_tarjeta" class="form-control" maxlength="16" value="{{ old('numero_tarjeta') }}" required>
                @error('numero_tarjeta') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <!-- Fecha de Caducidad -->
            <div class="mb-3">
                <label for="fecha_caducidad" class="form-label">Fecha de Caducidad:</label>
                <input type="month" id="fecha_caducidad" name="fecha_caducidad" class="form-control" value="{{ old('fecha_caducidad') }}" required>
                @error('fecha_caducidad') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <!-- CVV -->
            <div class="mb-3">
                <label for="cvv" class="form-label">CVV:</label>
                <input type="text" id="cvv" name="cvv" class="form-control" maxlength="3" value="{{ old('cvv') }}" required>
                @error('cvv') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}" required onchange="validarEdad()">
                @error('fecha_nacimiento') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <!-- Checkbox de términos y condiciones -->
            <div class="mb-3">
                <input type="checkbox" id="terminos" required>
                <label for="terminos">
                    Acepto <a href="#" onclick="mostrarTerminos()">los Términos y condiciones.</a>
                </label>            
            </div>

            <!-- Botón de Enviar -->
            <button type="submit" class="btn btn-primary" id="btn-comprar" disabled>Comprar</button>
        </form>
    </div>

    <!-- Modal de Términos y Condiciones -->
    <div id="modalTerminos" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cerrarTerminos()">&times;</span>
            <h2>Términos y Condiciones</h2>
            <div class="modal-body">
                <!-- Contenido de los términos y condiciones -->
                <h1>Términos y Condiciones de Uso del Software Educativo</h1>
                <p><strong>Fecha de Última Actualización:</strong> 15 de febrero de 2025</p>
                <h2>1. Introducción</h2>
                <p>Bienvenido(a) al software educativo interactivo. Este software ha sido desarrollado con el propósito de facilitar el aprendizaje en materias clave para niños de primaria. Al realizar la compra y utilizar este software, aceptas los términos y condiciones aquí establecidos. Si no estás de acuerdo con estos términos, no debes continuar con la compra ni el uso del software.</p>
                <h2>2. Definiciones</h2>
                <h3>2.1 Software</h3>
                <p>Programa educativo interactivo con actividades en matemáticas, ciencias y lenguaje.</p>
                <h3>2.2 Usuario</h3>
                <p>Persona que adquiere y utiliza el software en su dispositivo.</p>
                <h3>2.3 Desarrollador</h3>
                <p>La persona o entidad creadora del software, que conserva todos los derechos de propiedad intelectual.</p>
                <h2>3. Aceptación de los Términos</h2>
                <p>Al completar la compra y descargar el software, el Usuario acepta cumplir con estos términos y condiciones.</p>
                <h2>4. Uso del Software</h2>
                <h3>4.1 Derechos de Uso</h3>
                <ul>
                    <li>El software es de uso exclusivo para fines educativos.</li>
                    <li>Se permite su instalación en un número limitado de dispositivos según la licencia adquirida.</li>
                </ul>
                <h3>4.2 Restricciones</h3>
                <ul>
                    <li>Está prohibida la modificación, descompilación o ingeniería inversa del software.</li>
                    <li>No se permite su distribución, sublicencia o reventa sin autorización del Desarrollador.</li>
                </ul>
                <h2>5. Propiedad Intelectual</h2>
                <p>Todos los derechos sobre el software, incluyendo código fuente, diseño y contenido, son propiedad exclusiva del Desarrollador.</p>
                <h2>6. Limitación de Responsabilidad</h2>
                <ul>
                    <li>El software se proporciona "tal cual" sin garantías de su funcionamiento en todos los dispositivos.</li>
                    <li>El Desarrollador no se responsabiliza por fallas técnicas, pérdidas de datos o incompatibilidades con sistemas del Usuario.</li>
                </ul>
                <h2>7. Privacidad y Seguridad</h2>
                <p>El software no recopila ni almacena información personal del Usuario, salvo en casos específicos donde se requiera soporte técnico o actualizaciones. En tales casos, el Usuario deberá proporcionar su consentimiento expreso.</p>
                <h2>8. Actualizaciones y Soporte</h2>
                <h3>8.1 Actualizaciones</h3>
                <p>El Desarrollador podrá ofrecer actualizaciones opcionales para mejorar la funcionalidad del software. El Usuario será notificado sobre estas actualizaciones y podrá decidir si las instala.</p>
                <h3>8.2 Soporte Técnico</h3>
                <p>El soporte técnico básico estará disponible durante un período de 120 días después de la compra.</p>
                <h2>9. Modificaciones a los Términos</h2>
                <p>El Desarrollador se reserva el derecho de modificar estos términos en cualquier momento. Las modificaciones serán publicadas y entrarán en vigor inmediatamente.</p>
                <h2>10. Resolución de Conflictos</h2>
                <p>Cualquier disputa relacionada con estos términos será resuelta conforme a las leyes aplicables en Tlaxcala, México.</p>
                <h2>11. Aceptación</h2>
                <p>Al realizar la compra y usar este software, confirmas que has leído, comprendido y aceptado estos términos y condiciones en su totalidad.</p>
            </div>
        </div>
    </div>
</div>

<script>
    // Validación del checkbox de términos y condiciones
    document.getElementById('terminos').addEventListener('change', function() {
        document.getElementById('btn-comprar').disabled = !this.checked;
    });

    // Mostrar el modal de Términos y Condiciones
    function mostrarTerminos() {
        document.getElementById("modalTerminos").style.display = "block";
    }

    // Cerrar el modal de Términos y Condiciones
    function cerrarTerminos() {
        document.getElementById("modalTerminos").style.display = "none";
    }

    // Validación de Edad basada en la fecha de nacimiento
    function validarEdad() {
        const fechaNacimiento = document.getElementById('fecha_nacimiento').value;
        const edad = calcularEdad(fechaNacimiento);

        if (edad < 18) {
            alert('Debes ser mayor de 18 años para realizar la compra. Voluntarios de la Cruz Roja estarán en la puerta de tu casa para verificar tu edad.');
            window.location.href = "{{ url('/') }}"; // Redirigir a la página de inicio
        }
    }

    // Función para calcular la edad a partir de la fecha de nacimiento
    function calcularEdad(fechaNacimiento) {
        const hoy = new Date();
        const fecha = new Date(fechaNacimiento);
        let edad = hoy.getFullYear() - fecha.getFullYear();
        const m = hoy.getMonth() - fecha.getMonth();

        if (m < 0 || (m === 0 && hoy.getDate() < fecha.getDate())) {
            edad--;
        }

        return edad;
    }
</script>

@endsection
