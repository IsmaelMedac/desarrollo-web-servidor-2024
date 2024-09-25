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
    $mes = date("F");
    switch($mes){
        case "January":
            $dia = "Lunes";
            echo "<p>Hoy es $dia</p>";
            break;
        case "February":
            $dia = "Martes";
            echo "<p>Hoy es $dia</p>";
            break;
        case "March":
            $dia = "Miercoles";
            echo "<p>Hoy es $dia</p>";
            break;
        case "April":
            $dia = "Jueves";
            echo "<p>Hoy es $dia</p>";
            break;
        case "May":
            $dia = "Viernes";
            echo "<p>Hoy es $dia</p>";
            break;
        case "June":
            $dia = "Sabado";
            echo "<p>Hoy es $dia</p>";
            break;
        case "Jule":
            $dia = "Domingo";
            echo "<p>Hoy es $dia</p>";
            break;
        case "August":
            
            break;
    }

    switch($dia){
        case "Monday":
            $dia = "Lunes";
            echo "<p>Hoy es $dia</p>";
            break;
        case "Tuesday":
            $dia = "Martes";
            echo "<p>Hoy es $dia</p>";
            break;
        case "Wednesday":
            $dia = "Miercoles";
            echo "<p>Hoy es $dia</p>";
            break;
        case "Thursday":
            $dia = "Jueves";
            echo "<p>Hoy es $dia</p>";
            break;
        case "Friday":
            $dia = "Viernes";
            echo "<p>Hoy es $dia</p>";
            break;
        case "Saturday":
            $dia = "Sabado";
            echo "<p>Hoy es $dia</p>";
            break;
        case "Sunday":
            $dia = "Domingo";
            echo "<p>Hoy es $dia</p>";
            break;
    }



    ?>
</body>
</html>