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
    $notas =[
        ["Paco", "Desarrollo web servidor"],
        ["Manu", "Desarrollo web servidor"],
        ["Victor", "Desarrollo web servidor"],
        ["Guille", "Desarrollo web servidor"]
    ];

    unset ($notas[1]);
    $notas = array_values($notas);

    for($i = 0; $i < count($notas); $i++){
        $notas[$i][2] = rand(1,10);
    }

    for($i = 0; $i < count($notas); $i++){
        
    }

    $_estudiante = array_column($notas, 0);
    $_asignatura = array_column($notas, 1);
    $nota = array_column($notas, 1);

    array_multisort($_estudiante, SORT_ASC,
                    $_nota, SORT_ASC,
                    $_asignatura, SORT_ASC);

    /**
     * Ejercicio 1: Añadir al array 4 estudiantes con sus asignaturas
     * 
     * Ejercicio 2: Eliminar 1 estudiante y su asignatura a libre elección
     * 
     * Ejercicio 3: Añadir una tercera columna que será la nota, obtenida de manera aleatoria
     * entre 1 y 10
     * 
     * Ejercicio 4: Añadir una cuarta columna que indique APTO o NO APTO, dependiendo de si la nota es
     * es igual o superior a 5 o no (CAE EN PRACTICA)
     * 
     * Ejercicio 5: Ordenar alfabéticamente por los alumnos, y luego por nota.
     * Si hay varias filas con el mismo nombre y misma nota, ordenar por las asignaturas, alfabeticamente.
     * 
     * Ejercicio 6: Mostrarlo todo en una tabla.
     */
    

    
     

    ?>

    <table>
        
    </table>
</body>
</html>