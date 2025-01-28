<?php
    $_servidor = "localhost"; //ó "127.0.0.1" (Loopback)
    $_usuario ="estudiante";
    $_contrasena = "estudiante";
    $_base_de_datos = "consolas_bd";

    //tenemos dos opciones para crear una conexion con BBDD
    //Mysqli (más simple) ó PDO (más completa)

    $_conexion = new Mysqli($_servidor, $_usuario, $_contrasena, $_base_de_datos)
        or die("Error de conexión");
?>