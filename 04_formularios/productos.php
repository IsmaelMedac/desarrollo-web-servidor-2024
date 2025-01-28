<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $productos = [
        ["Nintendo Switch", 300],
        ["Playstation 5 slim", 450],
        ["Playstation 5 pro", 800],
        ["Xbox series S", 300],
        ["Xbox Series X", 400]
    ];

    // Añadir el array una tercera columna que será el stock, y se generará con una rand entre 0 y 5
    foreach ($productos as $producto) {
        $producto[] = rand(0, 5);
    }
    //unset($producto); // break the reference with the last element

    // Mostrar en una tabla cada producto junto a su precio y stock
    echo "<table border='1'>";
    echo "<tr><th>Producto</th><th>Precio</th><th>Stock</th></tr>";
    foreach ($productos as $producto) {
        echo "<tr>";
        echo "<td>{$producto[0]}</td>";
        echo "<td>{$producto[1]}</td>";
        echo "<td>{$producto[2]}</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Crear un formulario donde se introduzca el nombre de un producto
    ?>
    <form method="post">
        <label for="producto">Nombre del producto:</label>
        <input type="text" id="producto" name="producto">
        <input type="submit" value="Buscar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombreProducto = $_POST['producto'];
        $encontrado = false;

        foreach ($productos as $producto) {
            if (strcasecmp($producto[0], $nombreProducto) == 0) {
                $encontrado = true;
                if ($producto[2] > 0) {
                    echo "<p>El producto '{$producto[0]}' está disponible. Precio: \${$producto[1]}</p>";
                } else {
                    echo "<p>El producto '{$producto[0]}' está agotado.</p>";
                }
                break;
            }
        }

        if (!$encontrado) {
            echo "<p>El producto '{$nombreProducto}' no se encuentra en la lista.</p>";
        }
    }
    ?>
    <table>
        <caption>Productos</caption>
        <thead>
            <tr>
                <th>Nombre producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($productos as $producto){
                list($nombre_producto, $precio, $cantidad) = $producto; ?>
                    <tr>
                        <td><?php echo $nombre_producto ?></td>
                        <td><?php echo $precio ?></td>
                        <td><?php echo $cantidad ?></td>
                    </tr>
            <?php
            }
            ?>
     </tbdoy>
     </table>
     <br><br>
     <form action = "" method = "post">
                <label for="producto"> Nombre del producto</label>
                <input type="text" name="producto" id = "producto">
                <input type="submit" value ="Comprobar stock">
            </form>
        
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){ //$_SERVER ARRAY ASOCIATIVO
            $producto  = $_POST ["producto"];

            $i = 0;
            $fila_producto = null;
            $encontrado = false;
            while($i < count($productos) && !$encontrado){
                if($productos[$i][0] == $producto){
                    $encontrado = true;
                    $fila_producto = $i;
                }
                $i++;
            }
            if($encontrado && $producto[$fila_producto][2] > 0){
                echo "<p>Tenemos " . $productos[$fila_producto][2] . " unidades de " .
                    $producto . " en stock";
            }else if($encontrado && $productos[$fila_producto][2] == 0){
                echo "<p>No tenemos stock del producto $producto </p>";
            } else {
                echo "<p>El producto $producto no existe </p>";
            }
        }
        ?>


</body>
</html>