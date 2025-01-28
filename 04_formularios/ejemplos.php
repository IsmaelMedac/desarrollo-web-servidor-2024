<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     /*
     SINGLE PAGE FORM -> TODA LA INFORMACION SE PROCESA EN LA MISMA PAGINAS

     MULTI PAGE FORM -> REENVIAN A OTRA PAGINA
     */
    ?>

    <form action ="" method="post">
        <input type="text" name="mensaje">
        <input type="number" name="numero">
        <input type="submit" value="Enviar">

    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        /**
         * El servidor ejecutará este bloque de código cuando reciba
         * una petición a través del metodo POST
         */
        $mensaje = $_POST["mensaje"];
        echo "<h1>$mensaje</h1>";
        /**
         * Modificar el formulario anterior para que se pueda introducir un numero
         * El mensaje se mostrara tantas veces como se indique el numero
         */
        $numero = $_POST["numero"];
        $i = 0;
        while($i < $numero){
            echo "<p>$mensaje</p>";
            $i++;
        }
        
    }   
    ?>

    
</body>
</html>