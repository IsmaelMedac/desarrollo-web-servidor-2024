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
    if(isset($_POST["precio"]) and isset($_GET["iva"])){ //si se ha seleccionado algo en el campo precio y campo iva
        // AQUI solo entra si se le da al boton
        // Haya o no datos
        $precio = $_GET["precio"];
        $iva = $_GET["iva"];

        if($precio == '' and $iva = ''){
            // Aqui solo entra si se le ha dado al boton
            // y ademas se han introducido datos
            $pvp = match($iva){
                "general" => $precio * GENERAL,
                "reducido" => $precio * REDUCIDO,
                "superreducido" => $precio * SUPERREDUCIDO
            };
            echo "El PVP es $pvp";
        } else {
            echo "<p>Por favor, rellena todos los datos</p>";
        }

        //var_dump($precio);
        //var_dump($iva);

        
    }
?>

</body>
</html>