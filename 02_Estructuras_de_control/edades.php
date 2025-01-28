<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $edad = rand (-10,140);

    /*
    CON IF Y CON MATCH:
    - Si la persona tiene entre 0 y 4 años, es un BEBÉ
    - Si la persona tiene entre 5 y 17 años, es un MENOR DE EDAD
    - Si la persona tiene entre 18 Y 65 años, es un ADULTO
    - Si la persona tiene entre 66 y 120 años, es un JUBILADO
    - Si la edad está fuera de rango, es ERROR.
    */

    /*
    if($edad >= 0 && $edad <= 4){
        echo "<p>Es un bebé</p>";
    } else if($edad >=5 && $edad <= 17){
        echo "<p>Es un menor de edad</p>";
    } else if($edad >=18 && $edad <= 65){
        echo "<p>Es un Adulto</p>";
    } else if($edad >=66 && $edad <= 120){
        echo "<p>Es un Jubilado</p>";
    } else {
        echo "<p>ERROR, edad inválida</p>";
    }
    */

    if($edad >= 0 && $edad <= 4) echo "<p>Es un bebé</p>";
    else if($edad >=5 && $edad <= 17) echo "<p>Es un menor de edad</p>";
    else if($edad >=18 && $edad <= 65) echo "<p>Es un Adulto</p>";
    else if($edad >=66 && $edad <= 120)echo "<p>Es un Jubilado</p>";
    else echo "<p>ERROR, edad inválida</p>";


    $resultado = match (true) {
        $edad >= 0 && $edad <= 4 => "<p>Es un bebé</p>",
        $edad >= 5 && $edad <= 17 => "<p>Es menor de edad</p>",
        $edad >= 18 && $edad <= 65 => "<p>Es un adulto</p>",
        $edad >= 66 && $edad <= 120 => "<p>Es un Jubilado</p>",
        default => "<p>ERROR</p>"
    };

    echo $resultado;


    ?>
</body>
</html>