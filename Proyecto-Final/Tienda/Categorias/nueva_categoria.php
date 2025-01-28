<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXhW0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        
        require('../Util/conexion.php');
        session_start();
        if (!isset($_SESSION["usuario"])) {
            header("location: ../Usuario/iniciar_sesion.php");
            exit;
        }
    ?>
</head>
<body>
    <div class="container">
        <h1>Agregar Nueva Categoría</h1>
        
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre_categoria = $_POST["nombre_categoria"];
                $descripcion_categoria = $_POST["descripcion_categoria"];
                $correcto_categoria=false;
                $correcto_descripcion=false;
                
                if($nombre_categoria == ''){
                    echo "<h2> El nombre es obligatorio</h2>";
                } else {
                    if(strlen($nombre_categoria) < 2 || strlen($nombre_categoria) > 255){
                        echo "<h2>La categoria tiene que tener por lo menos 2 caracteres<h2>";
                    } else {
                        $patron = "/^[a-zA-Z ]+$/";
                        if(!preg_match($patron, $nombre_categoria)) {
                            echo "<h2>El nombre de la categoria debe contenter letras y/o espacios en blanco</h2>";
                        } else{
                            $correcto_categoria=true;
                        }
                    }
                }

                if(strlen($nombre_categoria) > 255){
                    echo "<h2>La descripcion no puede superar los 255 caracteres<h2>";
                } else {
                    $correcto_descripcion=true;
                }
                if ($correcto_categoria && $correcto_descripcion) {
                    $sql = "SELECT * FROM categorias WHERE categoria = '$nombre_categoria'";
                    $resultado = $_conexion -> query($sql);
                    if ($resultado -> num_rows != 0) {
                        echo "<h2>La categoria ya existe</h2>";
                    } else {
                        $sql = "INSERT INTO categorias VALUES ('$nombre_categoria', '$descripcion_categoria')";
                        $_conexion -> query($sql);
                    }
                }
            }
        ?>
        
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Nombre de la Categoría</label>
                <input class="form-control" name="nombre_categoria" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción de la Categoría</label>
                <textarea class="form-control" name="descripcion_categoria"></textarea>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Agregar">
                <a class="btn btn-secondary" href="./index.php">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>