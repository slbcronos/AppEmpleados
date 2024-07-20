<?php 
//conexion a la base de datos

//remota
$servidor = "a2nlmysql55plsk.secureserver.net";
$usuario = "salvador_lopez";
$contrasenia = "Lomogel1511$";
$bd = "appempleados";
/*
//local
$servidor = "localhost";
$usuario = "root";
$contrasenia = "";
$bd = "appempleados";
*/


// Crear conexión
try{
    $conexion = new PDO("mysql:host=$servidor;dbname=$bd", $usuario, $contrasenia);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $ex){
    echo "Error al conectar a la base de datos: " . $ex->getMessage();
}




?>