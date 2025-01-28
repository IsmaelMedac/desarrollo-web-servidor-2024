<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    

    /*
    $frutas = array(
        'clave 1' => "Manzana",
        'clave 2' => "Naranja",
        'clave 3' => "Cereza"
    );

    */

    //echo $frutas["clave 1"];
    //echo "<br>";
    
    echo "<h3>Mis frutas</h3>";
    echo "<ol>";
    $frutas = [ //SI NO ASIGNO EL LUGAR, SE ASIGNA POR DEFECTO
        "Manzana",
        "Naranja",
        "Cereza"
    ];

    $frutas2 = [ //SI NO ASIGNO EL LUGAR, SE ASIGNA POR DEFECTO
        "Melocoton",
        "Fresa",
        "Albaricoque"
    ];

    //SIN EMBARGO, SI CADA UNA TIENE LA MISMA CLAVE  ASIGNADA, SI SERAN IGUALES

    if($frutas == $frutas2){
        echo "<h3> Los arrays son iguales </h3>";
    } else {
        echo "<h3> Los arrays no son iguales</h3>";
    }
    

    echo "<h3>Mis frutas FOR</h3>";
    for($i = 0; $i < count($frutas); $i++){
        echo "<li>" . $frutas[$i] . "</li>";
    }
    echo "</ol>";

    echo "<h3>Mis frutas WHILE</h3>";
    echo "<ol>";
    $i = 0;
    while($i < count($frutas)){
        echo "<li>" . $frutas[$i] . "</li>";
        $i++;
    }
    echo "</ol>";
    
    echo "<br>";
    echo "=====================";
    echo "<br>";
    

    echo "<h3>Mis frutas FOREACH</h3>";
    echo "<ol>";
    foreach ($frutas as $fruta) {
        echo "<li>$fruta</li>";
    }
    echo "</ol>";

    echo "<br>";
    echo "=====================";
    echo "<br>";

    echo "<h3>Mis frutas FOREACH con claves</h3>";
    echo "<ol>";
    foreach ($frutas as $clave => $fruta) {
        echo "<li>$clave $fruta</li>";
    }
    echo "</ol>";

    echo "<br>";
    echo "=====================";
    echo "<br>";

    array_push($frutas, "Mango", "Melocotón");
    $frutas[] = "Sandía";
    $frutas[7] = "Uva";
    $frutas[] = "Melón";

    $frutas = array_values($frutas); //ORDENAR Y ARREGLAR
    unset($frutas[1]);//Eliminar un cajón del array
    $frutas = array_values($frutas);

    print_r($frutas);
    echo "<br>"; 

    //echo $frutas[1] . "<br>";

    //print_r($frutas);
    ?>

    <?php

    /*Crear un array con una lista de personas donde la clave sea
    el DNI y el valor el nombre
    
    Minimo 3 personas

    mostrar array completo con print_r y a alguna persona individual
    
    Añadir elemento con y sin clave
    
    borrar algun elemento

    probar a resetear las claves
    */

    $lista_personas = array(
        "77326941v" => "Aaron",
        "12354641b" => "Eufrasio",
        "33386524c" => "Lucas",
        "12345678t" => "Incognito"
    );

    echo "<br>";
    echo "=====================";
    echo "<br>";

    echo "<ol>";
    foreach($lista_personas as $dni => $nombre){
        echo "<li>DNI: $dni || Nombre: $nombre</li>";
    }
    echo "</ol>";

    /*
    print_r ($lista_personas['77326941v'] . "<br>");
    print_r ($lista_personas["33386524c"] . "<br>");
    print_r ($lista_personas['12345678t'] . "<br>");
    */
    unset($lista_personas[0]); //borrar
    $lista_personas["985689798m"] = "Cristiano Ronaldo"; //añadir con clave
    array_push($lista_personas, "¿Ronaldinho gaust?"); //añadir sin clave
    $lista_personas[7] = "Mango"; //añadir en cajan concreto
    
    $lista_personas = array_values($lista_personas); //arreglar orden
    print_r($lista_personas);

    //En php todos los arrays, son arrays asociativos

    
    ?>

    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
             $lista_personas = array(
                "77326941v" => "Aaron",
                "12354641b" => "Eufrasio",
                "33386524c" => "Lucas",
                "12345678t" => "Incognito"
            );

            foreach($lista_personas as $dni => $nombre){
                echo "<tr>";
                echo "<td>$dni</td>";
                echo "<td>$nombre</td>";
                echo "</tr>";
            }
            ?>
            
        </tbody>
    </table>
      <br>
      <br>  
    
      <table>
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Profesor</th>
            </tr>
        </thead>
        <tbody>
    <?php
    
    $lista_profesores = array(
        "Desarrollo web servidor" => "Alejandra",
        "Desarrollo web cliente" => "Jaime",
        "Diseño de interfaces" => "José",
        "Despliegue de aplicaciones web" => "Alejandro",
        "Empresa e iniciativa" => "Gloria",
        "Inglés" => "Virginia"
    );

    foreach($lista_profesores as $asignaturas => $profesores){
        echo "<tr>";
        echo "<td>$asignaturas</td>";
        echo "<td>$profesores</td>";
        echo "</tr>";
    };
    ?>
     </tbody>
     </table>

     <br>
      <br>  
    
      <table>
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Profesor</th>
            </tr>
        </thead>
        <tbody>
    <?php
    
    $lista_profesores = array(
        "Desarrollo web servidor" => "Alejandra",
        "Desarrollo web cliente" => "Jaime",
        "Diseño de interfaces" => "José",
        "Despliegue de aplicaciones web" => "Alejandro",
        "Empresa e iniciativa" => "Gloria",
        "Inglés" => "Virginia"
    );

    ksort($lista_profesores);
    foreach($lista_profesores as $asignaturas => $profesores){
        echo "<tr>";
        echo "<td>$asignaturas</td>";
        echo "<td>$profesores</td>";
        echo "</tr>";
    };
    ?>
     </tbody>
     </table>
    <br><br>
     <table>
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Profesor</th>
            </tr>
        </thead>
        <tbody>
    <?php
    
    $lista_profesores = array(
        "Desarrollo web servidor" => "Alejandra",
        "Desarrollo web cliente" => "Jaime",
        "Diseño de interfaces" => "José",
        "Despliegue de aplicaciones web" => "Alejandro",
        "Empresa e iniciativa" => "Gloria",
        "Inglés" => "Virginia"
    );

    krsort($lista_profesores);
    foreach($lista_profesores as $asignaturas => $profesores){
        echo "<tr>";
        echo "<td>$asignaturas</td>";
        echo "<td>$profesores</td>";
        echo "</tr>";
    };
    ?>
    
     </tbody>
     </table>
     <table>
     <caption>Estudiantes</caption> 
        <thead>
            <tr>
            </tr>
        </thead>
        <tbody>
          
        <?php
            /*
             $lista_alumnos = array(
                "Guillermo" => 3,
                "Daiana" => 5,
                "Angel" => 8,
                "Ayoub" => 7,
                "Mateo" => 9,
                "Joaquin" => 4
            );
            */
           ?>
     </tbody>
     </table>


        
</body>
</html>