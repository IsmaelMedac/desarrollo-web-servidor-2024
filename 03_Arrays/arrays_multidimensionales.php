<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $videojuegos = [
        ["FIFA 24", "Deporte", 70],
        ["Dark Souls", "Soulslike", 50],
        ["Hollow Knight", "Plataformas", 30]
    ];

    foreach ($videojuegos as $videojuego){
        list($titulo, $categoria, $precio) = $videojuego;
        echo "<p>$titulo, $categoria, $precio</p>";
    }
    ?>
    <!-- practica a papel, tabla-->
    <?php
    $nuevo_videojuego = ["Throne and Liberty", "MM0", 0];
    array_push($videojuegos, $nuevo_videojuego);

    // variable auxiliar
    // $_titulo = array_column($videojuegos, 0); //descomponer en columnas
    // array_multisort($_titulo, SORT_ASC, $videojuegos); //ordenar alfabeticamente por titulo
    // SORT_ASC para orden ascendiente
    // SORT_DESC para orden descendiente

    // Ej rapido 1: Ordenar por el precio mas barato a mas caro
    
    // $_precio = array_column($videojuegos, 2);
    // array_multisort($_precio, SORT_ASC, $videojuegos);
    
    // EJ rapido 2: Ordenar por la categoria en orden alfabetico inverso

    // $_categoria = array_column($videojuegos, 1);
    // array_multisort($_categoria, SORT_DESC, $videojuegos);
    
    ?>

<?php
    
    for($i = 0; $i < count($videojuegos); $i++){
        if($videojuegos[$i][2] > 0){
        $videojuegos[$i][3] = "NO";
        } 
        else{
            $videojuegos[$i][3] = "SI";
        }    
    }
    print_r($videojuegos);
    ?>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Gratis</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($videojuegos as $videojuego){
                list($titulo, $categoria, $precio, $gratis) = $videojuego;
                echo "<tr>";
                echo "<td>$titulo</td>";
                echo "<td>$categoria</td>";
                echo "<td>$precio</td>";
                echo "<td>$gratis</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>