<?php

    function comprobarPotencia(){
        if($base != '' && $exponente != ''){
            $resultado = 1;
            for($i = 0; $i < $exponente; $i++){
                $resultado = $resultado * $base;
            }
            echo "<h2>El resultado de elevar $base a $exponente es $resultado</h2>";
        } else {
            echo "<p>Por favor, introduce la base y el exponente</p>";
        }
    }

?>