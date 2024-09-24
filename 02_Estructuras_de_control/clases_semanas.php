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
    ?>
</body>
</html>