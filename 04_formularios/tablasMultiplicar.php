<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--
Muestrame separadas, todas las tablas de multiplicar desde el 1 hasta el 10, con letra blanca y fondos de estas de distintos colores, mostradas del 1 al 5 en paralelo y el resto debajo de estas.
-->

<?php

function getRandomColor() {
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}

for($i = 1; $i <= 5; $i++){
    echo "<table border='1' style='display:inline-block; margin-right: 10px; background-color: " . getRandomColor() . ";'>";
    echo "<tr style='background-color: #000; color: white;'>";
    echo "<th>Tabla del $i</th>";
    echo "</tr>";
    for($j = 1; $j <= 10; $j++){
        echo "<tr>";
        echo "<td>$i x $j = " . $i * $j . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

echo "<br><br>";

for($i = 6; $i <= 10; $i++){
    echo "<table border='1' style='display:inline-block; margin-right: 10px; background-color: " . getRandomColor() . ";'>";
    echo "<tr style='background-color: #000; color: white;'>";
    echo "<th>Tabla del $i</th>";
    echo "</tr>";
    for($j = 1; $j <= 10; $j++){
        echo "<tr>";
        echo "<td>$i x $j = " . $i * $j . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>



</body>
</html>