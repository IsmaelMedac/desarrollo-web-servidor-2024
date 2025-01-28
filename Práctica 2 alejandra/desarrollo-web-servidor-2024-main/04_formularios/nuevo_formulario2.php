<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Equipo</title>
    <?php   
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <form method="post" action="nuevo_formulario2.php">
        <label for="equipo">Equipo:</label>
        <input type="text" id="equipo" name="equipo" required><br>

        <label for="iniciales">Iniciales:</label>
        <input type="text" id="iniciales" name="iniciales" required><br>

        <label for="liga">Liga:</label>
        <select id="liga" name="liga" required>
            <option value="">Seleccione una liga</option>
            <option value="Liga EA Sports">Liga EA Sports</option>
            <option value="Liga HyperMotion">Liga HyperMotion</option>
            <option value="Primera RFEF">Primera RFEF</option>
        </select><br>

        <label for="num_jugadores">Número de jugadores:</label>
        <input type="number" id="num_jugadores" name="num_jugadores" required><br>

        <label for="fecha_fundacion">Fecha de fundación:</label>
        <input type="date" id="fecha_fundacion" name="fecha_fundacion" required><br>

        <input type="submit" value="Registrar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error = '';

        $tmp_equipo = isset($_POST["equipo"]) ? trim($_POST["equipo"]) : '';
        $tmp_iniciales = isset($_POST["iniciales"]) ? trim($_POST["iniciales"]) : '';
        $tmp_liga = isset($_POST["liga"]) ? $_POST["liga"] : '';
        $tmp_num_jugadores = isset($_POST["num_jugadores"]) ? trim($_POST["num_jugadores"]) : '';
        $tmp_fecha_fundacion = isset($_POST["fecha_fundacion"]) ? trim($_POST["fecha_fundacion"]) : '';

        // Validación del equipo
        if (!isset($_POST["equipo"]) || strlen($tmp_equipo) < 3 || strlen($tmp_equipo) > 20 || !preg_match('/^[a-zA-Z\s.]+$/', $tmp_equipo)) {
            $error .= "El nombre del equipo debe tener entre 3 y 20 caracteres y solo puede contener letras, espacios y puntos.<br>";
        } else {
            $equipo = $tmp_equipo;
        }

        // Validación de las iniciales
        if (!isset($_POST["iniciales"]) || strlen($tmp_iniciales) != 3 || !preg_match('/^[A-Za-z]{3}$/', $tmp_iniciales)) {
            $error .= "Las iniciales deben tener exactamente 3 caracteres y solo pueden contener letras.<br>";
        } else {
            $iniciales = $tmp_iniciales;
        }

        // Validación de la liga
        $ligas_validas = ["Liga EA Sports", "Liga HyperMotion", "Primera RFEF"];
        if (!isset($_POST["liga"]) || !in_array($tmp_liga, $ligas_validas)) {
            $error .= "La liga es obligatoria y debe ser válida.<br>";
        } else {
            $liga = $tmp_liga;
        }

        // Validación del número de jugadores
        if (!isset($_POST["num_jugadores"]) || !filter_var($tmp_num_jugadores, FILTER_VALIDATE_INT, ["options" => ["min_range" => 26, "max_range" => 32]])) {
            $error .= "El número de jugadores debe ser un número entre 26 y 32.<br>";
        } else {
            $num_jugadores = $tmp_num_jugadores;
        }

        // Validación de la fecha de fundación
        $fecha_fundacion = DateTime::createFromFormat('Y-m-d', $tmp_fecha_fundacion);
        $fecha_actual = new DateTime();
        $fecha_minima = new DateTime('1889-12-18');

        if (!isset($_POST["fecha_fundacion"]) || $fecha_fundacion === false || $fecha_fundacion < $fecha_minima || $fecha_fundacion > $fecha_actual) {
            $error .= "La fecha de fundación debe ser entre 18 de diciembre de 1889 y hoy.<br>";
        } else {
            $fecha_fundacion = $tmp_fecha_fundacion;
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