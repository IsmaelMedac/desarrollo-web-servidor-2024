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

    <h1>Filtrar Estudios por Ciudad</h1>
    <form method="GET" action="">
        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" placeholder="Ingrese una ciudad">
        <input type="submit" value="Filtrar">
    </form>
    <?php
    $url = "http://localhost/Ejercicios/06_SERVIDOR/bases%20de%20datos/Animes/api/api_estudios.php";
    if(isset($_GET["ciudad"]) and !empty($_GET["ciudad"])){
        $ciudad = $_GET["ciudad"];
        $url = $url . "?ciudad=$ciudad";
    }
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    curl_close($curl);

    $estudios = json_decode($respuesta, true);


    /* print_r($respuesta); */
    ?>

    <table>
        <tr>
            <th>Nomrbe ciudad</th>
            <th>Ciudad</th>
            <th>Año fundacion</th>
        </tr>
        <?php
        foreach($estudios as $estudio) { ?>
            <tr>
                <td><?php echo $estudio["nombre_estudio"]?></td>
                <td><?php echo $estudio["ciudad"]?></td>
                <td><?php echo $estudio["anno_fundacion"]?></td>
            </tr>
        <?php }
        ?>
        </table>

       


        </body>
</html>