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
    ]
    /**
     * Ejercicio 1: Añadir al array 4 estudiantes con sus asignaturas
     * 
     * Ejercicio 2: Eliminar 1 estudiante y su asignatura a libre elección
     * 
     * Ejercicio 3: Añadir una tercera columna que será la nota, obtenida de manera aleatoria
     * entre 1 y 10
     * 
     * Ejercicio 4: Añadir una cuarta columna que indique APTO o NO APTO, dependiendo de si la nota es
     * es igual o superior a 5 o no
     * 
     * Ejercicio 5: Ordenar alfabéticamente por los alumnos, y luego por nota.
     * Si hay varias filas con el mismo nombre y misma nota, ordenar por las asignaturas, alfabeticamente.
     * 
     * Ejercicio 6: Mostrarlo todo en una tabla.
     */
    ?>
</body>
</html>