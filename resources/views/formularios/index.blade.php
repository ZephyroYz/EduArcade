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

    .scroll-container {
        max-height: 80vh; /* Ajusta la altura máxima según tus necesidades */
        overflow-y: auto;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
    }

    .tab button:hover {
        background-color: #ddd;
    }

    .tab button.active {
        background-color: #ccc;
    }

    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>

@extends('layouts.app')

@section('content')
<div class="fondo-inicio">
    <!-- Cuadro blanco con fondo color -->
    <div class="scroll-container">
        <h1>Bienvenido a la página de formularios</h1>
        <p>Esto solo es una demostración c: </p>

        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'Lenguas')">Lenguas</button>
            <button class="tablinks" onclick="openTab(event, 'Matematicas')">Matemáticas</button>
            <button class="tablinks" onclick="openTab(event, 'Ciencias')">Ciencias</button>
        </div>

        <form id="quizForm">
            <div id="Lenguas" class="tabcontent">
                <h2>Lenguas</h2>
                <div id="LenguasQuestions"></div>
                <button type="button" onclick="calculateScore('Lenguas')">Enviar</button>
                <div id="resultLenguas" style="display:none;">
                    <h2>Tu puntaje es: <span id="scoreLenguas"></span>/3</h2>
                </div>
            </div>

            <div id="Matematicas" class="tabcontent">
                <h2>Matemáticas</h2>
                <div id="MatematicasQuestions"></div>
                <button type="button" onclick="calculateScore('Matematicas')">Enviar</button>
                <div id="resultMatematicas" style="display:none;">
                    <h2>Tu puntaje es: <span id="scoreMatematicas"></span>/3</h2>
                </div>
            </div>

            <div id="Ciencias" class="tabcontent">
                <h2>Ciencias</h2>
                <div id="CienciasQuestions"></div>
                <button type="button" onclick="calculateScore('Ciencias')">Enviar</button>
                <div id="resultCiencias" style="display:none;">
                    <h2>Tu puntaje es: <span id="scoreCiencias"></span>/3</h2>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
