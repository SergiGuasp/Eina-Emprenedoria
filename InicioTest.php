<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botón con Imagen de Fondo</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background: url('imatges/PORTADA_1920-1080.png') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .button {
            width: 200px;
            height: 200px;
            background: url('imatges/Fletxa.png') no-repeat center center;
            background-size: 60%;
            border: none;
            margin-top: 360px;
            margin-left: 1420px;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
<a href="Recursos.php">
        <button class="button"></button>
    </a>
</body>
</html>
