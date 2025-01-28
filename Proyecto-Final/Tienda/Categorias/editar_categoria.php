<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../Util/conexion.php');
        
        session_start();
        if (!isset($_SESSION["usuario"])) {
            header("location: ../Usuario/iniciar_sesion.php");
            exit;
        }
    ?>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $categoria = $_POST["categoria"];
        $descripcion = $_POST["descripcion"];
        if (strlen($descripcion)<=255) {
            $sql = "UPDATE categorias SET descripcion = '$descripcion' WHERE categoria = '$categoria'";
            $_conexion -> query($sql);
            header("location: ./index.php");
            exit;
        } else {
            echo "<h2>La descripción como maximo puede tener 255 caracteres.</h2>";
        }
    }

    $_categoria = $_GET["categoria"];
    $sql = "SELECT * FROM categorias WHERE categoria = '$_categoria'";
    $resultado = $_conexion -> query($sql);
    $categoria = $resultado -> fetch_assoc();
    ?>

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data"> <!-- enctype, tipo de encriptación para enviar archivos por HTTP/HTTPS --> 
            <div class="mb-3">
                <label class="form-label">Categoria</label>
                <input class="form-control" type="text" disabled value="<?php echo $categoria["categoria"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <input class="form-control" name="descripcion" type="text" value="<?php echo $categoria["descripcion"] ?>">
            </div>
            <div class="mb-3">
                <input type="hidden" name="categoria" value ="<?php echo $categoria["categoria"] ?>">
                <input class="btn btn-primary" type="submit" value="Editar">
                <a class="btn btn-secondary" href="./index.php">Volver</a>
            </div>
            <?php 
            if (isset($error) && $error === 0) { ?>
            <div class="alert alert-success" role="alert">
                La categoría se ha modificado correctamente.
            </div>
            <?php }
            ?>
        </form>
    </div>
</body>
</html>