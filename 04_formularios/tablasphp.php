<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--
Muestrame una tabla, dado un numero introducido como moneda/dinero para mostrar su equivalente a otra moneda, como es dolares, yenes o euros. En caso de marcar la misma moneda, poner el mismo valor introducido
-->

<form action="" method="post">
    <label for="numero">Introduce una cantidad de dinero</label>
    <input type="number" name="numero" placeholder="Introduce un número"> 
    <br> <br>
    <label for="moneda">Selecciona una moneda</label>
    <select name="moneda">
        <option value="€">Euro</option>
        <option value="$">Dolar</option>
        <option value="Y">Yenes</option>
    </select>
    <input type="submit" value="Convertir">

</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $numero = (float) $_POST["numero"];
    $moneda = $_POST["moneda"];

    // Definir constantes para los valores de conversión
    define("EURO_TO_DOLLAR", 1.18);
    define("EURO_TO_YEN", 129.852);
    define("DOLLAR_TO_YEN", EURO_TO_YEN / EURO_TO_DOLLAR);

    echo "<table border=5>";
    if($moneda == "€"){
        echo "<tr>";
        echo "<td>$numero</td>";
        echo "<td>Euro</td>";
        echo "<td>=</td>";
        echo "<td>$numero</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>$numero</td>";
        echo "<td>Dolar</td>";
        echo "<td>=</td>";
        echo "<td>" . $numero * EURO_TO_DOLLAR . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>$numero</td>";
        echo "<td>Yenes</td>";
        echo "<td>=</td>";
        echo "<td>" . $numero * EURO_TO_YEN . "</td>";
        echo "</tr>";
    } elseif($moneda == "$"){
        echo "<tr>";
        echo "<td>$numero</td>";
        echo "<td>Euro</td>";
        echo "<td>=</td>";
        echo "<td>" . $numero / EURO_TO_DOLLAR . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>$numero</td>";
        echo "<td>Dolar</td>";
        echo "<td>=</td>";
        echo "<td>$numero</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>$numero</td>";
        echo "<td>Yenes</td>";
        echo "<td>=</td>";
        echo "<td>" . $numero * DOLLAR_TO_YEN . "</td>";
        echo "</tr>";
    } elseif($moneda == "Y"){
        echo "<tr>";
        echo "<td>$numero</td>";
        echo "<td>Euro</td>";
        echo "<td>=</td>";
        echo "<td>" . $numero / EURO_TO_YEN . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>$numero</td>";
        echo "<td>Dolar</td>";
        echo "<td>=</td>";
        echo "<td>" . $numero / DOLLAR_TO_YEN . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>$numero</td>";
        echo "<td>Yenes</td>";
        echo "<td>=</td>";
        echo "<td>$numero</td>";
        echo "</tr>";
    }
    echo "</table>";?>
<?php
}
?>

</body>
</html>