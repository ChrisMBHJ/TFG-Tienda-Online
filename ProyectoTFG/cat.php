<?php 
session_start();
include_once 'connections/connection.php';

if ($conexionServidor->connect_error) {
    die("Error al conectar a la base de datos: " . $conexionServidor->connect_error);
}

// VERIFICAR SI SE HA ENVIADO UN FORMULARIO DE COMPRA
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['producto_id']) && isset($_POST['cantidad'])) {
        //OBTENER EL ID DEL PRODUCTO Y LA CANTIDAD DESDE EL FORMULARIO
        $producto_id = $_POST['producto_id'];
        $cantidad = $_POST['cantidad'];

        //VERIFICAMOS SI EL PRODUICTO TA ESTÁ EN EL CARRITO
        if (isset($_SESSION['carrito'][$producto_id])) {
            //ACTUALIZAMOS LA CANTIDAD
            $_SESSION['carrito'][$producto_id] += $cantidad;
        } else {
            //AGREGAMOS EL PRODUCTO AL CARRITO
            $_SESSION['carrito'][$producto_id] = $cantidad;
        }

        //REDIRECCIONAR AL CATALOGO DESPUES DE AGREGAR EL PRODUCTO
        header('Location: cat.php');
        exit;
    }
}

// VERIFICAR SI SE HA ENVIADO FORMULARIO DE VACIAR EL CARRITO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['vaciar_carrito'])) {
        //VACIAR EL CARRITO
        unset($_SESSION['carrito']);

        // REDIRECCIONAMOS AL CATALOGO DEAPUES DE VACIAR EL CARRITO
        header('Location: cat.php');
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
<!-- CÓDIGO COMENTADO. SOLO PARA ADMINISTRADORES 
<form method="POST" action="agregar_mueble.php">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" required></textarea>

    <label for="precio">Precio:</label>
    <input type="number" name="precio" id="precio" step="0.01" required>

    <label for="imagen">Imagen:</label>
    <input type="text" name="imagen" id="imagen" required>

    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" id="cantidad" required>

    <input type="submit" value="Agregar">
</form><br>
-->


<!-- FORMULARIO DE LA BÚSQUEDA AVANZADA CON OPERADOR TERNARIO. -->
<form method="GET" action="busqueda.php">
    <label for="buscar">Buscar por nombre:</label>
    <input type="text" name="buscar" id="buscar" value="<?php echo isset($_GET['buscar']) ? $_GET['buscar'] : ''; ?>">
    <input type="submit" value="Buscar">
</form>


<?php include 'header/header.php';?>
    <h1>Catálogo de muebles</h1>
   <?php include_once 'connections/connection.php';?><!--LLAMAMOS A LA CONEXION -->
   <?php
   if ($conexionServidor->connect_error) {
    die("Error al conectar a la base de datos: " . $conexionServidor->connect_error);
}

// CALCULAR LA SUMA DE LOS ELEMENTOS DEL CARRITO
$suma_carrito = 0;
if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
    foreach ($_SESSION['carrito'] as $producto_id => $cantidad) {
        // OBENER EL PRECIO DEL PRODUCTO DESDE LA BD
        $sql = "SELECT precio FROM catalogo WHERE id = '$producto_id'";
        $producto_result = $conexionServidor->query($sql);
        $producto = $producto_result->fetch_assoc();

        // CALCULAMOS EL SUBTOTAL
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
        // OBTENEMOS LOS DATOS DEL PRODUCTO DESDE LA BD
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
    echo '<form method="POST" action="cat.php">';
    echo '<input type="submit" name="vaciar_carrito" value="Vaciar Carrito">';
    echo '</form>';
} else {
    echo 'El carrito está vacío.';
}
echo '</div>';

// CONSULTA PARA OBTENER TODOS LOS MUEBLES DEL CATALOGO
$sql = "SELECT * FROM catalogo";
$result = $conexionServidor->query($sql);

if ($result->num_rows > 0) {
    // MOSTRAMOS LOS MUEBLES
    while ($row = $result->fetch_assoc()) {
        echo '<div class="item">';
        echo '<h3>' . $row['nombre'] . '</h3>';
        echo '<p>' . $row['descripcion'] . '</p>';
        echo '<p>Precio: €' . $row['precio'] . '</p>';
        echo '<img src="' . $row['imagen'] . '" alt="Imagen del mueble" width="130px" height="100px">';
        echo '<p>Cantidad: ' . $row['cantidad'] . '</p>';
        echo '<form method="POST" action="cat.php">';
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