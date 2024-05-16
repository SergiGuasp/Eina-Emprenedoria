<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Competencial</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .pregunta {
            margin-bottom: 20px;
            display: none;
        }
        .pregunta-actual {
            display: block; 
        }
        .pregunta-texto {
            font-weight: bold;
        }
        .respuesta-label {
            display: block;
            margin-bottom: 10px;
        }
        #resultado {
            margin-top: 20px;
            float: left;
        }
        #formulario-test{
            width: 50%;
        }
        canvas {
            max-width: 400px;
            margin-top: 0px;
        }

        .invisible-button {
            border: none;
            background-color: transparent;
            cursor: pointer;
            width: 200px;
        }
        .selected {
            background-color: #ccc;
        }

        .progress-bar {
            margin-top: 5px;
            width: 100px; 
            height: 20px;
            background-color: #eee;
            border-radius: 10px;
            margin-left: 0px;
            display: inline-block;
            position: relative;
        }

        #resultado_progress{
            float: right;
            margin-top: 110px;
            height: 50px;
            margin-right: 550px;
        }

        .progress-bar .progress {
            height: 100%;
            border-radius: 10px;
            position: absolute;
            background-color: red;
            top: 0;
            left: 0;
        }

        #progress-bar-total {
            width: 200px;
            height: 20px;
            background-color: #eee;
            border-radius: 10px;
            margin-left: 0px;
            display: none;
            position: relative;
        }

        #progress-bar-total .progress {
            height: 100%;
            border-radius: 10px;
            position: absolute;
            top: 0;
            left: 0;
        }

        #custom-progress-bar {
            width: 200px;
            height: 20px;
            background-color: #eee;
            border-radius: 10px;
            margin-left: 0px;
            display: block;
            position: relative;
            margin-top: 20px;
        }

        #custom-progress-bar .progress {
            height: 100%;
            border-radius: 10px;
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
</head>
<body>
    <h1>Test Competencial</h1>

    <form id="formulario-test">
        
        <div class="pregunta pregunta-actual">
            <p class="pregunta-texto">Pregunta 1: Si te preguntaran cuáles son tus mayores fortalezas, ¿sabrías responder?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Sí, y podría poner ejemplos de cómo y dónde las pongo en práctica</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Sí, pero a veces no sé cómo demostrarlas</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Sí, pero no creo que me sirvan para emprender</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">No, de hecho me gustaría tenerlas más claras</button>
        </div>
        
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 2: ¿Y tus mayores debilidades?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Sí, y podría explicar cómo las estoy mejorando</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Sí, pero a veces no sé cómo enfrentarlas</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Sí, pero no tengo mucha idea de cómo mejorarlas</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">No, de hecho me gustaría tenerlas más claras</button>
        </div>
        
        <div class="pregunta">
            <p class="pregunta-texto">Pregunta 3: ¿Para qué crees que te servirá este ejercicio?</p>
            <button type="button" class="invisible-button" onclick="toggleSelected(4);">Para saber cómo mejorar mi perfil competencial</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(3);">Para saber qué debo mejorar como emprendedor/a</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(2);">Para saber cómo emprender con éxito</button>
            <button type="button" class="invisible-button" onclick="toggleSelected(1);">Para acceder a los recursos y ayudas del Ayuntamiento</button>
        </div>

      
        <button type="button" id="siguiente-pregunta" onclick="mostrarSiguientePregunta()">Siguiente Pregunta</button>
        
      
        <button type="button" id="finalizar-test" style="display: none;" onclick="finalizarTest()">Finalizar Test</button>
        
        <div id="resultado" style="display: none;">
            <h2>Resultados del Test</h2>
            <p>Respuestas:</p>
            <ul id="lista-respuestas"></ul>
        </div>
        
        <div id="resultado_progress">
            <div class="progress-bar" id="progress-bar-1" style="display: none;">
                <div class="progress" style="width: 0%; background-color: #00E4FF;"></div>
            </div>

            <div class="progress-bar" id="progress-bar-2" style="display: none;">
                <div class="progress" style="width: 0%; background-color: #FF685C;"></div>
            </div>

            <div class="progress-bar" id="progress-bar-3" style="display: none;">
                <div class="progress" style="width: 0%; background-color: #FDC656;"></div>
            </div>
            <div id="custom-progress-bar">
                <div class="progress" style="width: 0%; background-color: black;"></div>
            </div>
        </div>

        <div id="resultado_radar" >
            <canvas id="radar-chart" width="400"></canvas>
        </div>
    </form>


    <script>
        var respuestasPorPregunta = []; 

        var numeroPreguntaActual = 1;
        
        function mostrarSiguientePregunta() {
            var respuestaSeleccionada = document.querySelector('.pregunta.pregunta-actual .invisible-button.selected');
            if (!respuestaSeleccionada) {
                alert('Por favor, selecciona una respuesta antes de continuar.');
                return;
            }
            
            var respuestaValor = parseInt(respuestaSeleccionada.value);
            respuestasPorPregunta.push(respuestaValor);
            
            document.querySelector('.pregunta.pregunta-actual').classList.remove('pregunta-actual');
            
            var siguientePregunta = document.querySelector('.pregunta:nth-child(' + (numeroPreguntaActual + 1) + ')');
            if (siguientePregunta) {
                siguientePregunta.classList.add('pregunta-actual');
                numeroPreguntaActual++;
                
                if (numeroPreguntaActual === 3) {
                    document.getElementById('siguiente-pregunta').style.display = 'none';
                    document.getElementById('finalizar-test').style.display = 'block';
                }
            }

            actualizarBarraProgresoTotal();
        }

        function finalizarTest() {
            var respuestaSeleccionada = document.querySelector('.pregunta.pregunta-actual .invisible-button.selected');
            if (!respuestaSeleccionada) {
                alert('Por favor, selecciona una respuesta antes de continuar.');
                return;
            }
            var respuestaValor = parseInt(respuestaSeleccionada.value);
            respuestasPorPregunta.push(respuestaValor);

            document.querySelector('.pregunta.pregunta-actual').classList.remove('pregunta-actual');
            document.getElementById('finalizar-test').style.display = 'none';
            document.getElementById('resultado').style.display = 'block';
            document.getElementById('custom-progress-bar').style.display = 'none';
            mostrarResultados();
        }


        function mostrarResultados() {
    if (document.getElementById('resultado_progress').style.display === 'none') {
        document.getElementById('resultado_progress').style.display = 'block';
    }
    var listaRespuestas = document.getElementById('lista-respuestas');
    listaRespuestas.innerHTML = '';

    respuestasPorPregunta.forEach(function(respuesta, index) {
        var listItem = document.createElement('li');
        listItem.textContent = 'Pregunta ' + (index + 1) + ': ' + respuesta + "/4";
        listaRespuestas.appendChild(listItem);
    });

    var barrasProgreso = document.querySelectorAll('.progress-bar');
    barrasProgreso.forEach(function(barra, index) {
        var porcentaje = (respuestasPorPregunta[index] / 4) * 100;
        var barraProgreso = barra.querySelector('.progress');
        barraProgreso.style.width = porcentaje + '%';

        barra.style.display = 'block';
    });

    var divRadar = document.getElementById('resultado_radar');

    divRadar.innerHTML = '';

    var canvas = document.createElement('canvas');
    canvas.id = 'radar-chart';
    canvas.width = 400;
    canvas.height = 400;
    divRadar.appendChild(canvas);

    var ctx = canvas.getContext('2d');
    var myRadarChart = new Chart(ctx, {
        type: 'polarArea',
        data: {
            labels: ['Fortalezas', 'Debilidades', 'Objetivos'],
            datasets: [{
                data: respuestasPorPregunta,
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false,
                    position: 'bottom'
                }
            }
        }
    });
}


        function actualizarBarraProgresoTotal() {
            var totalPreguntas = document.querySelectorAll('.pregunta').length;
            var preguntasRespondidas = respuestasPorPregunta.length;
            var porcentaje = (preguntasRespondidas / totalPreguntas) * 100;
            var barraProgresoTotal = document.querySelector('#custom-progress-bar .progress');
            barraProgresoTotal.style.width = porcentaje + '%';

            var customProgressBar = document.querySelector('#custom-progress-bar .progress');
            customProgressBar.style.width = porcentaje + '%';
            
        }
        
        function toggleSelected(valor) {
            var buttons = document.querySelectorAll('.pregunta.pregunta-actual .invisible-button');
            buttons.forEach(function(button) {
                button.classList.remove("selected");
            });
            event.target.classList.add("selected");
            var respuestaSeleccionada = document.querySelector('.pregunta.pregunta-actual .invisible-button.selected');
            respuestaSeleccionada.value = valor;
        }
    </script>
</body>
</html>
