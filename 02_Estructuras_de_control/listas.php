<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
    <?php
    echo "<h3>Lista 1</h3>";

    $i = 1;
    echo "<ul>";
    while($i < 10){
        echo "<li>$i</li>";
        $i++;
    }
    echo "</ul>";

    ?>
    <h3>Lista 2</h3>
    <?php
    $i = 1;
    echo "<ul>";
    while($i < 10):
        echo "<li>$i</li>";
        $i++;
    endwhile;
    echo "</ul>";
    ?>
    
    <!-- CON WHILE Y LAS ESTRUCTURAS DE CONTROL NECESARIAS,
     MUESTRA EN UNA LISTA SIN ORDERNAR TODOS LOS MULTIPLOS 
     DE 3 ENTRE 1 Y 30  -->

    <?php
    
    $i = 1;
    echo "<ul>";
    while($i <= 30):
        if($i % 3 == 0):
        echo "<li>$i</li>";
        endif;
        $i++;
    endwhile;
    echo "</ul>";
     ?>

     <h3>Lista con Do while<h3>

     <?php
    $i = 1;
    echo "<ul>";
    do{
        echo "<li>$i</li>";
        $i++;
    } while ($i <= 10);
    echo "</ul>";
    
     ?>

    <h3>Lista con FOR<h3>
     <?php
    echo "<ul>";
    for($i = 1; $i <= 10; $i++){
        echo "<li>$i</li>";
    }
    echo "</ul>";
     ?>

     <h3>Lista con FOR 2<h3>
        <?php
        echo "<ul>";
        for($i = 1; ;$i++){
            if($i >= 10) break;
            echo "<li>$i</li>";
        }
        echo "</ul>";
        ?>

    <h3>Lista con FOR 3<h3>
        <?php
        $var = true;
        echo "<ul>";
        $i = 1;
        for(;;){
            if($i >= 10) break;
            echo "<li>$i</li>";
            $i++;
        }
        echo "</ul>";
        ?>

</body>
</html>