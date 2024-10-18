<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
<?php
    //Parte 1, array asociativo bidimensional
    $videojuegos = [
        ["Arquimedes", "Fuego"],
        ["Law", "Agua"],
        ["Pokachu", "Electricidad"],
        ["Anhk", "Aire"]
    ];

    //1.1 Añadir dos nuevos personaejs al array
    $nuevo_personaje = ["Squal", "Fuego"];
    array_push($videojuegos, $nuevo_personaje);
    
    $nuevo_personaje = ["Sora", "Electricidad"];
    array_push($videojuegos, $nuevo_personaje);

    //1.2 eliminar el ultimo personaje del array
    unset($videojuegos[5]);

    //1.3 Añadir una tercera columna al array con puntos de ataque y random entre 500 y 2000
    for($i = 0; $i < count($videojuegos); $i++) {
        $videojuegos[$i][2] = rand(500, 2000);
    }
    
    //1.4 Añadir una cuarta columna al array, con puntos de vida aleatorios entre 10000 y 30000
    for($i = 0; $i < count($videojuegos); $i++) {
        $videojuegos[$i][3] = rand(10000, 30000);
    }
    //1.5 Añadir una quinta columna que indica el tipo de personaje que es en función de vida del personaje
    for($i = 0; $i < count($videojuegos); $i++){
        if($videojuegos[$i][3] >= 20000){
        $videojuegos[$i][4] = "Tanque";
        } 
        elseif($videojuegos[$i][2] >= 1500 && $videojuegos[$i][3] < 20000 ){
            $videojuegos[$i][4] = "Ataque";
        } else {
            $videojuegos[$i][4] = "Soporte";
        }
    }

    //1.6 Ordenar por ataque, salud y elemento

    $_ataque = array_column($videojuegos, 2);
    $_salud = array_column($videojuegos, 3);
    $_elemento = array_column($videojuegos, 1);

    array_multisort($_ataque, SORT_ASC, $_salud, SORT_ASC, $_elemento, SORT_ASC, $videojuegos);

    //$_nombre = array_column($videojuegos, 0);
    //$_tipo = array_column($videojuegos, 4);
    ?>

    <!--1.7 Mostrar toda la informacion en una tabla-->
    <table>
        <caption>Personajes</caption>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Elemento</th>
                <th>Ataque</th>
                <th>Salud</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($videojuegos as $videojuego){
                list($nombreP, $elementoP, $ataqueP, $saludP, $tipoP) = $videojuego;?>
                    <tr>
                        <td><?php echo $nombreP ?></td>
                        <td><?php echo $elementoP ?></td>
                        <td><?php echo $ataqueP ?></td>
                        <td><?php echo $saludP ?></td>
                        <td><?php echo $tipoP ?></td>
                    </tr>
            <?php } ?>
     </tbody>
     </table>
     <br><br>
</body>
</html>