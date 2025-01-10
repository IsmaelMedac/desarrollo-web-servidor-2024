<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../Util/conexion.php');
        session_start();
        if(!isset($_SESSION['usuario'])) {
            header("location: ./iniciar_sesion.php");
            exit;
        }
    ?>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $contrasenia_actual = $_POST["contrasenia_actual"];
        $contrasenia_nueva = $_POST["contrasenia_nueva"];
        $correcto_contrasenia=false;

        if(strlen($contrasenia_nueva) < 8 || strlen($contrasenia_nueva) > 15) {
            echo "<h2>La contraseña nueva debe tener entre 8 y 15 caracteres</h2>";
        } else {
            $patron = "/^[a-zA-Z0-9-_\.@]+$/";
            if(!preg_match($patron, $contrasenia_nueva)) {
                echo "<h2>La contraseña nueva debe tener letras en mayus y minus, algun numero y puede tener caracteres especiales</h2>";
            }else{
                $correcto_contrasenia=true;
            }
        }
        if ($correcto_contrasenia){
            $usuario=$_SESSION['usuario'];
            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario';";
            $resultado = $_conexion -> query($sql);
            $info_usuario = $resultado -> fetch_assoc();
            $acceso_concedido = password_verify($contrasenia_actual,$info_usuario["contrasenia"]);
            
            if(!$acceso_concedido) {
                echo "<h2>Contraseña actual equivocada</h2>";
            } else {
                $contrasenia_cifrada = password_hash($contrasenia_nueva, PASSWORD_DEFAULT);
                $sql = "UPDATE usuarios SET contrasenia = '$contrasenia_cifrada' WHERE usuario = '$usuario';";
                $_conexion -> query($sql);
                header("location: ../index.php");
            }
        }
    }
    ?>
    <div class="container">
        <h1>Cambiar contraseña</h1>
        <form class="col-4" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Contraseña actual</label>
                <input class="form-control" name="contrasenia_actual" type="password">
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña nueva</label>
                <input class="form-control" name="contrasenia_nueva" type="password">
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Cambiar contraseña">
            </div>
        </form>
        <br>

        <a href='../index.php' class="btn btn-secondary">Inicio</a>
    </div>
</body>
</html>

