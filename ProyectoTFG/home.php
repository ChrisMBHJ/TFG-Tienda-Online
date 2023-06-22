

<?php
//INICIAMOS LA SESION CON EL USUARIO
session_start();
$usuario=$_SESSION['usuario'];
echo "<h1>Bienvenid@ $usuario </h1>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="homeestilo.css">
    <style>body{background-color:#FFEFD5;}</style>
</head>
<body>
<?php include ('header/header.php');?>
<div id="principal">
    <div id="mensaje">
        <p><h1>Muchas Gracias por registrate en nuestra página.</h1></p><br>
        <p><h2>Te damos la bienvenido a este sitio web donde pordrás encontrar una variadad de muebles
        para decorar tu hogar.
        Para nosotros el trato con el cliente es vital, por ello hemos implementado
        un apartado de contacto donde podréis contactar con nostros con total comodidad
        cuando tengáis el más minimo problema con alguno de nuestros productos así como información acerca de los mismos.
        Por nuestra parte te deseamos un gran día y si estás list@ ya puedes comenzar con tus compras
        y decorar tu vida.
    </h2></p>
    </div>
</div>
</body>
<footer>
<?php include ('footer/footer.php');?>
</footer>
</html>