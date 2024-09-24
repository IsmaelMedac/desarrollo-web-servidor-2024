<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $dia = date("l");
    echo "<h1>Hoy es $dia</h1>";


    /*HACER UN SWITCH QUE MUESTRE POR PANTALLA SI HOY HAY CLASE
    DE WEB SERVIDOR */

    /* NO HACER SI ES POSIBLE */

    /*
    switch($dia){
        case "monday":
            echo "<p>Hoy no hay clase de web servidor</p>";
            break;
        case "tuesday":
            echo "<p>Hoy hay clase de web servidor</p>";
            break;
        case "wednesday":
            echo "<p>Hoy hay clase de web servidor</p>";
            break;
        case "thursday":
            echo "<p>Hoy hay clase de web servidor</p>";
            break;
        case "friday":
            echo "<p>Hoy no hay clase de web servidor</p>";
            break;
        case "saturday":
            echo "<p>Hoy no hay clase de web servidor</p>";
            break;
        case "sunday":
            echo "<p>Hoy no hay clase de web servidor</p>";
            break;  
    }
    */
    /*
    switch($dia){
        case "Tuesday":
        case "Wednesday":
        case "Friday":
            echo "<p>Hoy Si hay clase de web servidor</p>";
            break;
        default:
            echo "<p>Hoy no hay clase de web servidor</p>";
            break; 
    }
    */
    /* CREAR UN SWITCH QUE SEGUN EL DÍA EN EL QUE ESTEMOS
    ALMACENE EN UNA VARIABLE EL DIA EN ESPAÑOL Y LUEGO REESCRIBIR
    EL SWITCH DE LA ASIGNATURA CON LOS DÍAS EN ESPAÑOL*/
    /*
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

    switch($dia){
        case "Tuesday":
        case "Wednesday":
        case "Friday":
            echo "<p>Hoy Si hay clase de web servidor</p>";
            break;
        default:
            echo "<p>Hoy no hay clase de web servidor</p>";
            break; 
    }
    */
    /*
    $resultado = match ($dia) {
        "Tuesday" => "<p>Hoy es $dia si tenemos clase de web servidor</p>",
        "Wednesday" =>"<p>Hoy es $dia si tenemos clase de web servidor</p>",
        "Friday" => "<p>Hoy es $dia si tenemos clase de web servidor</p>",
        default => "<p>Hoy es $dia no tenemos clase de web servidor</p>"
    };
    */

    $resultado = match ($dia) {
        "Tuesday",
        "Wednesday",
        "Thursday" => "<p>Hoy es $dia si tenemos clase de web servidor</p>",
        default => "<p>Hoy es $dia no tenemos clase de web servidor</p>"
    };
    echo $resultado;

    $n = rand(1,10);
    $resto = $n % 2;

    /*
    $resultado = match($resto){
        0 => "El numero es par"
        1 => "El numero es impar"
    }
    */
    ?>
</body>
</html>