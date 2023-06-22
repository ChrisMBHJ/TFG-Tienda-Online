<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"><!--siempre divide el ancho en 12 partes-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <style>body{ background-color:#FFEFD5;}</style>
</head>
<body>
<?php include 'header/header.php';?>
<form action="connections/conregister.php" class="container mx-5" method="POST">
    <div class="container">
    <div class="row">
    <div class="col">
        <h2>Formulario de Registro</h2> 
        <p>Rellene los datos obligatorios.</p>    
            <div class="row">
                <div><!--CREAMOS LE FORMULARIO QUE DA LUGAR AL REGISTRO Y CON LA CONEXION CORRESPONDIENTE A LA BD -->
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" placeholder="Introduce tu nombre" required class="form-control">
                </div>
                <div>
                    <label for="nombre">Apellido</label>
                    <input type="text" name="apellido" placeholder="Introduce tu apellido" required class="form-control">
                </div>
                <div>
                    <label for="usuario">Nombre de usuario</label>
                    <input type="text" name="usuario" placeholder="Introduce tu nombre de usuario" required class="form-control">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="mail" name="email" placeholder="example@example.com" required class="form-control">
                </div>
                <div>   
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" placeholder="Introduce tu contraseña" required class="form-control"><br>
                </div>
                <div class="form-group mb-2">
                        <label for="captcha">Ingrese el captcha:</label>
                        <input type="text" name="captcha" id="captcha" required>
                </div>
                    <div class="captcha-container"><img src="captcha.php" alt="captcha image" class="captcha-image" width="200" height="50"></div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success mt-4">ENVIAR</button>
                    <button type="reset" class="btn btn-secondary mt-4">BORRAR</button>
                </div>
            </div>
        </div>
        </form>
</body>
<footer>
<?php include ('footer/footer.php');?>
</footer>
</html>