<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <label for = "numero">Numero 1</label>
    <input type = "number" name = "numero1"> <br> <br>
    <label for = "numero">Numero 2</label>
    <input type = "number" name = "numero2"> <br> <br>
    <label for = "numero">Numero 3</label>
    <input type = "number" name = "numero3"> <br> <br>
    <input type="submit" value="Comprobar el mayor">
</form>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $numero1 = $_POST["numero1"];
        $numero2 = $_POST["numero2"];
        $numero3 = $_POST["numero3"];

        $numeros =[$numero1, $numero2, $numero3];

        sort($numeros);

        echo "<p>El numero mayor es: " . $numeros[count($numeros)-1];
        
    }
?>

</body>
</html>