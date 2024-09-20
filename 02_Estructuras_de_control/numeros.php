<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
    //$numero = 0;
    /*
    if($numero > 0){
        echo "<p>El número es positivo</p>";
    }
    if($numero > 0) echo "<p>El número es positivo</p>";
    
    if($numero > 0):
        echo "<p>El número es positivo</p>";
    endif;
    ?>*/
    /*
    if($numero > 0){
        echo "<p>El número es positivo</p>";
    } else {
        echo "<p>El número no es positivo";
    }

    if($numero > 0) echo "<p>El número es positivo</p>";
    else echo "<p>El número no es positivo</p>";
    
    if($numero > 0):
        echo "<p>El número es positivo</p>";
    else: 
        echo "<p>El número no es positivo</p>";
    endif;
    */

    /*
    if($numero > 0){
        echo "<p>El número es positivo</p>";
    } elseif($numero == 0) {
        echo "<p>El número es 0 positivo";
    } else {
        echo "<p>El número no es positivo";
    }

    if($numero > 0) echo "<p>El número es positivo</p>";
    elseif ($numero == 0) echo "<p>El número es 0</p>";
    else echo "<p>El número no es positivo</p>";
    
    if($numero > 0):
        echo "<p>El número es positivo</p>";
    elseif ($numero == 0): 
        echo "<p>El número es 0</p>";
    else:
        echo "<p>El número no es positivo</p>";
    endif;
    */

    $numero = 15;

    #   Rangos: [-10,0), [0,10], (10,20]

    if($numero >= -10 && $numero < 0){
        echo "El numero $numero está en el rango [-10,0)";
    } elseif ($numero >= 0 and $numero <= 10){
        echo "El número $numero está el rango [0,10]";
    } elseif ($numero > 10 && $numero <= 20){
        echo "El número $numero está em el rango [10,20]";
    } else {
        echo "El número esta fuera de los rangos";
    }

    if($numero >= -10 && $numero < 0):
        echo "El numero $numero está en el rango [-10,0)";
     elseif ($numero >= 0 and $numero <= 10):
        echo "El número $numero está el rango [0,10]";
     elseif ($numero > 10 && $numero <= 20):
        echo "El número $numero está em el rango [10,20]";
     else:
        echo "El número esta fuera de los rangos";
     endif;


     
     /*
     $numero1 = 3
     $numero2 = 4
     
     ESCRIBIR UN IF QUE DECIDA CUAL DE LOS NUMEROS ES MAYOR, O SI
     SON IGUALES
     
     HACERLO DE DOS FORMAS DIFERENTES*/

     $numero1 = 3;
     $numero2 = 4;

     if($numero1 > $numero2){
        echo "<p>El numero $numero1 es mayor que el numero $numero2 </p>";
     } elseif ($numero2 > $numero1){
        echo "<p>El numero $numero2 es mayor que el numero $numero1 </p>";
     } else{
        echo "<p>Los números son iguales</p>";
     }


     if($numero1 > $numero2):
        echo "<p>El numero $numero1 es mayor que el numero $numero2 </p>";
        elseif ($numero2 > $numero1):
        echo "<p>El numero $numero2 es mayor que el numero $numero1 </p>";
        else:
        echo "<p>Los números son iguales</p>";
     endif;


     if($numero1 > $numero2) echo "<p>El numero $numero1 es mayor que el numero $numero2 </p>";
        elseif ($numero2 > $numero1) echo "<p>El numero $numero2 es mayor que el numero $numero1 </p>";
        else echo "<p>Los números son iguales</p>";


    ?>

</body>
</html>