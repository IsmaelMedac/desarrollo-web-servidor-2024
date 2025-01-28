<!--
ALEJANDRA, YA NO ME GUSTA PHP, AHORA ENTIENDO EL ODIO.
el espaciado en el codigo se debe al format.
Por lo demás el código debería ir perfecto,
porque necesito sacar buena nota para llegar al aprobado :'^)
-->
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
        
        require('./Util/conexion.php');
        session_start();
    ?>
</head>
<body>
    
<?php
    if (!isset($_SESSION["usuario"])) {
        echo "<a href='Usuario/iniciar_sesion.php'><button>Iniciar Sesión</button></a>";
    } else {
        echo "<a class='btn btn-secondary' href='Usuario/cerrar_sesion.php'>Cerrar Sesión</a>";
        echo $_SESSION['usuario'];
        echo "<a class='btn btn-primary' href='Productos/index.php'>Productos</a>";
        echo "<a class='btn btn-primary' href='Categorias/index.php'>Categorias</a>";
        echo "<a class='btn btn-primary' href='Usuario/cambiar_credenciales.php'>Cambiar contraseña</a>";
    }
?>
</body>
</html>


