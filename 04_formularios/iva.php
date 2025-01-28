<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Iva</title>
    <?php
    // Activamos los errores de PHP
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    // Declaración de las constantes
    define("GENERAL", 1.21);
    define("REDUCIDO", 1.1);
    define("SUPERREDUCIDO", 1.04);
    ?>
</head>
<body>
<!-- 4% SUPER REDUCIDO x1,04
    10% REDUCIDO x1,10
    21% GENERAL x1,21
10EUROS sin impuestos, iva general
pvp = 10 + 2,1 = 12,1    
    -->

    <form action="" method="post">
    <label for = "precio">Precio</label>
    <input type = "number" name = "precio" id = "precio"> <br> <br>
    <select name = "iva" id = "iva">
        <option value="general">General</option>
        <option value="reducido">reducido</option>
        <option value="superredudido">Superreducido</option>
    </select> <br><br>
    <input type="submit" value="Calcular PVP">
</form>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $precio = $_POST["precio"];
        $iva = $_POST["iva"];

        $pvp = match($iva){
            "general" => $precio * GENERAL,
            "reducido" => $precio * REDUCIDO,
            "superreducido" => $precio * SUPERREDUCIDO
        };
    }
?>


<form action="" method="get">
    <label for = "precio">Precio</label>
    <input type = "number" name = "precio" id = "precio"> <br> <br>
    <select name = "iva" id = "iva">
        <option value="general">General</option>
        <option value="reducido">reducido</option>
        <option value="superredudido">Superreducido</option>
    </select> <br><br>
    <input type="submit" value="Calcular PVP">
</form>

<?php
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $precio = $_GET["precio"];
        $iva = $_GET["iva"];

        $pvp = match($iva){
            "general" => $precio * GENERAL,
            "reducido" => $precio * REDUCIDO,
            "superreducido" => $precio * SUPERREDUCIDO
        };
    }
?>
</body>
</html>