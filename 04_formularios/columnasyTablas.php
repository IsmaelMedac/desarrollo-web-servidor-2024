<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<!--
Crear un array al que pueda ordenar en ascedente y descendente, añadir columnas o filas a una tabla y mostrar la tabla resultante
-->

<?php

$productos = [
    ["Nintendo Switch", 300],
    ["Playstation 5 slim", 450],
    ["Playstation 5 pro", 800],
    ["Xbox series S", 300],
    ["Xbox Series X", 400]
];

// Añadir el array una tercera columna que será el stock, y se generará con una rand entre 0 y 5
foreach ($productos as &$producto) {
    $producto[] = rand(0, 5);
}

// Ordenar el array por precio ascendente
array_multisort(array_column($productos, 1), SORT_ASC, $productos);

// Mostrar la tabla resultante
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

// Ordenar el array por precio descendente
array_multisort(array_column($productos, 1), SORT_DESC, $productos);

// Mostrar la tabla resultante
echo "<br><table border='1'>";
echo "<tr><th>Producto</th><th>Precio</th><th>Stock</th></tr>";
foreach ($productos as $producto) {
    echo "<tr>";
    echo "<td>{$producto[0]}</td>";
    echo "<td>{$producto[1]}</td>";
    echo "<td>{$producto[2]}</td>";
    echo "</tr>";
}
echo "</table>";

?>
</body>
</html>