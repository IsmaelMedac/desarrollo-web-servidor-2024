<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    header("Content-type: application/json");
    include("conexion_pdo.php");

    $metodo = $_SERVER["REQUEST_METHOD"];

    $entrada = json_decode(file_get_contents('php://input'), true);
    switch($metodo){
        case "GET":
            manejarGet($_conexion);
            break;
        case "POST";
            manejarPost($_conexion, $entrada);
            break;
        case "PUT":
            manejarPut($_conexion, $entrada);
            break;
        case "DELETE":
            manejarDelete($_conexion, $entrada);
            break;
        default:
            echo json_encode(["mensaje" => "Petición no válida"]);
    }

    function manejarGet($_conexion){
        //echo json_encode(["metodo" => "get"]);
        $sql = "SELECT * FROM consolas";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute();
        $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
    }

    function manejarPost($_conexion, $entrada){
        //echo json_encode(["metodo" => "post"]);
        $sql = "INSERT INTO consolas (nombre, fabricante, generacion, unidades_vendidas) VALUES
            (:nombre, :fabricante, :generacion, :unidades_vendidas)";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "nombre" => $entrada["nombre"],
            "fabricante" => $entrada["fabricante"],
            "generacion" => $entrada["generacion"],
            "unidades_vendidas" => $entrada["unidades_vendidas"]
        ]);
        if($stmt){
            echo json_encode(["mensaje" => "la consola se ha creado"]);
        } else {
            echo json_encode(["mensaje" => "error al crear la consola"]);
        }
    }

    function manejarPut($_conexion){
        echo json_decode(["metodo" => "put"]);
    }

    function manejarDelete($_conexion){
        echo json_decode(["metodo" => "delete"]);
    }

?>