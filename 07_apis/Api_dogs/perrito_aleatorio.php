<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perrito Aleatorio</title>
    <style>
        img {
            width: 200px;
            height: 200px;
        }
    </style>
</head>
<body>
    <?php
    $url_imagen_aleatoria = 'https://dog.ceo/api/breeds/image/random';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url_imagen_aleatoria);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $respuesta = curl_exec($curl);
    if ($respuesta === false) {
        die('Error al conectarse a la API.');
    }
    curl_close($curl);

    $datos = json_decode($respuesta, true);

    if (isset($datos['status']) && $datos['status'] === 'success') {
        $imagen_perrito = $datos['message'];
    } else {
        die('Error al obtener la imagen del perrito.');
    }
    ?>

    <h1>¡GUAU!</h1>
    <img src="<?php echo $imagen_perrito; ?>" alt="Perrito aleatorio">
    
    <form action="" method="GET">
        <button type="submit">OTRO!</button>
    </form>
</body>
</html>