<?php 
session_start();//INICIAMOS LA SESION 
include_once 'connections/connection.php';//INCLUIMOS LA CONEXION A LA BASE DE DATOS Y AL SERVIDOR

if ($conexionServidor->connect_error) {
    die("Error al conectar a la base de datos: " . $conexionServidor->connect_error);
}

//VERIFICAR SI SE HA ENVIADO UN FORMULARIO DE COMPRA
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['producto_id']) && isset($_POST['cantidad'])) {
        // OBTENER EL ID Y LA CANTIDAD DEL PRODUCTO DESDE EL FORMULARIO
        $producto_id = $_POST['producto_id'];
        $cantidad = $_POST['cantidad'];

        //VERIFICAR SI EL PRODUCTO YA ESTÁ EN EL CARRITO
        if (isset($_SESSION['carrito'][$producto_id])) {
            // ACTUALIZAR LA CANTIDAD DEL PRODUCTO DEL CARRITO
            $_SESSION['carrito'][$producto_id] += $cantidad;
        } else {
            //AGREGAMOS EL PRODUCTO AL CARRITO
            $_SESSION['carrito'][$producto_id] = $cantidad;
        }

        //REDIRIGIMOS AL CATÁLOGO DESPUÉS DE AGREGAR EL PRODUCTO
        header('Location: busqueda.php');
        exit;
    }
}

//VERIFICAR SI SE HA ENVIADO UN FORMULARIO DE VACIAR EL CARRITO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['vaciar_carrito'])) {
        // VACIAMOS CARRITO
        unset($_SESSION['carrito']);

        //REDIRIGIR AL CATALOGO DESPUES DE VACIARLO
        header('Location: busqueda.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="catestilo.css">

</head>
<body>

<!-- FORMULARIO DE LA BÚSQUEDA AVANZADA CON OPERADOR TERNARIO. -->
<form method="GET" action="busqueda.php">
    <label for="buscar">Buscar por nombre:</label>
    <input type="text" name="buscar" id="buscar" value="<?php echo isset($_GET['buscar']) ? $_GET['buscar'] : ''; ?>">
    <input type="submit" value="Buscar">
</form>


<?php include 'header/header.php';?>
<?php
include_once 'connections/connection.php';
// OBTENEMOS EL VALOR DE BÚSQUEDA
$busqueda = isset($_GET['buscar']) ? $_GET['buscar'] : '';

//CALCULAMOS LA SUMA DE LOS ELEMENTOS DEL CARRITO
$suma_carrito = 0;
if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
    foreach ($_SESSION['carrito'] as $producto_id => $cantidad) {
        //OBTENER EL PRECIO DEL PRODUCTO DESDE LA BASE DE DATOS
        $sql = "SELECT * FROM catalogo WHERE nombre LIKE '%" . $busqueda . "%'";
        $producto_result = $conexionServidor->query($sql);
        $producto = $producto_result->fetch_assoc();

        // CALCULAR EL SUBTOTAL DEL PRODUCTO
        $subtotal = $producto['precio'] * $cantidad;

        //SUMAR AL TOTAL DEL CARRITO
        $suma_carrito += $subtotal;
    }
}

// MOSTRAMOS EL CONTENIDO DEL CARRITO
echo '<h2>Carrito de Compras</h2>';
echo '<div class="carrito">';
if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
    echo '<table>';
    echo '<tr>';
    echo '<th>Nombre</th>';
    echo '<th>Cantidad</th>';
    echo '<th>Precio</th>';
    echo '</tr>';
    foreach ($_SESSION['carrito'] as $producto_id => $cantidad) {
        //OBTENER LOS DARTOS DEL PRODICTO DESDE LA BASE DE DATOS
        $sql = "SELECT nombre, precio FROM catalogo WHERE id = '$producto_id'";
        $producto_result = $conexionServidor->query($sql);
        $producto = $producto_result->fetch_assoc();

        echo '<tr>';
        echo '<td>' . $producto['nombre'] . '</td>';
        echo '<td>' . $cantidad . '</td>';
        echo '<td>€' . $producto['precio'] . '</td>';
        echo '</tr>';
    }
    echo '<tr>';
    echo '<td><strong>Total:</strong></td>';
    echo '<td></td>';
    echo '<td>€' . $suma_carrito . '</td>';
    echo '</tr>';
    echo '</table>';
    echo '<form method="POST" action="pago.php">';
    echo '<input type="submit" name="comprar" value="Comprar">';
    echo '</form>';
    echo '<form method="POST" action="busqueda.php">';
    echo '<input type="submit" name="vaciar_carrito" value="Vaciar Carrito">';
    echo '</form>';
} else {
    echo 'El carrito está vacío.';
}
echo '</div>';


// CONSULTAR PARA OBTENER LOS MUEBLES DEL CATÁLOGO
$sql = "SELECT * FROM catalogo WHERE nombre LIKE '%" . $busqueda . "%'";
$result = $conexionServidor->query($sql);

//MOSTRAR LOS MUEBLES EN LA PÁGINA
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="item">';
        echo '<h3>' . $row['nombre'] . '</h3>';
        echo '<p>' . $row['descripcion'] . '</p>';
        echo '<p>Precio: €' . $row['precio'] . '</p>';
        echo '<img src="' . $row['imagen'] . '" alt="Imagen del mueble" width="130px" height="100px">';
        echo '<p>Cantidad: ' . $row['cantidad'] . '</p>';
        echo '<form method="POST" action="busqueda.php">';
        echo '<input type="hidden" name="producto_id" value="' . $row['id'] . '">';
        echo '<label for="cantidad">Cantidad:</label>';
        echo '<input type="number" name="cantidad" id="cantidad" value="1" min="1" max="' . $row['cantidad'] . '" required>';
        echo '<input type="submit" value="Comprar">';
        echo '</form>';
        echo '</div>';
    }
} else {
    echo "No se encontraron muebles en el catálogo.";
}



$conexionServidor->close();
?>

</body>
</html>