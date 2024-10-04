<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
<?php
    #Origen, destino, duracion(min), precio(euro)
    $autobuses = [
        ["Málaga", "Ronda", 90, 10],
        ["Churriana", "Málaga", 20, 3],
        ["Málaga", "Granada", 120, 15],
        ["Torremolinos", "Málaga", 30, 3.5]
    ];

    /*
    Ejercicio 1: Añadir dos lineas de autobus
    Ejercicio 2: Ordenar por duracion de mas duracion a menos (DESC)
    Ejercicio 3: Mostrar las lineas en una tabla
    Ejercicio 4: Insertar 3 autobuses más
    Ejercicio 5: Ordernar, primero por el origen, luego por el destino
    Ejercicio 6: Ordenar, primero por la duracion, luego por el precio
    */

    foreach ($autobuses as $autobus){
        list($origen, $destino, $duracion, $precio) = $autobus;
        echo "<p>$origen, $destino, $duracion, $precio</p>";
    }
    ?>

    <?php

        $nuevo_autobus = ["Málaga", "Sevilla", 80, 25];
        array_push($autobuses, $nuevo_autobus);

        $nuevo_autobus = ["Sevilla", "Huelva", 100, 15];
        array_push($autobuses, $nuevo_autobus);

        //$_duracion = array_column($autobuses, 2);
        //array_multisort($_duracion, SORT_DESC, $autobuses);

        $nuevo_autobus = ["Granada", "Madagascar", 999, 700];
        array_push($autobuses, $nuevo_autobus);

        $nuevo_autobus = ["Huelva", "Huesca", 350, 70];
        array_push($autobuses, $nuevo_autobus);

        $nuevo_autobus = ["Zaragoza", "Andorra", 250, 60];
        array_push($autobuses, $nuevo_autobus);
    ?>

    <table>
        <thead>
            <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Duracion</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //$_origen = array_column($autobuses, 0);
            //$_duracion = array_column($autobuses, 2);
            //array_multisort($_origen, SORT_ASC, $_duracion, SORT_ASC, $autobuses);

            //$_destino = array_column($autobuses, 1);
            //array_multisort($_origen, SORT_ASC, $_destino, SORT_DESC, $autobuses);

            $_duracion = array_column($autobuses, 2);
            $_precio = array_column($autobuses, 3);
            array_multisort($_duracion, SORT_ASC, $_precio, SORT_ASC, $autobuses);

            //unset($autobuses[1]); //va por CLAVES no por posicion unicamente

            foreach($autobuses as $autobus){
                list($origen, $destino, $duracion, $precio) = $autobus;
                echo "<tr>";
                echo "<td>$origen</td>";
                echo "<td>$destino</td>";
                echo "<td>$duracion</td>";
                echo "<td>$precio</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>