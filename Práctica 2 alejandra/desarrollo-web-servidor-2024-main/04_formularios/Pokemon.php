<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php   
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>

<form method="POST" action="">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"required><br>

        <label for="peso">Peso:</label><br>
        <input type="number" id="peso" name="peso"required><br>

        <label for="genero">Género:</label><br>
        <input type="radio" id="genero" name="genero">Masculino<br>
        <input type="radio" id="genero" name="genero">Femenino<br>

        <br>

        <label for="tipo">Tipo:</label><br>
        <select name="tipo" id="tipo" required>
            <option value="Agua">Agua</option>
            <option value="Fuego">Fuego</option>
            <option value="Volador">Volador</option>
            <option value="Planta">Planta</option>
            <option value="Electrico">Eléctrico</option>
        </select><br><br>

        <label for="fecha_captura">Fecha de captura:</label><br>
        <input type="date" id="fecha_captura" name="fecha_captura" required><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion"></textarea><br>

        <input type="submit" value="Enviar">
    </form>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_nombre = $_POST["nombre"];
        $tmp_peso = $_POST["peso"];
        $tmp_genero = $_POST["genero"];
        $tmp_tipo = $_POST["tipo"];
        $tmp_fecha_captura = $_POST["fecha_captura"];
        $tmp_descripcion = $_POST["descripcion"];

        $error = '';

        if (isset($_POST["nombre"])) {
            $tmp_nombre = $_POST["nombre"];
        } else {
            $tmp_nombre = '';
        }

        // Validación del nombre
        if (!isset($_POST["nombre"]) || strlen($tmp_nombre) < 3 || strlen($tmp_nombre) > 30) {
            $error = "El nombre debe tener entre 3 y 30 caracteres<br>";
        } else {
            $patron = "/^[a-zA-Z\ áéíóúÁÉÍÓÚ]+$/";
                if(!preg_match($patron, $tmp_nombre)) {
                    $error = "El nombre solo puede contener letras 
                        o espacios en blanco";
                } else {
                    $nombre = $tmp_nombre;
                    echo "Nombre: $nombre<br>";
                }
        }

        if (isset($_POST["peso"])) {
            $tmp_peso = $_POST["peso"];
        } else {
            $tmp_peso = '';
        }

        // Validación del Peso
        if($tmp_peso == '') {
            $error = "El peso es obligatorio";
        } else {
            if(filter_var($tmp_peso, FILTER_VALIDATE_FLOAT) === FALSE) {
                $error = "El peso debe ser un número";
            } else {
                if($tmp_peso <= 0 || $tmp_peso > 999) {
                    $error = "El precio no puede ser un número negativo ni mayor a 999";
                } else {
                    $peso = $tmp_peso;
                    echo "Peso: $peso <br>";
                }
            }
        }

        // Validación del genero
        //da error, no recuerdo como controlarlo
        if (!isset($_POST["genero"])) {
            $error = "genero: Desconocido.<br>";
        } else {
            $genero = $tmp_genero;
            echo "Genero: $genero<br>";
        }

        // Validación del Tipo
        $tipo = ["Agua", "Fuego", "Volador", "Planta", "Electrico"];
        if (empty($tmp_tipo) || !in_array($tmp_tipo, $tipo)) {
            $error = "El tipo del Pokemon es obligatorio y debe ser válido.<br>";
        } else {
            $tipo = $tmp_tipo;
            echo "Tipo: $tipo <br>";
        }

        //validación fecha
        //he trasteado de mas y tampoco he podido controlar esto, no tengo tiempo para arreglarlo, perdon.
        if (isset($_POST["fecha"])) {
            $fecha_evento = DateTime::createFromFormat('Y-m-d', $tmp_fecha);
            $fecha_actual = new DateTime();
            $fecha_maxima = (clone $fecha_actual)->modify('+1 year');

            if ($fecha_evento === false || $fecha_evento < $fecha_actual || $fecha_evento > $fecha_maxima) {
                $error = "La fecha del evento debe ser entre hoy y hace 30 años.<br>";
            } else {
                $fecha = $tmp_fecha;
            }
        } else {
            $error = "La fecha de captura es obligatoria.<br>";
        }

        //me falta la descripcion


       // Si no hay errores
       if (empty($error)) {
        echo "Formulario enviado correctamente.<br>";
    } else {
        echo $error;
    }
    }
    ?>
</body>
</html>