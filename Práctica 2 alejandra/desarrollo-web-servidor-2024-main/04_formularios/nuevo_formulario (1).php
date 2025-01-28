<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Completo</title>
</head>
<body>
    <form method="post" action="">
        <label for="nombre">Nombre (3-20 caracteres, sin números):</label>
        <input type="text" id="nombre" name="nombre"><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"></textarea><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email"><br>

        <label for="fecha">Fecha de Evento (entre hoy y 1 año en el futuro):</label>
        <input type="date" id="fecha" name="fecha"><br>

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

        if (isset($_POST["nombre"])) {
            $tmp_nombre = $_POST["nombre"];
        } else {
            $tmp_nombre = '';
        }

        if (isset($_POST["descripcion"])) {
            $tmp_descripcion = $_POST["descripcion"];
        } else {
            $tmp_descripcion = '';
        }

        if (isset($_POST["email"])) {
            $tmp_email = $_POST["email"];
        } else {
            $tmp_email = '';
        }

        if (isset($_POST["fecha"])) {
            $tmp_fecha = $_POST["fecha"];
        } else {
            $tmp_fecha = '';
        }

        if (isset($_POST["url"])) {
            $tmp_url = $_POST["url"];
        } else {
            $tmp_url = '';
        }

        // Validación del nombre
        if (!isset($_POST["nombre"]) || strlen($tmp_nombre) < 3 || strlen($tmp_nombre) > 20 || preg_match('/[0-9]/', $tmp_nombre)) {
            $error .= "El nombre debe tener entre 3 y 20 caracteres y no contener números.<br>";
        } else {
            $nombre = $tmp_nombre;
        }

        // Validación del correo electrónico
        if (!isset($_POST["email"]) || !filter_var($tmp_email, FILTER_VALIDATE_EMAIL)) {
            $error .= "El correo electrónico no es válido.<br>";
        } else {
            $email = $tmp_email;
        }

        // Validación de la fecha
        if (isset($_POST["fecha"])) {
            $fecha_evento = $tmp_fecha;
            $fecha_actual = date('Y-m-d'); // Fecha actual en formato Y-m-d
            $fecha_maxima = date('Y-m-d', strtotime('+1 year')); // Un año desde hoy
            if ($fecha_evento < $fecha_actual || $fecha_evento > $fecha_maxima) {
                $error .= "La fecha del evento debe ser entre hoy y dentro de un año.<br>";
            } else {
                $fecha = $tmp_fecha;
            }
        } else {
            $error .= "La fecha del evento es obligatoria.<br>";
        }

        // Validación de la URL (opcional)
        if (isset($_POST["url"]) && !empty($tmp_url) && !filter_var($tmp_url, FILTER_VALIDATE_URL)) {
            $error .= "La URL no es válida.<br>";
        } else {
            $url = $tmp_url;
        }

        // Palabras baneadas en la descripción
        $palabras_baneadas = ["mala", "prohibida", "inapropiada"];
        foreach ($palabras_baneadas as $palabra) {
            if (isset($_POST["descripcion"]) && stripos($tmp_descripcion, $palabra) !== false) {
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