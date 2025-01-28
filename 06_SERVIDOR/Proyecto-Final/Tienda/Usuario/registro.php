<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../Util/conexion.php');
        session_start();
        if(isset($_SESSION['usuario'])) {
            header("location: ../index.php");
            exit;
        }
    ?>
</head>
<body>
    <?php
    if(isset($_SESSION["usuario"])) {
        header("../index.php");
        exit;
    }
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $contrasenia = $_POST["contrasenia"];
        $correcto_usuario= false;
        $correcto_contrasenia=false;

        if(strlen($usuario) < 3 || strlen($usuario) >15){
            echo "<h2>El nombre de usuario debe tener entre 3 y 15 caracteres<h2>";
        } else {
            $patron = "/^[a-zA-Z0-9]+$/";
            if(!preg_match($patron, $usuario)) {
                echo "El nombre de usuario debe contenter letras y/o números";
            } else{
                $correcto_usuario=true;
            }
        }

        if(strlen($contrasenia) < 8 || strlen($contrasenia) > 15) {
            echo "<h2>La contraseña debe tener entre 8 y 15 caracteres</h2>";
        } else {
            $patron = "/^[a-zA-Z0-9-_\.@]+$/";
            if(!preg_match($patron, $contrasenia)) {
                echo "<h2>La contraseña debe tener letras en mayus y minus, algun numero y puede tener caracteres especiales</h2>";
            }else{
                $correcto_contrasenia=true;
            }
        }

        if ($correcto_usuario && $correcto_contrasenia) {
            $query = "SELECT usuario FROM usuarios WHERE usuario = '$usuario'";
            $resultado = $_conexion -> query($query);
            
            if($resultado -> num_rows > 0) {
                echo "<h2>El usuario ya existe</h2>";
            } else {
                $contrasenia_cifrada = password_hash($contrasenia, PASSWORD_DEFAULT);

                $sql = "INSERT INTO usuarios VALUES ('$usuario', '$contrasenia_cifrada')";
                $_conexion -> query($sql);
                header("location: iniciar_sesion.php");
            }
        }
    }
    ?>
    <div class="container">
        <h1>Formulario de registro</h1>
        <form class="col-4" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" name="usuario" type="text">
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" name="contrasenia" type="password">
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Registarse">
            </div>
        </form>
        <h3>O, si ya tienes cuenta, inicia sesión</h3>
        <a class="btn btn-secondary" href="iniciar_sesion.php">Iniciar sesión</a>
        <a class="btn btn-secondary" href='../index.php' >Inicio</a>
    </div>
</body>
</html>