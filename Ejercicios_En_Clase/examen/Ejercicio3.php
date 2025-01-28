<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
<form action = "" method = "post">
        <label for="nombre"> Introduce un numero</label>
        <input type="text" name="numero" id = "numero">
        <select name="numero">
            <option value="Par">Par</option>
            <option value="Primo">Primo</option>
        </select><br><br>
        <input type="submit" value ="Comprobar número">
</form>



</body>
</html>