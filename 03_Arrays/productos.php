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
    unset($producto); // break the reference with the last element

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
    
</body>
</html>