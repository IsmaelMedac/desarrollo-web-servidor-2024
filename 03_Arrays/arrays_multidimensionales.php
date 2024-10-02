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
        ["FIFA 24", "Deporte"],
        ["Dark Souls", "Soulslike", 50],
        ["Hollow Knight", "Plataformas", 30]
    ];

    foreach ($videojuegos as $videojuego){
        list($titulo, $categoria, $precio) = $videojuego;
        echo "<p>$titulo, $categoria, $precio</p>";
    }
    ?>
</body>
</html>