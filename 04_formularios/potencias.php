<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--
CREAR UN FORMULARIO QUE DECIDA DOS NUMEROS: BASE Y EXPONENTE

se mostrará el resultado de elevar la base al exponente

Ejemplos:

2 elevado a 3 = 8

-->
<form action ="" method="post">
        <input type="text" name="base"><br><br>
        <input type="text" name="exponente"><br><br>
        <input type="submit" value="Calcular">
</form>

<?php
     if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $base = (int)$_POST["base"];
        $exponente  = (int)$_POST["exponente"];

        $res = 1;
        for($i = 0; $i < $exponente; $i++){
            $res = $res * $base;
        }
        echo "<h1>El resultado de elevar $base a $exponente  es
         $res</h1>";
        /**
         * 2 elevado a 3
         * 
         * - 1º iteracion: res = 1 * 2 = 2
         * - 2º iteración: res = 2 * 2 = 4
         * - 3º iteracion: res = 4 * 2 = 8
         */
        
        
    }   
?>
</body>
</html>