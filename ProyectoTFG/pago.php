<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pagoestilo.css">
    <title>Pasarela de Pago</title>
</head>
<body>
<?php include ('header\header.php');?>

<!--CREAMOS EL FORMULARIO CON EL QUE REALIZAREMOS EL PAGO -->
<form action="procesar_pago.php" method="post">
<h1>Pasarela de Pagos</h1>
  <div class="payment-methods">
  </div>
  <label for="nombre">Nombre:</label>
  <input type="text" id="nombre" name="nombre" placeholder="Nombre completo del titular" required>

  <label for="tarjeta">Número de tarjeta:</label>
  <input type="text" id="tarjeta" name="tarjeta" placeholder="Número de la tarjeta" required>

  <label for="fecha">Fecha de vencimiento:</label>
  <input type="text" id="fecha" name="fecha" placeholder="--/--" required>

  <label for="cvv">Código de Seguridad</label>
  <input type="text" id="cvv" name="cvv" placeholder="CVV" required>

  <input type="submit" value="Pagar">
  <img id="fotopie" src="pictures/metodosdepago.png" alt="Imagen" width="100%" heigth="150px";>
</form>
</body>
<footer>
    <?php include ('footer/footer.php');?>
</footer>
</html>