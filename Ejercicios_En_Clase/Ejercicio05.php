<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <label for = "text">Introduce tu salario: </label>
    <input type = "text" name = "salario"> <br> <br>
    <input type="submit" value="Cacular IRPF">
</form>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $salario = $_POST["salario"];
        
        
        $sueldoRestante = 0;
        if($salario <= 12450){
            $salario = ($salario * 19) / 100;
            echo "<p>Lo que que se queda Pedro chance de tu salario es: " . $salario . " euros</p>";
        } else if($salario >= 12451 || $salario <= 20199){
            $salario = ($salario * 24) /100;
            echo "<p>Lo que que se queda Pedro chance de tu salario es: " . $salario . " euros</p>";
        } else if($salario >= 20200 || $salario <= 35199){
            $salario = ($salario * 30) / 100;
            echo "<p>Lo que que se queda Pedro chance de tu salario es: " . $salario . " euros</p>";
        } else if($salario >=35200 || $salario <= 59999){
            $salario = ($salario * 37) / 100;
            echo "<p>Lo que que se queda Pedro chance de tu salario es: " . $salario . " euros</p>";
        } else if($salario >= 60000 || $salario <= 299999){
            $salario = ($salario * 45) / 100;
            echo "<p>Lo que que se queda Pedro chance de tu salario es: " . $salario . " euros</p>";
        } else if($salario >= 300000){
            $salario = ($salario * 47) / 100;
            echo "<p>Lo que que se queda Pedro chance de tu salario es: " . $salario . " euros</p>";
        } else {
            echo "<p>Pero que has introducido¿?</p>";
        }
        
    }
?>

</body>
</html>