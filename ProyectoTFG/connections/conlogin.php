<?php

include('connection.php');

//RESCATO LAS VARIABLES QUE INTRODUCEN EN LOS CAMPOS
$usuario = $_POST['usuario'];
$password = $_POST['password'];

$sql = "SELECT * FROM registros WHERE usuario='$usuario' AND password='$password'";
$resultado = mysqli_query($conexionServidor, $sql);

// VERIFICAR SI SE HA ENCONTDADO UNA FILA QUE COINCIDA CON LOS DATOS PROPORCIONADOS
if (mysqli_num_rows($resultado) == 1) {
  //INICIAR SESION
  session_start();
  $_SESSION['usuario'] = $usuario;

  //REDIRIGIR AL URUARIO
  header("Location:../home.php");
  exit;
} else {
  //SI LOS DATO SOSN INCORRWCTOS, MOSTRAMOS MENSAJE DE ERROR
  header("Location:../login.php");
  echo "Usuario o contraseña incorrectos";
}
// CERRAR LA CONEXIÓN A LA BASE DE DATOS
mysqli_close($conexionServidor);
 
?>
