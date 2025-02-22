<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $tmp_titulo = $_POST["titulo"];
                $tmp_consola = $_POST["consola"];
                $tmp_descripcion = $_POST["descripcion"];
                $tmp_fecha_lanzamiento = $_POST["fecha_lanzamiento"];

                /* if($tmp_titulo == ''){
                    $err_titulo = $tmp
                } */
            }
        ?>
        <!--Content here-->
        <h1>Formulario de videojuegos</h1>
        <form class="col-6" action="" method = "post">
            <div class="mb-3">
            <label class="form-label">Título</label>
            <input class="form-control" type="text">
            </div>
            <div class="mb-3">
            <label class="form-label">Descripcion</label>
            <textarea class="form-control"></textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Consola</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="consola" value="ps4">
                    <label class="form-check-label">Playstation 4</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="consola" value="ps5">
                    <label class="form-check-label">Playstation 5</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="consola" value="switch">
                    <label class="form-check-label">Nintendo Switch</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="consola" value="xbox">
                    <label class="form-check-label">Xbox Series X/S</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="consola" value="PC">
                    <label class="form-check-label">PC</label>
                </div>
                <div class="mb-3">
                <label class="form-label"></label>
                <input type="date" class="form-control" name="fecha_lanzamiento">
                </div>

            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>