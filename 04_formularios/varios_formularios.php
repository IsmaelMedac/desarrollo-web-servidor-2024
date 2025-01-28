<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1);
        require('../05_Funciones/edades.php');
    ?>
</head>
<body>
    

<form action="" method="post">

    <input type="text" name="nombre"><br><br>
    <input type="text" name="edad"><br><br>
    <input type="hidden" name="action" value ="formulario_edad">
    <input type="submit" value="comprobar"><br><br>

</form>


<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){


    comprobarEdad($nombre, $edad);
}
?>
<form action ="" method="post">
        <input type="text" name="base"><br><br>
        <input type="text" name="exponente"><br><br>
        <input type="hidden" name="action" value ="formulario_potencia">
        <input type="submit" value="Calcular">
</form>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["action"] == "formulario_potencia"){
            $base = $_POST["base"];
            $exponente = $_POST["exponente"];

            comprobarPotencia($base, $exponente);
            
        }
        /*
        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];
        $base = $_POST["base"];
        $exponente = $_POST["exponente"];
        */
    }

?>
</body>
</html>