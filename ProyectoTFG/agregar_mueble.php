<?php
include_once 'connections/connection.php';
 if ($conexionServidor->connect_error) {
    die("Error al conectar a la base de datos: " . $conexionServidor->connect_error);
}

// OBTENEMOS LOS DATOS DEL FORMULARIO
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$imagen = $_POST['imagen'];
$cantidad = $_POST['cantidad'];

// INSERTAT LOS DATOS EN LA TABLA DE LA BASE DE DATOS
$sql = "INSERT INTO catalogo (nombre, descripcion, precio, imagen, cantidad) VALUES ('$nombre', '$descripcion', '$precio', '$imagen', '$cantidad')";
if ($conexionServidor->query($sql) === TRUE) {
    echo "El mueble se ha agregado correctamente.";
} else {
    echo "Error al agregar el mueble: " . $conexionServidor->error;
}

$conexionServidor->close();
?>
