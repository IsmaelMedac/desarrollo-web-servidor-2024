<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--
    Crear un formulario que reciba dos valores: el nombre y la edad de una persona
    si la persona tiene:

    <18 años, se mostrará "X es menor de edad" (x es el nombre)
    >= 18 && < 65, se mostrará "X es mayor de edad"
    >= 65, se mostrará "X se ha jubilado"

    Hacer la lógica con la estructura match
-->
    <form action="" method="post">

    <input type="text" name="nombre"><br><br>
    <input type="text" name="edad"><br><br>
    <input type="submit" value="comprobar"><br><br>

    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre = $_POST["nombre"];
            $edad = $_POST["edad"];

            $res = match (true) {
                $edad < 18 => ""
                 => 
            }
        }
        
    ?>

    <!--
        CREAR CON NUMEROS ALEATORIOS UN ARRAY CON 10 ENTEROS DEL 1 AL 50
        MOSTRAR DICHOS NUMEROS DE LA FORMA QUE MAS NOS GUSTE
        CREAR UNN FORMULARIO DONDE SE INTENTE INTRODUCIR EL MAXIMO VALOR
        Y SE COMPRUEBE SI HAS ACERTADO

    -->
</body>
</html>