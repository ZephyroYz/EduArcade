<style>
        <>
        .tab-cards {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .flip-card {
            background-color: transparent;
            width: 190px;
            height: 254px;
            perspective: 1000px;
            font-family: sans-serif;
            cursor: pointer;
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.8s;
            transform-style: preserve-3d;
        }

        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front, .flip-card-back {
            box-shadow: 0 8px 14px 0 rgba(0, 0, 0, 0.2);
            position: absolute;
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            border-radius: 1rem;
            background-size: cover;
            background-position: center;
        }

        .flip-card-front {
            background-color: lightgray;
            color: coral;
        }

        .flip-card-back {
            color: white;
            transform: rotateY(180deg);
        }

        .flip-card:nth-child(1) .flip-card-back {
            background: linear-gradient(120deg, lightblue 30%, blue 88%, aliceblue 40%, skyblue 78%);
        }

        .flip-card:nth-child(2) .flip-card-back {
            background: linear-gradient(120deg, lightgreen 30%, green 88%, honeydew 40%, palegreen 78%);
        }

        .flip-card:nth-child(3) .flip-card-back {
            background: linear-gradient(120deg, lightcoral 30%, red 88%, mistyrose 40%, salmon 78%);
        }

        .title {
            font-size: 1.5em;
            font-weight: 900;
            text-align: center;
            margin: 0;
            color: white;
        }



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

        <div class="tab-cards" style="display: flex; justify-content: center; gap: 20px;">
  <div class="flip-card tab-card" onclick="openTab(event, 'Lenguas')">
    <div class="flip-card-inner">
      <div class="flip-card-front" style="background-image: url('{{ asset('img/LengC.png') }}'); image-rendering: pixelated;"></div>
      <div class="flip-card-back">
        <p class="title">Lenguas</p>
      </div>
    </div>
  </div>

  <div class="flip-card tab-card" onclick="openTab(event, 'Matematicas')">
    <div class="flip-card-inner">
      <div class="flip-card-front" style="background-image: url('url_de_tu_imagen_matematicas.jpg');"></div>
      <div class="flip-card-back">
        <p class="title">Matemáticas</p>
      </div>
    </div>
  </div>

  <div class="flip-card tab-card" onclick="openTab(event, 'Ciencias')">
    <div class="flip-card-inner">
      <div class="flip-card-front" style="background-image: url('url_de_tu_imagen_ciencias.jpg');"></div>
      <div class="flip-card-back">
        <p class="title">Ciencias</p>
      </div>
    </div>
  </div>
</div>

        <div id="Lenguas" class="tabcontent">
            <h2>Lenguas</h2>
            <button onclick="showContent('Lenguas', 'lecciones')">Ver Lecciones</button>
            <button onclick="showContent('Lenguas', 'formulario')">Ir al Formulario</button>
            <div id="LenguasLecciones" class="content-section" style="display:none;">

            <h2>1. Vocales</h2>
                <p>Las vocales son las letras que forman el sonido básico de las sílabas en el idioma español. Existen cinco vocales en el alfabeto español: <strong>A, E, I, O, U</strong>. Estas vocales son fundamentales en la formación de palabras y en la pronunciación, ya que son los sonidos centrales de cada sílaba y permiten que se estructuren las palabras de manera adecuada.</p>

            <h3>Lección:</h3>
                <p><strong>¿Cuántas vocales hay en el alfabeto español?</strong> El alfabeto español tiene cinco vocales: <strong>A, E, I, O, U</strong>. Estas letras tienen un sonido propio y son esenciales para formar sílabas y palabras. Sin ellas, no podríamos construir muchas de las palabras que usamos en el día a día.</p>
                <p><strong>¿Cuál de las siguientes es una vocal?</strong> La letra <strong>A</strong> es una vocal. Las otras opciones, como <strong>B</strong> y <strong>C</strong>, son consonantes. Las consonantes y las vocales se combinan para formar sílabas, pero tienen roles diferentes en la estructura de las palabras.</p>
                <p><strong>¿Cuál es la vocal que falta en la oración "L_ c_s_ es muy gr_nde"?</strong> En esta oración, la letra <strong>"a"</strong> completa las palabras "La casa es muy grande". Esto muestra cómo las vocales son fundamentales para completar el significado de las palabras. Sin las vocales correctas, las palabras no tendrían sentido.</p>
                <p><strong>¿Cuál es la vocal que falta en la oración "El p_rro _s muy jugu_tón"?</strong> La letra <strong>"a"</strong> completa las palabras "perro" y "es" en esta oración. Las vocales también son esenciales para formar palabras que den sentido a las oraciones y que puedan ser entendidas correctamente.</p>

            <h2>2. Sustantivos Comunes y Propios</h2>
                <p>Los sustantivos son palabras que nombran a personas, animales, cosas, lugares o ideas. Se dividen en <strong>comunes</strong> y <strong>propios</strong>. Los sustantivos comunes se refieren a objetos, personas o lugares en general, como "perro" o "ciudad". Por otro lado, los sustantivos propios son los nombres específicos de personas, lugares o cosas, como "María" o "México".</p>

            <h3>Lección:</h3>
                <p><strong>¿Cuál de las siguientes palabras es un sustantivo propio?</strong> Un sustantivo propio es <strong>"María"</strong>, ya que es el nombre específico de una persona. Los sustantivos propios siempre se escriben con inicial mayúscula. Mientras tanto, palabras como <strong>"mesa"</strong> o <strong>"ciudad"</strong> son sustantivos comunes porque se usan de manera general para referirse a objetos o lugares.</p>
                <p><strong>¿Cuál de las siguientes palabras es un sustantivo común?</strong> <strong>"Perro"</strong> es un sustantivo común, porque se refiere a un tipo de animal en general, sin especificar a uno en particular. En cambio, palabras como <strong>"España"</strong> o <strong>"Madrid"</strong> son sustantivos propios, ya que nombran lugares específicos.</p>

            <h2>3. Sinónimos y Antónimos</h2>
                <p>Los <strong>sinónimos</strong> son palabras que tienen el mismo o un significado similar, mientras que los <strong>antónimos</strong> son palabras que tienen significados opuestos. Estos conceptos son muy importantes para enriquecer el vocabulario y comprender mejor las ideas al comunicarte.</p>

            <h3>Lección:</h3>
                <p><strong>¿Cuál es un sinónimo de "feliz"?</strong> Un sinónimo de <strong>"feliz"</strong> es <strong>"contento"</strong>, ya que ambas palabras expresan la misma idea de alegría y bienestar. Los sinónimos pueden usarse para evitar repeticiones y darle variedad a nuestro lenguaje.</p>
                <p><strong>¿Cuál es un antónimo de "grande"?</strong> El antónimo de <strong>"grande"</strong> es <strong>"pequeño"</strong>, porque estas dos palabras expresan ideas opuestas sobre el tamaño. Conocer antónimos es esencial para entender las diferencias entre conceptos y utilizarlos correctamente en el contexto adecuado.</p>

            <h2>4. Signos de Puntuación</h2>
                <p>Los <strong>signos de puntuación</strong> son símbolos utilizados para estructurar y organizar las oraciones, ayudando a que el mensaje sea claro y fácil de comprender. El uso adecuado de los signos de puntuación es clave para una buena comunicación escrita.</p>

            <h3>Lección:</h3>
                <p><strong>¿Qué signo de puntuación se usa al final de una pregunta?</strong> El signo que se usa al final de una pregunta es el signo de interrogación ("<strong>?</strong>"). Este signo es crucial para indicar que una oración es una pregunta y para que el lector o interlocutor entienda que se espera una respuesta.</p>
                <p><strong>¿Qué signo de puntuación se usa para separar elementos en una lista?</strong> El signo que se usa para separar los elementos de una lista es la coma ("<strong>,</strong>"). Las comas se utilizan para separar palabras o frases dentro de una misma oración, haciendo que el mensaje sea más organizado y fácil de seguir.</p>



            </div>
            <div id="LenguasFormulario" class="content-section" style="display:none;">
                <form id="quizFormLenguas">
                    <div id="LenguasQuestions"></div>
                    <button type="button" onclick="calculateScore('Lenguas')">Enviar</button>
                    <div id="resultLenguas" style="display:none;">
                        <h2>Tu puntaje es: <span id="scoreLenguas"></span>/3</h2>
                    </div>
                </form>
            </div>
        </div>

        <div id="Matematicas" class="tabcontent">
            <h2>Matemáticas</h2>
            <button onclick="showContent('Matematicas', 'lecciones')">Ver Lecciones</button>
            <button onclick="showContent('Matematicas', 'formulario')">Ir al Formulario</button>
            <div id="MatematicasLecciones" class="content-section" style="display:none;">
    <h1>Lecciones de Matemáticas</h1>

    <h2>1. Sumas y Restas</h2>
        <p>Las sumas son operaciones matemáticas que consisten en añadir dos o más números para obtener un total. Las restas son operaciones matemáticas que implican quitar una cantidad de otra para encontrar la diferencia.</p>

    <h3>Lección:</h3>
        <p><strong>¿Cuánto es 23 + 17?</strong> Para sumar 23 y 17, se suman las unidades (3 + 7 = 10) y las decenas (2 + 1 = 3), lo que da un total de 40.</p>
        <p><strong>¿Cuánto es 58 - 24?</strong> Para restar 24 de 58, restamos las unidades (8 - 4 = 4) y las decenas (5 - 2 = 3), resultando 34.</p>

    <h2>2. Multiplicaciones</h2>
        <p>La multiplicación es una operación que nos permite sumar varias veces un mismo número. Se puede ver como una adición repetida.</p>

    <h3>Lección:</h3>
        <p><strong>¿Cuánto es 9 * 7?</strong> La multiplicación de 9 por 7 es 63, porque 9 sumado siete veces es igual a 63.</p>
        <p><strong>¿Cuánto es 8 * 5?</strong> Al multiplicar 8 por 5, obtenemos 40.</p>

    <h2>3. Divisiones</h2>
        <p>La división es la operación matemática que se utiliza para repartir un número en partes iguales.</p>

    <h3>Lección:</h3>
        <p><strong>¿Cuánto es 120 / 10?</strong> La división de 120 entre 10 es igual a 12.</p>
        <p><strong>¿Cuánto es 72 / 8?</strong> Dividir 72 entre 8 nos da como resultado 9.</p>

    <h2>4. Fracciones</h2>
        <p>Una fracción representa una parte de un todo y se escribe como dos números separados por una línea, donde el número superior (numerador) indica cuántas partes tomamos, y el número inferior (denominador) muestra en cuántas partes se divide el todo.</p>

    <h3>Lección:</h3>
        <p><strong>¿Cuál es la fracción equivalente a 4/8?</strong> La fracción 4/8 es equivalente a 1/2, ya que ambos números pueden simplificarse.</p>
        <p><strong>¿Cuál es la fracción equivalente a 15/5?</strong> La fracción 15/5 es equivalente a 3/1, que es igual a 3.</p>

            </div>
            <div id="MatematicasFormulario" class="content-section" style="display:none;">
                <form id="quizFormMatematicas">
                    <div id="MatematicasQuestions"></div>
                    <button type="button" onclick="calculateScore('Matematicas')">Enviar</button>
                    <div id="resultMatematicas" style="display:none;">
                        <h2>Tu puntaje es: <span id="scoreMatematicas"></span>/3</h2>
                    </div>
                </form>
            </div>
        </div>

        <div id="Ciencias" class="tabcontent">
            <h2>Ciencias</h2>
            <button onclick="showContent('Ciencias', 'lecciones')">Ver Lecciones</button>
            <button onclick="showContent('Ciencias', 'formulario')">Ir al Formulario</button>
            <div id="CienciasLecciones" class="content-section" style="display:none;">
                <h3>Lecciones de Ciencias</h3>

            <h2>1. Sistema Solar</h2>
                <p>El sistema solar está formado por el Sol, los planetas y otros cuerpos celestes como asteroides y cometas que giran alrededor del Sol. Los planetas en nuestro sistema solar son muy diferentes entre sí y tienen características únicas. Los planetas están divididos en dos grupos: los planetas rocosos (como la Tierra) y los planetas gaseosos (como Júpiter). El estudio de estos cuerpos celestes nos ayuda a entender mejor nuestro lugar en el universo.</p>

            <h3>Lección:</h3>
                <p><strong>¿Por qué Mercurio, el planeta más cercano al Sol, no es el más caliente?</strong> Aunque Mercurio está cerca del Sol, no tiene una atmósfera significativa para retener el calor. Esto significa que durante el día se calienta mucho, pero por la noche su temperatura baja drásticamente. En cambio, Venus, que está más lejos del Sol, tiene una atmósfera espesa que atrapa el calor, convirtiéndolo en el planeta más caliente del sistema solar.</p>
                <p><strong>Si Júpiter es el planeta más grande, ¿qué lo hace diferente a la Tierra?</strong> Júpiter es un gigante gaseoso, lo que significa que está compuesto principalmente por gases como hidrógeno y helio. A diferencia de la Tierra, que tiene una superficie sólida y una atmósfera más equilibrada, Júpiter no tiene una superficie sólida sobre la que podamos caminar. Su atmósfera está llena de tormentas, como la famosa Gran Mancha Roja, que es una tormenta gigante que ha durado siglos.</p>

            <h2>2. El Cuerpo Humano</h2>
                <p>El cuerpo humano es un sistema increíblemente complejo que consta de diferentes órganos y sistemas que trabajan juntos para mantener la vida. Estos sistemas incluyen el sistema circulatorio, respiratorio, nervioso, digestivo, entre otros. Cada órgano tiene una función específica, y todos dependen de los demás para funcionar correctamente.</p>

            <h3>Lección:</h3>
                <p><strong>Si una persona deja de beber agua, ¿qué le pasaría primero?</strong> El cuerpo humano necesita agua para mantener muchas funciones vitales. El agua ayuda a regular la temperatura corporal, transportar nutrientes y eliminar desechos. Si una persona deja de beber agua, su cuerpo comenzará a deshidratarse, lo que puede afectar gravemente al sistema circulatorio y a la capacidad de los órganos para funcionar correctamente. Los primeros síntomas de deshidratación incluyen sequedad en la piel, cansancio y mareos.</p>
                <p><strong>Si el cerebro controla el cuerpo, ¿qué función principal tiene el corazón?</strong> El cerebro es el centro de control del cuerpo, pero el corazón tiene una función crucial: bombear sangre a todo el cuerpo. La sangre transporta oxígeno y nutrientes a los órganos y elimina los desechos. El corazón asegura que la sangre fluya continuamente a través del sistema circulatorio, permitiendo que todos los órganos reciban lo que necesitan para funcionar correctamente.</p>

            <h2>3. Los Animales</h2>
                <p>Los animales tienen diversas adaptaciones que les permiten sobrevivir en sus respectivos ambientes. Estas adaptaciones pueden ser físicas, como el color o la forma de su cuerpo, o comportamentales, como sus hábitos alimenticios o de reproducción. Cada especie está diseñada para vivir en el entorno que la rodea.</p>

            <h3>Lección:</h3>
                <p><strong>¿Por qué los pingüinos no pueden volar aunque tengan alas?</strong> Los pingüinos tienen alas, pero están adaptadas para nadar, no para volar. Sus alas actúan como aletas que les permiten moverse rápidamente bajo el agua, lo cual es crucial para su supervivencia, ya que dependen del agua para alimentarse. Aunque sus alas no les permiten volar por el aire, están perfectamente adaptadas para su estilo de vida acuático.</p>
                <p><strong>¿Qué animal puede dormir con un ojo abierto para vigilar a los depredadores?</strong> Los delfines tienen la capacidad de dormir con un ojo abierto gracias a un mecanismo en su cerebro que les permite desconectar una mitad del cerebro mientras la otra sigue activa. Esto les permite mantenerse alerta ante posibles depredadores o amenazas en su entorno, lo cual es una ventaja en su vida acuática.</p>

            <h2>4. El Medio Ambiente</h2>
                <p>El medio ambiente incluye todos los elementos naturales que nos rodean: el aire, el agua, las plantas, los animales y los ecosistemas. Es fundamental cuidar el medio ambiente para asegurar que las generaciones futuras puedan disfrutar de estos recursos y vivir en un planeta saludable. La contaminación y la deforestación son algunos de los principales problemas que afectan al medio ambiente.</p>

            <h3>Lección:</h3>
                <p><strong>Si cortamos demasiados árboles, ¿qué pasará con el aire?</strong> Los árboles son esenciales para el equilibrio del aire que respiramos. Absorben dióxido de carbono y liberan oxígeno. Si cortamos demasiados árboles, disminuye la cantidad de oxígeno en la atmósfera y aumenta el dióxido de carbono, lo que contribuye al cambio climático y al calentamiento global. Además, la deforestación afecta negativamente a los ecosistemas que dependen de los árboles para sobrevivir.</p>
                <p><strong>¿Por qué los océanos son importantes para la vida en la Tierra?</strong> Los océanos son fundamentales para la vida en la Tierra por varias razones. En primer lugar, los océanos producen la mayor parte del oxígeno que respiramos, gracias a las algas y plantas marinas. Además, los océanos regulan la temperatura del planeta, absorbiendo y liberando calor. Sin los océanos, el clima de la Tierra sería mucho más extremo y difícil para la vida.</p>


            </div>
            <div id="CienciasFormulario" class="content-section" style="display:none;">
                <form id="quizFormCiencias">
                    <div id="CienciasQuestions"></div>
                    <button type="button" onclick="calculateScore('Ciencias')">Enviar</button>
                    <div id="resultCiencias" style="display:none;">
                        <h2>Tu puntaje es: <span id="scoreCiencias"></span>/3</h2>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Preguntas para cada materia
const questions = {
    Lenguas: [
        // Preguntas sobre vocales
        { q: '¿Cuántas vocales hay en el alfabeto español?', a: 'b', options: ['4', '5', '6'] },
        { q: '¿Cuál de las siguientes es una vocal?', a: 'a', options: ['A', 'B', 'C'] },
        { q: '¿Cuál es la vocal que falta en la oración "L_ c_s_ es muy gr_nde"?', a: 'a', options: ['a', 'e', 'o'] },
        { q: '¿Cuál es la vocal que falta en la oración "El p_rro _s muy jugu_tón"?', a: 'b', options: ['a', 'e', 'o'] },
        
        // Preguntas sobre sustantivos comunes y propios
        { q: '¿Cuál de las siguientes palabras es un sustantivo propio?', a: 'a', options: ['María', 'mesa', 'ciudad'] },
        { q: '¿Cuál de las siguientes palabras es un sustantivo común?', a: 'b', options: ['España', 'perro', 'Madrid'] },
        { q: '¿Cuál de las siguientes palabras es un sustantivo propio?', a: 'c', options: ['gato', 'árbol', 'Juan'] },
        { q: '¿Cuál de las siguientes palabras es un sustantivo común?', a: 'a', options: ['libro', 'Carlos', 'México'] },
        
        // Preguntas sobre sinónimos y antónimos
        { q: '¿Cuál es un sinónimo de "feliz"?', a: 'b', options: ['triste', 'contento', 'enojado'] },
        { q: '¿Cuál es un antónimo de "grande"?', a: 'a', options: ['pequeño', 'alto', 'ancho'] },
        { q: '¿Cuál es un sinónimo de "rápido"?', a: 'c', options: ['lento', 'pausado', 'veloz'] },
        { q: '¿Cuál es un antónimo de "fuerte"?', a: 'a', options: ['débil', 'fuerte', 'robusto'] },
        
        // Preguntas sobre signos de puntuación
        { q: '¿Qué signo de puntuación se usa al final de una pregunta?', a: 'a', options: ['?', '!', '.'] },
        { q: '¿Qué signo de puntuación se usa para separar elementos en una lista?', a: 'b', options: ['.', ',', ';'] },
        { q: '¿Qué signo de puntuación se usa al final de una oración?', a: 'c', options: ['¿', '!', '.'] },
        { q: '¿Qué signo de puntuación se usa para indicar una pausa breve en una oración?', a: 'b', options: [',', ';', ':'] }
        
    ],
    
    Matematicas: [
        // Preguntas sobre sumas y restas
        { q: '¿Cuánto es 15 + 27?', a: 'c', options: ['32', '40', '42'] },
        { q: '¿Cuánto es 45 - 19?', a: 'b', options: ['28', '26', '24'] },
        { q: '¿Cuánto es 123 - 57?', a: 'a', options: ['66', '70', '64'] },
        { q: '¿Cuánto es 89 + 34?', a: 'c', options: ['110', '120', '123'] },
        
        // Preguntas sobre multiplicaciones
        { q: '¿Cuánto es 12 * 8?', a: 'b', options: ['80', '96', '104'] },
        { q: '¿Cuánto es 7 * 6?', a: 'a', options: ['42', '48', '36'] },
        { q: '¿Cuánto es 9 * 9?', a: 'b', options: ['72', '81', '90'] },
        { q: '¿Cuánto es 15 * 4?', a: 'b', options: ['50', '60', '70'] },
        
        // Preguntas sobre divisiones
        { q: '¿Cuánto es 144 / 12?', a: 'a', options: ['12', '14', '16'] },
        { q: '¿Cuánto es 81 / 9?', a: 'c', options: ['7', '8', '9'] },
        { q: '¿Cuánto es 56 / 7?', a: 'b', options: ['6', '8', '10'] },
        { q: '¿Cuánto es 100 / 25?', a: 'a', options: ['4', '5', '6'] },
        
        // Preguntas sobre fracciones
        { q: '¿Cuál es la fracción equivalente a 3/9?', a: 'b', options: ['1/4', '1/3', '1/2'] },
        { q: '¿Cuál es la fracción equivalente a 32/8?', a: 'c', options: ['6', '2/3', '4/1'] },
        { q: '¿Cuál es la fracción equivalente a 6/24?', a: 'a', options: ['1/4', '1/3', '1/2'] },
        { q: '¿Cuál es la fracción equivalente a 9/18?', a: 'b', options: ['1/4', '1/2', '3/4'] }
    ],

    Ciencias: [
         // Preguntas sobre el sistema solar
    { q: '¿Por qué Mercurio, el planeta más cercano al Sol, no es el más caliente?', a: 'b', options: ['Porque está hecho de metal', 'Porque no tiene atmósfera para retener el calor', 'Porque gira demasiado rápido'] },
    { q: 'Si Júpiter es el planeta más grande, ¿qué lo hace diferente a la Tierra?', a: 'c', options: ['Tiene volcanes gigantes', 'Es el único con agua líquida', 'Está hecho de gases y no tiene superficie sólida'] },
    { q: 'Si viajaras a Marte, ¿qué problema enfrentarías al respirar?', a: 'a', options: ['No hay suficiente oxígeno', 'El aire es muy frío', 'Los volcanes expulsan gases venenosos'] },
    { q: '¿Qué planeta tiene tormentas gigantes como la Gran Mancha Roja?', a: 'c', options: ['Neptuno', 'Urano', 'Júpiter'] },

    // Preguntas sobre el cuerpo humano
    { q: 'Si una persona deja de beber agua, ¿qué le pasaría primero?', a: 'b', options: ['Se quedaría sin energía', 'Su cuerpo no podría regular la temperatura', 'Su corazón dejaría de latir'] },
    { q: 'Si el cerebro controla el cuerpo, ¿qué función principal tiene el corazón?', a: 'c', options: ['Envía oxígeno al cerebro', 'Controla los nervios', 'Bombea sangre con oxígeno a todo el cuerpo'] },
    { q: 'Cuando respiramos, ¿qué gas tomamos del aire y cuál expulsamos?', a: 'a', options: ['Tomamos oxígeno y expulsamos dióxido de carbono', 'Tomamos nitrógeno y expulsamos oxígeno', 'Tomamos hidrógeno y expulsamos nitrógeno'] },
    { q: '¿Cuál es el hueso más largo del cuerpo humano?', a: 'c', options: ['Húmero', 'Cráneo', 'Fémur'] },

    // Preguntas sobre los animales
    { q: '¿Por qué los pingüinos no pueden volar aunque tengan alas?', a: 'a', options: ['Sus alas son cortas y están adaptadas para nadar', 'Su cuerpo es demasiado pesado', 'No tienen plumas suficientes'] },
    { q: 'Si un camaleón cambia de color, ¿qué está tratando de hacer?', a: 'c', options: ['Atraer a otros camaleones', 'Defenderse de los depredadores', 'Regular su temperatura y camuflarse'] },
    { q: '¿Qué animal puede dormir con un ojo abierto para vigilar a los depredadores?', a: 'b', options: ['León', 'Delfín', 'Águila'] },
    { q: 'Si un oso entra en hibernación, ¿qué significa eso?', a: 'c', options: ['Se esconde en la nieve', 'Come más para protegerse del frío', 'Duerme durante meses para conservar energía'] },

    // Preguntas sobre el medio ambiente
    { q: 'Si cortamos demasiados árboles, ¿qué pasará con el aire?', a: 'b', options: ['Habrá más oxígeno', 'Habrá menos oxígeno y más dióxido de carbono', 'Nada cambiará porque el aire se repone solo'] },
    { q: '¿Por qué los océanos son importantes para la vida en la Tierra?', a: 'c', options: ['Son la mayor fuente de alimentos', 'Nos protegen del calor del Sol', 'Producen la mayor parte del oxígeno del planeta'] },
    { q: 'Si dejas una botella de plástico en la naturaleza, ¿qué problema causa?', a: 'a', options: ['Tarda cientos de años en descomponerse', 'Se convierte en agua con el tiempo', 'Los árboles pueden absorberla sin problema'] },
    { q: '¿Por qué el calentamiento global es un problema?', a: 'c', options: ['Hace que llueva menos', 'Provoca más tornados', 'Aumenta la temperatura y derrite los polos'] }
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
}

// Mostrar contenido de lecciones o formulario
function showContent(subject, type) {
    const lecciones = document.getElementById(`${subject}Lecciones`);
    const formulario = document.getElementById(`${subject}Formulario`);
    if (type === 'lecciones') {
        lecciones.style.display = 'block';
        formulario.style.display = 'none';
    } else {
        lecciones.style.display = 'none';
        formulario.style.display = 'block';
        renderQuestions(subject);
    }
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
