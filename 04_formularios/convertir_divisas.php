<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="text">Introduce una divisa a cambiar</label>
        <input type="Number" name="cantidad"> <br> <br>
        <label for="text">de</label>
        <select name="opciones_convertir">
            <option value="€">Euro</option>
            <option value="$">Dolar</option>
            <option value="Y">Yenes</option>
        </select>

        <label for="text">a</label>
        <select name="opciones_cambio">
            <option value="€">Euro</option>
            <option value="$">Dolar</option>
            <option value="Y">Yenes</option>
        </select>
        <input type="submit" value="Convertir">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //variables constantes del valor de cada moneda
            define("EURO", 1);
            define("DOLAR", 1.18);
            define("YEN", 129.852);
            
            $cantidad = (float)$_POST["cantidad"];
            $opciones_convertir = $_POST["opciones_convertir"];
            $opciones_cambio = $_POST["opciones_cambio"];
            //se hace la conversion de monedas
            if($opciones_convertir == "€" && $opciones_cambio == "$"){
                $resultado = $cantidad * DOLAR;
                echo "El resultado es: $resultado Dolares";
            }elseif($opciones_convertir == "€" && $opciones_cambio == "Y"){
                $resultado = $cantidad * YEN;
                echo "El resultado es: $resultado Yenes";
            }elseif($opciones_convertir == "$" && $opciones_cambio == "€"){
                $resultado = $cantidad / DOLAR;
                echo "El resultado es: $resultado Euros";
            }elseif($opciones_convertir == "$" && $opciones_cambio == "Y"){
                $resultado = $cantidad * YEN / DOLAR;
                echo "El resultado es: $resultado Yenes";
            }elseif($opciones_convertir == "Y" && $opciones_cambio == "€"){
                $resultado = $cantidad / YEN;
                echo "El resultado es: $resultado Euros";
            }elseif($opciones_convertir == "Y" && $opciones_cambio == "$"){
                $resultado = $cantidad * DOLAR / YEN;
                echo "El resultado es: $resultado Dolares";
            }else{
                echo "No se puede convertir la misma moneda";
            }
        }
    ?>
</body>
</html>