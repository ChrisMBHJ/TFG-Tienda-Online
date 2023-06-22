<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include_once 'connection.php';

//LLAMADA A LOS PARAMETROS Y RECUPERAR LAS VARIABLES
$nombre =$_POST['nombre'];
$apellido =$_POST['apellido'];
$usuario =$_POST['usuario'];
$email =$_POST['email'];
$password =$_POST['password'];

//INSERTAR LOS DATOS EN LA BASE DE DATOS
$sql = "INSERT INTO registros VALUES ('$nombre','$apellido','$usuario','$email','$password')";

//EJECUTO LA SENTENCIA
$ejecutar = mysqli_query($conexionServidor, $sql);

//VERIFICACION DE EJECUCIÓN
if(!$ejecutar){
    echo 'Hubo algun error';
} else {
    header("location:../login.php");
    exit;
}
?>
