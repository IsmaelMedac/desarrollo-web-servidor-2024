<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        
        require('../Util/conexion.php'); // Asegurar que la ruta sea correcta
        session_start();
        if (!isset($_SESSION["usuario"])) {
            header("location: ../Usuario/iniciar_sesion.php");
            exit;
        }
    ?>
    <style>
        .table-primary {
            --bs-table-bg: #007bff;
            color: white;
        }

        img{
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Listado de Productos</h1>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $producto = $_POST["producto"];
                $sql = "DELETE FROM productos WHERE nombre_producto = '$producto'";
                $_conexion -> query($sql);
            }

            // Consulta para obtener todos los productos
            $sql = "SELECT * FROM productos";
            $resultado = $_conexion->query($sql);
        ?>
        <a class="btn btn-secondary" href="nuevo_producto.php">Nuevo Producto</a><br><br>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th> 
                    <th>Categoria</th>
                    <th>Descripción</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th></th> <!-- añadir mas encabezado azul a la tabla -->
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    while($fila = $resultado -> fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $fila["nombre_producto"] ?></td>
                            <td><?php echo $fila["precio"] ?></td>
                            <td><?php echo $fila["categoria"] ?></td>
                            <td><?php echo $fila["descripcion"] ?></td>
                            <td><?php echo $fila["stock"] ?></td>
                            <td><img src="<?php echo $fila["imagen"] ?>"></td>
                            <td><a class="btn btn-secondary" href="editar_producto.php?producto=<?php echo $fila["nombre_producto"] ?>">Editar</a></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="producto" value="<?php echo $fila["nombre_producto"] ?>">
                                    <input class="btn btn-danger" type="submit" value="Eliminar">
                                </form>
                            </td>
                        </tr>
                    <?php }
                ?>
            </tbody>
        </table>
        <a href='../index.php' class="btn btn-secondary">Inicio</a>
    </div>
</body>
</html>