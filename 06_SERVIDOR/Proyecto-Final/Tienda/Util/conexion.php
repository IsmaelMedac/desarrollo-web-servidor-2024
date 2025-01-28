<?php
    // Configuración de la conexión a la base de datos
    $_servidor = "localhost"; // ó "127.0.0.1"
    $_usuario = "estudiante"; // Cambia esto si tienes otro usuario
    $_contrasena = "estudiante"; // Cambia esto si tienes otra contraseña
    $_base_de_datos = "tienda_bd"; // Cambia esto al nombre de tu base de datos

    // Crear una conexión usando mysqli
    $_conexion = new Mysqli($_servidor,$_usuario,$_contrasena,$_base_de_datos)
        or die("Error de conexión");
?>