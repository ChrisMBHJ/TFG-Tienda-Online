<?php
$usuario = "root";
$password = "";
$servidor = "localhost:3307";
$basededatos = "tfg";

//CONEXION CON SERVIDOR
$conexionServidor=mysqli_connect($servidor,$usuario,"") or die ("ERROR en la conexión.");


//CONEXION CON BASE DE DATOS
$db = mysqli_select_db($conexionServidor, $basededatos) or die ("ERROR con la base de datos");

?>
