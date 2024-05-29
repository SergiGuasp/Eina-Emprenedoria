<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página con Fondo</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background-image: url('imatges/TestFinalitzat.PNG');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .testCompletat {
            margin-top: 300px;
            margin-left: 680px;
            height: 550px;
        }

        #resultado_radar {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: 80px;
            transform: translate(-50%, -50%);
            background: #ffd4bf;
            padding: 20px;
            border-radius: 10px;
        }

        .image {
            cursor: pointer;
        }

        #resultados_texto {
            display: none;
            position: absolute;
            top: 35%;
            left: 420px;
            transform: translateX(-50%);
            background: #ffd4bf;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <img id="testCompletatImg" class="testCompletat" src="imatges/TestCompletat.PNG">
    
    <div>
        <img id="backButton" src="Imatges/Back.png" style="width: 70px; right: 0; margin-right: 48%; bottom: 0; position: absolute; transform: scaleX(-1); margin-bottom: 70px;" alt="Montgat Emprendimiento" class="image" onclick="mostrarGrafico()">
    </div>

    <div id="resultado_radar"></div>
    <div id="resultados_texto"></div>

    <?php
    if (isset($_GET['respuestas'])) {
        $respuestasJSON = urldecode($_GET['respuestas']);
        $respuestasGrupo1 = isset($_GET['grupo1']) ? json_decode(urldecode($_GET['grupo1']), true) : [];
        $respuestasGrupo2 = isset($_GET['grupo2']) ? json_decode(urldecode($_GET['grupo2']), true) : [];
        $respuestasGrupo3 = isset($_GET['grupo3']) ? json_decode(urldecode($_GET['grupo3']), true) : [];
        $respuestasGrupo4 = isset($_GET['grupo4']) ? json_decode(urldecode($_GET['grupo4']), true) : [];
        $respuestasGrupo5 = isset($_GET['grupo5']) ? json_decode(urldecode($_GET['grupo5']), true) : [];
        $respuestasGrupo6 = isset($_GET['grupo6']) ? json_decode(urldecode($_GET['grupo6']), true) : [];

        echo '<script>';
        echo 'var respuestasGrupo1 = ' . json_encode($respuestasGrupo1) . ';';
        echo 'var respuestasGrupo2 = ' . json_encode($respuestasGrupo2) . ';';
        echo 'var respuestasGrupo3 = ' . json_encode($respuestasGrupo3) . ';';
        echo 'var respuestasGrupo4 = ' . json_encode($respuestasGrupo4) . ';';
        echo 'var respuestasGrupo5 = ' . json_encode($respuestasGrupo5) . ';';
        echo 'var respuestasGrupo6 = ' . json_encode($respuestasGrupo6) . ';';
        echo '</script>';
    } else {
        echo '<script>';
        echo 'var respuestasGrupo1 = [];';
        echo 'var respuestasGrupo2 = [];';
        echo 'var respuestasGrupo3 = [];';
        echo 'var respuestasGrupo4 = [];';
        echo 'var respuestasGrupo5 = [];';
        echo 'var respuestasGrupo6 = [];';
        echo '</script>';
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        console.log("Salida Respuestas Por Grupo: " + respuestasGrupo1 + " " + respuestasGrupo2 + " " + respuestasGrupo3 + " " + respuestasGrupo4 + " " + respuestasGrupo5 + " " + respuestasGrupo6)
        var titulosGrupos = ["Disposició a l'aprenentatge", "Planificació i organització", "Adaptabilitat", "Resiliència", "Networking", "Negociació"]; 

        function sumarValores(arr) {
            return arr.reduce((a, b) => a + b, 0);
        }

        function mostrarGrafico() {
            var divRadar = document.getElementById('resultado_radar');
            divRadar.style.display = 'block';

            var testCompletatImg = document.getElementById('testCompletatImg');
            var backButton = document.getElementById('backButton');
            testCompletatImg.style.display = 'none';
            backButton.style.display = 'none';

            var sumaGrupo1 = sumarValores(respuestasGrupo1);
            var sumaGrupo2 = sumarValores(respuestasGrupo2);
            var sumaGrupo3 = sumarValores(respuestasGrupo3);
            var sumaGrupo4 = sumarValores(respuestasGrupo4);
            var sumaGrupo5 = sumarValores(respuestasGrupo5);
            var sumaGrupo6 = sumarValores(respuestasGrupo6);

            var sumasGrupos = [sumaGrupo1, sumaGrupo2, sumaGrupo3, sumaGrupo4, sumaGrupo5, sumaGrupo6];

            var resultadosHtml = `
                <b><div style=" margin-top:10px; color:white; width:360px; height:30px; padding:15px; font-size:25px; background-color:#FF8888;">${titulosGrupos[0]}: ${sumaGrupo1}/32</div>
                <div style=" margin-top:10px; color:white; width:360px; height:30px; padding:15px; font-size:25px; background-color:#8BB7FF;">${titulosGrupos[1]}: ${sumaGrupo2}/32</div>
                <div style=" margin-top:10px; color:white; width:360px; height:30px; padding:15px; font-size:25px; background-color:#FFF58B;">${titulosGrupos[2]}: ${sumaGrupo3}/32</div>
                <div style=" margin-top:10px; color:white; width:360px; height:30px; padding:15px; font-size:25px; background-color:#8BFF9B;">${titulosGrupos[3]}: ${sumaGrupo4}/32</div>
                <div style=" margin-top:10px; color:white; width:360px; height:30px; padding:15px; font-size:25px; background-color:#DC8BFF;">${titulosGrupos[4]}: ${sumaGrupo5}/32</div>
                <div style=" margin-top:10px; color:white; width:360px; height:30px; padding:15px; font-size:25px; background-color:#FFD28B;">${titulosGrupos[5]}: ${sumaGrupo6}/32</div></b>
            `;
            
            var divResultadosTexto = document.getElementById('resultados_texto');
            divResultadosTexto.style.display = 'block';
            divResultadosTexto.innerHTML = resultadosHtml;

            var canvas = document.createElement('canvas');
            canvas.id = 'radar-chart';
            canvas.width = 400;
            canvas.height = 400;
            divRadar.appendChild(canvas);

            var ctx = canvas.getContext('2d');
            var myRadarChart = new Chart(ctx, {
                type: 'polarArea',
                data: {
                    labels: titulosGrupos,
                    datasets: [{
                        data: sumasGrupos,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false,
                            position: 'bottom'
                        }
                    },
                    scales: {
                        r: {
                            suggestedMin: 0,
                            suggestedMax: 32
                        }
                    }
                }
            });
        }
    </script>
</body>
</html>
