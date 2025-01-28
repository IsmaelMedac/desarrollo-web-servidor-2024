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
    $_nombre = $_GET["producto"];
    $sql = "SELECT * FROM productos WHERE nombre_producto = '$_nombre'";
    $resultado = $_conexion -> query($sql);
    $producto = $resultado -> fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        if(!isset($_POST["categoria"])) $categoria = "a";
        else $categoria = $_POST["categoria"];
        $descripcion = $_POST["descripcion"];
        $stock = $_POST["stock"];
        $correcto_nombre = false;
        $correcto_precio = false;
        $correcto_categoria = false;
        $correcto_descripcion = false;
                $correcto_stock = false;
                if(strlen($nombre) < 2 || strlen($nombre) > 255){
                    echo "<h2>El producto tiene que tener por lo menos 2 caracteres<h2>";
                } else {
                    $patron = "/^[a-zA-Z0-9 ]+$/";
                    if(!preg_match($patron, $nombre)) {
                        echo "<h2>El producto debe contenter letras y/o numeros y/o espacios en blanco</h2>";
                    } else{
                        $correcto_nombre=true;
                    }
                }
                if($precio < 0 || $precio >= 1000000){
                    echo "<h2>Precio invalido<h2>";
                } else {
                    $correcto_precio=true;
                }
                $sql = "SELECT * FROM categorias WHERE categoria='$categoria'";
                $resultado = $_conexion -> query($sql);
                if ($resultado -> num_rows == 0) {
                    echo "<h2>La categoria no existe</h2>";
                } else {
                    $correcto_categoria = true;
                }
                
                if(strlen($descripcion) > 255){
                    echo "<h2>La descripcion no puede superar los 255 caracteres<h2>";
                } else {
                    $correcto_descripcion=true;
                }
                if($stock < 0 || $stock >= 1000){
                    echo "<h2>Stock invalido<h2>";
                } else {
                    $correcto_stock=true;
                }
                if ($correcto_nombre && $correcto_precio && $correcto_categoria && $correcto_descripcion && $correcto_stock) {
                    if (!empty($_FILES["imagen"]["tmp_name"])) {
                        $direccion_temporal = $_FILES["imagen"]["tmp_name"];
                        $nombre_imagen = $_FILES["imagen"]["name"];
                        $imagen = $nombre_imagen;
                        move_uploaded_file($direccion_temporal, "../Imagenes/$imagen");
                        $imagen="../Imagenes/".$imagen;
                    }
                    else {
                        $imagen=$producto["imagen"];
                    }
                    $sql = "SELECT * FROM productos WHERE nombre_producto = '$nombre'";
                    $resultado = $_conexion -> query($sql);
                    $sql = "SELECT nombre_producto FROM productos WHERE nombre_producto = '$producto[nombre_producto]'";
                    $resultado2 = $_conexion -> query($sql);
                    $nombre_antiguo = $resultado2 -> fetch_assoc();
                    if ($nombre_antiguo == $nombre && $resultado -> num_rows !=0) {
                        echo "<h2>El producto ya existe</h2>";
                    } else {
                        $nombre_antiguo = implode(", ", $nombre_antiguo);
                        $sql = "UPDATE productos 
                            SET nombre_producto = '$nombre', 
                                precio = '$precio', 
                                categoria = '$categoria', 
                                descripcion = '$descripcion', 
                                stock = '$stock', 
                                imagen = '$imagen' 
                            WHERE nombre_producto = '$nombre_antiguo'";
                        $_conexion -> query($sql);
                    }
                }
            }
    ?>

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data"> <!-- enctype, tipo de encriptación para enviar archivos por HTTP/HTTPS --> 
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" name="nombre" type="text" value="<?php echo $producto["nombre_producto"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" name="precio" type="text" value="<?php echo $producto["precio"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Categoria</label>
                <select name="categoria">
                    <option value="gilipollas" selected disabled hidden>---CATEGORIA---</option>
                    <?php
                        $sql = "SELECT * FROM categorias";
                        $resultado = $_conexion -> query($sql);
                        while($fila = $resultado -> fetch_assoc()){
                            echo "<option value='$fila[categoria]'>$fila[categoria]</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripcion</label>
                <input class="form-control" name="descripcion" type="textarea" value="<?php echo $producto["descripcion"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input class="form-control" name="stock" type="number" value="<?php echo $producto["stock"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" name="imagen" type="file">
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Editar">
                <a class="btn btn-secondary" href="./index.php">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>