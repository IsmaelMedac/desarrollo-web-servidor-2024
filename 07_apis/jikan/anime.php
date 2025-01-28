<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime</title>
    <style>
        body {
font-family: Arial, sans-serif;
background-color: #f4f4f4;
margin: 0;
padding: 20px;
}


.table-container {
max-width: 800px;
margin: auto;
overflow: hidden;
border-radius: 8px;
box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
background-color: #fff;
}


table {
width: 100%;
border-collapse: collapse;
}


th, td {
padding: 15px;
text-align: left;
border-bottom: 1px solid #ddd;
}


th {
background-color:rgb(0, 0, 0);
color: white;
}


td img {
border-radius: 50%;
width: 100px;
height: 100px;
}

tr:hover {
background-color: #f1f1f1;
}


tbody tr:nth-child(even) {
background-color: #f9f9f9;
}
    </style>

    <?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
</head>
<body>
    <?php
        if (isset($_GET["mal_id"])) {
            $mal_id = $_GET["mal_id"];
        }

        $url = "https://api.jikan.moe/v4/anime/" . $mal_id . "/full";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $anime = $datos["data"];

        // print_r($animes);

            ?>
    <table>
        <thead>
            <th>Titulo</th>
            <th>Sinopsis</th>
            <th>Imagen</th>
            <th>Año</th>
        </thead>
        <tbody>


            <tr>
            <td><?php echo $anime["title"]?></td>
            <td><?php echo $anime["synopsis"]?></td>
            <td><img src="<?php echo $anime['images']['jpg']['image_url']?>"></td>
            <td><?php echo $anime["year"]?></td>
            </tr>
      
        </tbody>
    </table>

    <h3>Géneros</h3>
    
    <ul>
    <?php
        foreach($anime["genres"] as $genero) { ?>
        <?php echo "<li>" . $genero["name"] . "</li>"?> 
        <?php }
    ?>
    </ul>
    

    <h3>Productores</h3>
    <ul>
    <?php
        foreach($anime["producers"] as $productores) { ?>
        <?php echo "<li>" . $productores["name"] . "</li>"?> 
        <?php }
    ?>
    </ul>

    <h3>Relaciones</h3>
    
    <ul>
    <?php
        foreach($anime["relations"] as $relation) { ?>
        <?php echo "<li>" . $relation["relation"] . "</li>"?> 
        <?php }
    ?>
    </ul>

    <div>
    <iframe src="<?php echo $anime['trailer']['embed_url']?>" type="video/mp4">
    </div>
    


      

  
</body>
</html>