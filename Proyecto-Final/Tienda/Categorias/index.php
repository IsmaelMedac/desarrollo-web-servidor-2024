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
    </style>
</head>
<body>
    <div class="container">
        <h1>Listado de Categorias</h1>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $categoria = $_POST["categoria"];

                $sql = "SELECT * FROM productos WHERE categoria = '$categoria'";
                $resultado = $_conexion -> query($sql);
                if ($resultado -> num_rows != 0) {
                    $fila = [];
                    $con_stock = [];
                    while ($fila = $resultado -> fetch_assoc()) {
                        if ($fila["stock"] != 0)
                            array_push($con_stock, $fila);
                    }
                }
                if (!empty($con_stock)) { 
                    echo "<div class='alert alert-warning'>La categoría tiene productos con stock y no se puede eliminar.</div>";
                } else {
                    $sql = "DELETE FROM productos WHERE categoria = '$categoria'";
                    $_conexion -> query($sql);
                    $sql = "DELETE FROM categorias WHERE categoria = '$categoria'";
                    $_conexion -> query($sql);
                }
            }

            // Consulta para obtener todos los productos
            $sql = "SELECT * FROM categorias";
            $resultado = $_conexion->query($sql);
        ?>
        <a class="btn btn-secondary" href="nueva_categoria.php">Nueva Categoria</a><br><br>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th></th> <!-- añadir mas encabezado azul a la tabla -->
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    while($fila = $resultado -> fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $fila["categoria"] ?></td>
                            <td><?php echo $fila["descripcion"] ?></td>
                            <td><a class="btn btn-secondary" href="editar_categoria.php?categoria=<?php echo $fila["categoria"] ?>">Editar</a></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="categoria" value="<?php echo $fila["categoria"] ?>">
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