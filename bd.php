<?php 
//conexion a la base de datos
$servidor = "localhost";
$usuario = "root";
$contrasenia = "";
$bd = "appempleados";

// Crear conexión
try{
    $conexion = new PDO("mysql:host=$servidor;dbname=$bd", $usuario, $contrasenia);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $ex){
    echo "Error al conectar a la base de datos: " . $ex->getMessage();
}




?>