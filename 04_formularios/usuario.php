<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
        error_reporting(E_ALL);
        ini_set ("display_errors", 1);
    ?>
</head>
<body>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_usuario = $_POST["usuario"];
            $tmp_nombre = $_POST["nombre"];
            $tmp_apellidos = $_POST["apellidos"];
            $tmp_fecha_nacimiento = $_POST["fecha_nacimiento"];


            /**
         * Entre 4 y 12 caracteres
         * letras a-z (mayus o minus), números y barrabaja
         */
            if($tmp_usuario == ''){
                $err_usuario ="El usuario es obligatorio";

            }else {
                $patron = "/^[a-zA-Z0-9_]{4,12}$/";
                if(!preg_match($patron, $tmp_usuario)){
                    $err_usuario="El usuario debe tener entre 4 y 12 caracteres y
                    contener letras, números o barrabaja";
                }else {
                    $usuario = $tmp_usuario;
                }
            }
            /**
             * 2-30 caracteres
             * solo letras con tildes y espacios en blanco
             */
            if($tmp_nombre = ''){
                $err_nombre = "El nombre es obligatorio";
            } else {
                if(strlen($tmp_nombre) < 2  || strlen($tmp_nombre > 30)){
                    $err_nombre ="El nombre tiene que tener entre 2 y 30 caracteres";
                } else {
                    $patron = "/^[a-zA-Z\ áéíóúÁÉÍÓÚ]$/";
                    if(!preg_match($patron, $tmp_nombre)){
                        $err_nombre = "El nombre solo puede contener letras 
                        o espacios en blanco";
                    } else {
                        $nombre = $tmp_nombre;
                    }
                }
            }

            if($tmp_apellidos = ''){
                $err_apellidos = "El nombre es obligatorio";
            } else {
                if(strlen($tmp_apellidos) < 2  || strlen($tmp_apellidos > 30)){
                    $err_apellidos ="El apellido tiene que tener entre 2 y 30 caracteres";
                } else {
                    $patron = "/^[a-zA-Z\ áéíóúÁÉÍÓÚ]$/";
                    if(!preg_match($patron, $tmp_apellidos)){
                        $err_apellidos = "El apellido solo puede contener letras 
                        o espacios en blanco";
                    } else {
                        $apellidos = $tmp_apellidos;
                    }
                }
            }

            /**
             * No se podrá haber nacido a mas de 120 años
             */

            //echo 
            // [0-9]
            if($tmp_fecha_nacimiento == ''){
                $err_fecha_nacimiento = "La fecha de nacimiento es obligatoria";
            } else {
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if(!preg_match($patron, $tmp_fecha_nacimiento)){
                    $err_fecha_nacimiento ="El formato de la fecha es incorrecto";
                } else {
                    $fecha_actual = date("Y-m-d");
                    list($anno_actual, $mes_actual, $dia_actual) = explode('', $fecha_actual);
                }
            }

        }

        

    ?>

    <form action="" method = "post">
        <input type="text" name="usuario" placeholder="Usuario"><br><br>
        <?php if(isset($err_usuario)) echo "<span class = 'error'>$err_usuario</span>"; ?>
        <input type="text" name="nombre" placeholder="Nombre"><br><br>
        <?php if(isset($err_nombre)) echo "<span class = 'error'>$err_nombre</span>"; ?>
        <input type="text" name="apellidos" placeholder="Apellidos"><br><br>
        <?php if(isset($err_apellidos)) echo "<span class = 'error'>$err_apellidos</span>"; ?>
        <label for="">Fecha de nacimiento</label><br>
        <input type="date" name="fecha_nacimiento" placeholder="Fecha de nacimiento"><br><br>
        <input type="submit" value="Registrarse">
    </form>
</body>
</html>