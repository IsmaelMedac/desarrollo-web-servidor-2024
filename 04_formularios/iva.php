<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Iva</title>
</head>
<body>
<!-- 4% SUPER REDUCIDO x1,04
    10% REDUCIDO x1,10
    21% GENERAL x1,21
10EUROS sin impuestos, iva general
pvp = 10 + 2,1 = 12,1    
    -->

    <form action="" method="post">
    <label for = "precio">Precio</label>
    <input type = "number" name = "precio" id = "precio"> <br> <br>
    <select name = "iva" id = "iva">
        <option value="general">General</option>
        <option value="reducido">reducido</option>
        <option value="superredudido">Superreducido</option>
    </select> <br><br>
    <input type="submit" value="Calcular PVP">
</form>
</body>
</html>