<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--
Comprobar si dado unos numeros por formulario, comprobar si la suma entre los dos primeros numeros, es divisible entre cero o da cero para saber si es multiplo del numero introducido. Perdon por explicarme mal
-->

<form action="" method="post">
    <label for="numero1">Número 1</label>
    <input type="number" name="numero1" placeholder="Introduce un número"> 
    <br> <br>
    <label for="numero2">Número 2</label>
    <input type="number" name="numero2" placeholder="Introduce un número"> 
    <br> <br>
    <label for="numero3">Número 3</label>
    <input type="number" name="numero3" placeholder="Introduce un número"> 
    <br> <br>
    <input type="submit" value="Comprobar si es multiplo">

</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $numero1 = (int) $_POST["numero1"];
    $numero2 = (int) $_POST["numero2"];
    $numero3 = (int) $_POST["numero3"];

    $suma = $numero1 + $numero2;

    if($suma % $numero3 == 0 || $suma == 0){
        echo "La suma de los dos primeros números es múltiplo de $numero3";
    }else{
        echo "La suma de los dos primeros números no es múltiplo de $numero3";
    }
}
?>
</body>
</html>