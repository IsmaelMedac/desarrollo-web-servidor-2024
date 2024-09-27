<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    /*
    CALCULA LA SUMA DE TODOS LOS NUMEROS PARES, DEL 0 AL 20
    */
    $suma = 0;
    for($i = 1; $i < 20; $i++){
        if($i % 2 == 0){
            $suma += $i;
            echo "<li>$suma es multiplo de 2</li>";
        }
    }
    ?>

    <?php
    /*
    (HAY QUE INVESTIGAR)
    MUESTRA POR PANTALLA LA FECHA ACTUAL, CON EL SIGUIENTE
    FORMATO --> MIERCOLES 25 DE SEPTIEMBRE DE 2024
    */

    $dia = date("l");

    $dia_espaniol = match($dia){
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" =>  "Miercoles",
        "Thursday" =>  "Jueves",
        "Friday" =>  "Viernes",
        "Saturday" =>  "Sábado",
        "Sunday" =>  "Domingo"
    };

    //se puede usar la variable $dia para todo
    //echo "<h3>$dia_espaniol</h3>";

    $mes = date("F");

    $mes = match ($mes){
        "January" =>  "Enero",
        "February" => "Febrero",
        "March" =>  "Marzo",
        "April" => "Abril",
        "May" =>  "Mayo",
        "June" => "Junio",
        "July" => "Julio",
        "August" => "Agosto",
        "September" => "Septiembre",
        "October" => "Octubre",
        "November" => "Noviembre",
        "December" => "Diciembre"
    };

    $dia_n = date ("j"); //o la d
    $anno = date("Y");

    echo "<h3>$dia_espaniol $dia_n de $mes de $anno</h3>";

    
    ?>

    <?php

    /*
    Hacer un bucle que compruebe si un numero es primo
    //Bucle desde 2 hasta N-1, si algun resto = 0, NO ES PRIMO
    */
    $num = 5;
    $esMiPrimo = true;
    for($i = 2; $i < $num -1 && $esMiPrimo; $i++){
        if($num % $i == 0) $esMiPrimo = false;
    }
    if(!$esMiPrimo) echo "El numero " . $num . " no es primo";
        else echo "El numero " . $num . " es primo";

    ?>
    <br>
    <?php

    /* MUESTRA POR PANTALLA LOS 50 PRIMEROS NUMEROS PRIMOS */

    $num = 2;
    $contador = 0;
    echo "<ol>";
    while($contador < 50){
        $esMiPrimo = true;
        for($i = 2; $i < $num; $i++){
            if($num % $i == 0){
                $esMiPrimo = FALSE;
                break;
            }
        }
        if($esMiPrimo){
            $contador++;
            echo "<li>El numero $num es primo</li>";
        }
        $num++;
    }
    echo "</ol>";

    ?>






</body>
</html>