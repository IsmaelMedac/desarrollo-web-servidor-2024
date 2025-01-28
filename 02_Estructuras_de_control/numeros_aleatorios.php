<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $n = rand(1,3);

    switch($n){
        case 1:
            echo "<p>El numero aleatorio es $n</p>";
            break;
        case 2:
            echo "<p>El numero aleatorio es $n</p>";
            break;
        default:
            echo "<p>El numero aleatorio es $n</p>";
            break;
    }

    /*COMPROBAR CON UN SWITCH SI UN NUMERO ES PAR O IMPAR */

    $n = rand(1,10);
    $caja = $n % 2;
    switch ($caja) {
        case 0:
            echo "<p>El numero $n es par</p>";
            break;
        
        case 1:
            echo "<p>El numero $n es impar</p>";
            break;
    }
    ?>
</body>
</html>