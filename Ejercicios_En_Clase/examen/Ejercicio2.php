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
    //2. Array bidimensional de los barrios indicados, mostrados en una tabla
    $barrios = [
        ["Centro", 2543],
        ["Huelin", 1109],
        ["Málaga Este", 890],
        ["Palma", 49]
    ];

    ?>
    <table>
        <caption>Barrios</caption>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Pisos Turísticos</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($barrios as $barrio){
                list($nombreB, $numerosP) = $barrio; ?>
                    <tr>
                        <td><?php echo $nombreB ?></td>
                        <td><?php echo $numerosP ?></td>
                    </tr>
            <?php } ?>
        </tbody>
     </table>
     <br><br>
    
    <!--2.1 formulario con campo de texto y boton-->
     <form action = "" method = "post">
        <label for="nombre"> Nombre del Barrio</label>
        <input type="text" name="barrio" id = "barrio">
        <input type="submit" value ="Comprobar barrio">
    </form>

    <?php
    //Poner nombre respetando mayusculas para que funcione correctamente en caso de introducir un valor correcto
        if($_SERVER["REQUEST_METHOD"] == "POST"){ 
            $barrio  = $_POST ["barrio"];

            $i = 0;
            $fila_barrio = null;
            $encontrado = false;
            while($i < count($barrios) && !$encontrado) {
                if($barrios[$i][0] == $barrio) {
                    $encontrado = true;
                    $fila_barrio = $i;
                }
                $i++;
            }
            if($encontrado && $barrios[$fila_barrio][1] <=0) {
                echo "<p>No Tenemos viviendas turísticas disponibles</p>";
            } elseif($encontrado && $barrios[$fila_barrio][1] >= 1 && $barrios[$fila_barrio][1] <=50) {
                echo "<p>Hay pocas viviendas turísticas</p>";
            } elseif($encontrado && $barrios[$fila_barrio][1] >=51 && $barrios[$fila_barrio][1] <=1000){
                echo "<p>Hay bastantes viviendas turísticas</p>";
            }
            elseif($encontrado && $barrios[$fila_barrio][1] >=1000){
                echo "<p>Hay demasiadas viviendas turísticas</p>";
            }
            else {
                echo "<p>El barrio $barrio no existe</p>";
            }
        }
    ?>



</body>
</html>