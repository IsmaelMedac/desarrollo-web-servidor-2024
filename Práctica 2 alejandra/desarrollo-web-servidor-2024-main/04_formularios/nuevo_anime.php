<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Anime</title>
    <?php   
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>

</head>
<body>
    <form method="post" action="nuevo_anime.php">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" maxlength="80" required><br>

        <label for="nombre_estudio">Nombre del Estudio:</label>
        <select id="nombre_estudio" name="nombre_estudio" required>
            <option value="">Seleccione un estudio</option>
            <?php
            $estudios = ["Estudio Ghibli", "Madhouse", "Bones", "Toei Animation", "Sunrise"];
            foreach ($estudios as $estudio) {
                echo "<option value=\"$estudio\">$estudio</option>";
            }
            ?>
        </select><br>

        <label for="anno_estreno">Año de Estreno:</label>
        <input type="text" id="anno_estreno" name="anno_estreno"><br>

        <label for="num_temporadas">Número de Temporadas:</label>
        <input type="text" id="num_temporadas" name="num_temporadas" required><br>

        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error = '';

        $tmp_titulo = trim($_POST["titulo"]);
        $tmp_nombre_estudio = $_POST["nombre_estudio"];
        $tmp_anno_estreno = trim($_POST["anno_estreno"]);
        $tmp_num_temporadas = trim($_POST["num_temporadas"]);

        // Validación del título
        if (empty($tmp_titulo)) {
            $error .= "El título es obligatorio.<br>";
        } elseif (strlen($tmp_titulo) > 80) {
            $error .= "El título no puede tener más de 80 caracteres.<br>";
        } else {
            $titulo = $tmp_titulo;
        }

        // Validación del nombre del estudio
        $estudios = ["Estudio Ghibli", "Madhouse", "Bones", "Toei Animation", "Sunrise"];
        if (empty($tmp_nombre_estudio) || !in_array($tmp_nombre_estudio, $estudios)) {
            $error .= "El nombre del estudio es obligatorio y debe ser válido.<br>";
        } else {
            $nombre_estudio = $tmp_nombre_estudio;
        }

        // Validación del año de estreno
        if (!empty($tmp_anno_estreno)) {
            if (!filter_var($tmp_anno_estreno, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1960, "max_range" => date("Y") + 5]])) {
                $error .= "El año de estreno debe ser un número entre 1960 y " . (date("Y") + 5) . ".<br>";
            } else {
                $anno_estreno = $tmp_anno_estreno;
            }
        }

        // Validación del número de temporadas
        if (empty($tmp_num_temporadas)) {
            $error .= "El número de temporadas es obligatorio.<br>";
        } elseif (!filter_var($tmp_num_temporadas, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1, "max_range" => 99]])) {
            $error .= "El número de temporadas debe ser un número entre 1 y 99.<br>";
        } else {
            $num_temporadas = $tmp_num_temporadas;
        }

        // Si no hay errores, procesar los datos (por ejemplo, guardarlos en una base de datos)
        if (empty($error)) {
            echo "Formulario enviado correctamente.";
            // Aquí puedes añadir el código para procesar los datos
        } else {
            echo $error;
        }
    }
    ?>
</body>
</html>