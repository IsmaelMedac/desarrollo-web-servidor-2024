<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="salario" placeholder="Salario">
        <input type="submit" value="Calcular salario bruto">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //$salario = $_POST["salario"];
        
        $tmp_salario = $_POST["salario"];
        if($tmp_salario == '') {
            echo "<p>introduce algo, no vacio!</p>";
        } else {
            if(filter_var($tmp_salario, FILTER_VALIDATE_INT) === FALSE) {
                echo "<p>No has introducido un numero!</p>";
            } else {
                if($tmp_salario < 0) {
                    echo "<p>El salario no puede ser menor a cero!</p>";
                } else {
                    $salario = $tmp_salario;
                }
            }
        }
        operarSalario($salario);
    }
        
    ?>
</body>
</html>