// Preguntas para cada materia
const questions = {
    Lenguas: [
        { q: '¿Cuál es el plural de "casa"?', a: 'b', options: ['Casos', 'Casas', 'Casitas'] },
        { q: '¿Cuál es el antónimo de "feliz"?', a: 'a', options: ['Triste', 'Alegre', 'Contento'] },
        { q: '¿Cuál es el sinónimo de "rápido"?', a: 'b', options: ['Lento', 'Veloz', 'Despacio'] },
        { q: '¿Cuál es el plural de "luz"?', a: 'a', options: ['Luces', 'Luzes', 'Luz'] },
        { q: '¿Cuál es el antónimo de "grande"?', a: 'a', options: ['Pequeño', 'Gigante', 'Enorme'] },
        { q: '¿Cuál es el sinónimo de "feliz"?', a: 'b', options: ['Triste', 'Contento', 'Enojado'] },
        { q: '¿Cuál es el plural de "ratón"?', a: 'a', options: ['Ratones', 'Ratóns', 'Ratón'] },
        { q: '¿Cuál es el antónimo de "alto"?', a: 'a', options: ['Bajo', 'Grande', 'Pequeño'] },
        { q: '¿Cuál es el sinónimo de "inteligente"?', a: 'b', options: ['Tonto', 'Listo', 'Ignorante'] },
        { q: '¿Cuál es el plural de "flor"?', a: 'a', options: ['Flores', 'Flors', 'Flor'] },
        { q: '¿Cuál es el antónimo de "rápido"?', a: 'b', options: ['Lento', 'Veloz', 'Despacio'] },
        { q: '¿Cuál es el sinónimo de "hermoso"?', a: 'b', options: ['Feo', 'Bello', 'Horrible'] }
    ],
    Matematicas: [
        { q: '¿Cuánto es 2 + 2?', a: 'b', options: ['3', '4', '5'] },
        { q: '¿Cuánto es 5 * 3?', a: 'a', options: ['15', '10', '20'] },
        { q: '¿Cuánto es 10 / 2?', a: 'b', options: ['4', '5', '6'] },
        { q: '¿Cuánto es 7 - 3?', a: 'b', options: ['5', '4', '3'] },
        { q: '¿Cuánto es 6 + 4?', a: 'a', options: ['10', '11', '12'] },
        { q: '¿Cuánto es 9 / 3?', a: 'b', options: ['2', '3', '4'] },
        { q: '¿Cuánto es 8 * 2?', a: 'b', options: ['14', '16', '18'] },
        { q: '¿Cuánto es 12 - 5?', a: 'a', options: ['7' , '8', '6'] },
        { q: '¿Cuánto es 3 + 5?', a: 'b', options: ['7', '8', '9'] },
        { q: '¿Cuánto es 15 / 5?', a: 'b', options: ['2', '3', '4'] },
        { q: '¿Cuánto es 4 * 4?', a: 'a', options: ['16', '18', '20'] },
        { q: '¿Cuánto es 10 - 7?', a: 'b', options: ['4', '3', '2'] }
    ],
    Ciencias: [
        { q: '¿Cuál es el planeta más cercano al sol?', a: 'c', options: ['Venus', 'Marte', 'Mercurio'] },
        { q: '¿Qué gas respiramos los humanos?', a: 'a', options: ['Oxígeno', 'Hidrógeno', 'Nitrógeno'] },
        { q: '¿Cuál es el estado líquido del agua?', a: 'c', options: ['Hielo', 'Vapor', 'Agua'] },
        { q: '¿Cuál es el planeta más grande del sistema solar?', a: 'b', options: ['Tierra', 'Júpiter', 'Saturno'] },
        { q: '¿Qué órgano bombea la sangre en el cuerpo humano?', a: 'a', options: ['Corazón', 'Pulmón', 'Hígado'] },
        { q: '¿Cuál es el metal más abundante en la corteza terrestre?', a: 'b', options: ['Hierro', 'Aluminio', 'Cobre'] },
        { q: '¿Qué tipo de animal es una ballena?', a: 'b', options: ['Pez', 'Mamífero', 'Reptil'] },
        { q: '¿Cuál es el proceso por el cual las plantas producen su alimento?', a: 'a', options: ['Fotosíntesis', 'Respiración', 'Digestión'] },
        { q: '¿Qué planeta es conocido como el planeta rojo?', a: 'b', options: ['Venus', 'Marte', 'Júpiter'] },
        { q: '¿Cuál es el órgano más grande del cuerpo humano?', a: 'b', options: ['Cerebro', 'Piel', 'Hígado'] },
        { q: '¿Qué gas es necesario para la fotosíntesis?', a: 'a', options: ['Dióxido de carbono', 'Oxígeno', 'Nitrógeno'] },
        { q: '¿Cuál es el componente principal del sol?', a: 'b', options: ['Oxígeno', 'Hidrógeno', 'Helio'] }
    ]
};

// Obtener preguntas aleatorias
function getRandomQuestions(subject, num) {
    const shuffled = questions[subject].sort(() => 0.5 - Math.random());
    return shuffled.slice(0, num);
}

// Renderizar preguntas en el HTML
function renderQuestions(subject) {
    const container = document.getElementById(`${subject}Questions`);
    container.innerHTML = ''; // Limpiar preguntas anteriores
    const selectedQuestions = getRandomQuestions(subject, 3);
    selectedQuestions.forEach((q, index) => {
        const div = document.createElement('div');
        div.innerHTML = `
            <label>${index + 1}. ${q.q}</label><br>
            ${q.options.map((option, i) => `
                <input type="radio" name="${subject}q${index + 1}" value="${String.fromCharCode(97 + i)}"> ${option}<br>
            `).join('')}
        `;
        container.appendChild(div);
    });
}

// Abrir una pestaña
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
    renderQuestions(tabName);
}

// Calcular el puntaje
function calculateScore(subject) {
    const selectedQuestions = questions[subject];
    let score = 0;
    selectedQuestions.forEach((q, index) => {
        const selectedOption = document.querySelector(`input[name="${subject}q${index + 1}"]:checked`);
        if (selectedOption && selectedOption.value === q.a) {
            score++;
        }
    });
    document.getElementById(`score${subject}`).textContent = score;
    document.getElementById(`result${subject}`).style.display = 'block';
}

document.getElementsByClassName("tablinks")[0].click(); // Activar la primera pestaña por defecto

</script>
@endsection
