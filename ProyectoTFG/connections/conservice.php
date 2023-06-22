<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

include_once 'connection.php';

//LLAMADA A LOS PARAMETROS Y RECUPERAR LAS VARIABLES
$asunto =$_POST['asunto'];
$email =$_POST['email'];
$referencia =$_POST['referencia'];
$mensaje =$_POST['mensaje'];

//INSERTAR LOS DATOS EN LA BASE DE DATOS
$sql = "INSERT INTO servicio VALUES ('$asunto','$email','$referencia','$mensaje')";

//EJECUTO LA SENTENCIA
$ejecutar = mysqli_query($conexionServidor, $sql);

//VERIFICACION DE EJECUCIÓN
if(!$ejecutar){
    echo 'Hubo algun error';
} else {
    header("location:../postService.php");
    exit;
}
?>