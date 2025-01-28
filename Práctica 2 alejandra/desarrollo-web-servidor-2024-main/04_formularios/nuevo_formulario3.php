<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Completo</title>
</head>
<body>
    <form method="post" action="nuevo_formulario3.php">
        <label for="nombre">Nombre (3-20 caracteres, sin números):</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"></textarea><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="fecha">Fecha de Evento (entre hoy y 1 año en el futuro):</label>
        <input type="date" id="fecha" name="fecha" required><br>

        <label for="url">URL:</label>
        <input type="url" id="url" name="url"><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Resetear">
    </form>

    <?php
    function depurar($data) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error = '';

        $tmp_nombre = trim($_POST["nombre"]);
        $tmp_descripcion = trim($_POST["descripcion"]);
        $tmp_email = trim($_POST["email"]);
        $tmp_fecha = trim($_POST["fecha"]);
        $tmp_url = trim($_POST["url"]);

        // Validación del nombre
        if (empty($tmp_nombre)) {
            $error .= "El nombre es obligatorio.<br>";
        } elseif (strlen($tmp_nombre) < 3 || strlen($tmp_nombre) > 20 || preg_match('/[0-9]/', $tmp_nombre)) {
            $error .= "El nombre debe tener entre 3 y 20 caracteres y no contener números.<br>";
        } else {
            $nombre = $tmp_nombre;
        }

        // Validación del correo electrónico
        if (empty($tmp_email)) {
            $error .= "El correo electrónico es obligatorio.<br>";
        } elseif (!filter_var($tmp_email, FILTER_VALIDATE_EMAIL)) {
            $error .= "El correo electrónico no es válido.<br>";
        } else {
            $email = $tmp_email;
        }

        // Validación de la fecha
        $fecha_evento = DateTime::createFromFormat('Y-m-d', $tmp_fecha);
        $fecha_actual = new DateTime();
        $fecha_maxima = (clone $fecha_actual)->modify('+1 year');

        if ($fecha_evento === false || $fecha_evento < $fecha_actual || $fecha_evento > $fecha_maxima) {
            $error .= "La fecha del evento debe ser entre hoy y dentro de un año.<br>";
        } else {
            $fecha = $tmp_fecha;
        }

        // Validación de la URL (opcional)
        if (!empty($tmp_url) && !filter_var($tmp_url, FILTER_VALIDATE_URL)) {
            $error .= "La URL no es válida.<br>";
        } else {
            $url = $tmp_url;
        }

        // Palabras baneadas en la descripción
        $palabras_baneadas = ["mala", "prohibida", "inapropiada"];
        foreach ($palabras_baneadas as $palabra) {
            if (stripos($tmp_descripcion, $palabra) !== false) {
                $error .= "La descripción contiene palabras no permitidas.<br>";
                break;
            }
        }

        // Uso de explode para dividir una cadena
        $cadena = "uno,dos,tres,cuatro";
        $array = explode(",", $cadena);
        depurar($array);

        // Si no hay errores, procesar los datos (por ejemplo, guardarlos en una base de datos)
        if (empty($error)) {
            echo "Formulario enviado correctamente.";
            // Aquí puedes añadir el código para procesar los datos
            depurar($_POST);
        } else {
            echo $error;
        }
    }
    ?>
</body>
</html>