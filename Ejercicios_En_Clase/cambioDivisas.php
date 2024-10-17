<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="text">introduce una divisa a cambiar</label>
        <input type = "Number" name = "cantidad"> <br> <br>
        <label for="text">de</label>
        <select name="opciones_convertir">
            <option value="Y">Yenes</option>
            <option value="$">Dolares</option>
            <option value="€">Euros</option>
        </select> 

        <label for="text">a</label>
        <select name="opciones_convertir">
            <option value="Y">Yenes</option>
            <option value="$">Dolares</option>
            <option value="€">Euros</option>
        </select> 
        <input type="submit" value="convertir">
    </form> 

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            define("$EUROS");

            $cantidadOriginal = $_POST["cantidad"];


        }
    ?>

</body>
</html>