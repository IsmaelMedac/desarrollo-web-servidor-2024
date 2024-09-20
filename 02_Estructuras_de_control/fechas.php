<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
</head>
<body>
    <?php
    //echo date("j");
    $dia = date ("j");
    //  $numero % 4
    if($dia % 2 == 0){
        echo "El dia $dia es par";
    } else {
        echo "El dia $dia no es par";
    }
    ?>
</body>
</html>