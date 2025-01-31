<?php
$url_razas = 'https://dog.ceo/api/breeds/list/all';
$respuesta_razas = file_get_contents($url_razas);
$datos_razas = json_decode($respuesta_razas, true);

if (!isset($datos_razas['status']) || $datos_razas['status'] !== 'success') {
    die('Error al obtener la lista de razas.');
}

$razas = array_keys($datos_razas['message']);

if (isset($_GET['raza'])) {
    $raza_seleccionada = $_GET['raza'];
} else {
    $raza_seleccionada = $razas[0];
}

$url_imagen_aleatoria = "https://dog.ceo/api/breed/$raza_seleccionada/images/random";
$respuesta_imagen = file_get_contents($url_imagen_aleatoria);
$datos_imagen = json_decode($respuesta_imagen, true);

if (!isset($datos_imagen['status']) || $datos_imagen['status'] !== 'success') {
    die('Error al obtener la imagen del perrito.');
}
$imagen_perrito = $datos_imagen['message'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perrito Aleatorio por Raza</title>
    <style>
        img {
            width: 200px;
            height: 200px;
        }
    </style>
</head>
<body>
    <h1>Perrito + Raza aleatoria</h1>

    <form action="" method="GET">
        <select name="raza">
            <?php foreach ($razas as $raza): ?>
                <option value="<?php echo $raza; ?>" <?php if ($raza === $raza_seleccionada) echo 'selected'; ?>>
                    <?php echo $raza; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Mostrar</button>
    </form>
    <br>
    <img src="<?php echo $imagen_perrito; ?>" alt="Perrito aleatorio">
</body>
</html>