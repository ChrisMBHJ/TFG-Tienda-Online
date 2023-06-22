<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"><!--siempre divide el ancho en 12 partes-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <style>body{ background-color:#FFEFD5;}</style>
</head>
<body>
<?php include 'header/header.php';?><!--AGREGAMOS EL ENCABEZADO -->
<form action="connections/conlogin.php" class="container mx-5" method="POST"><!--CREAMOS EL FORMULARI PARA EL LOGIN CON BOOTSTRAP -->
            <h1>Inicio de sesión</h1>
            <div class="row">
                <div>
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" placeholder="Introduce tu nombre de usuario" required class="form-control">
                </div>
                <div>
                    <label for="password">Contraseña</label>
                    <input type="text" name="password" placeholder="Introduce tu contraseña" required class="form-control">
                </div>
                <div><button type="submit" class="btn btn-success mt-4">ENVIAR</button>
                <button type="reset" class="btn btn-secondary mt-4 mx-3">BORRAR</button>
            </div>
        </form>
</body>
<footer>
<?php include ('footer/footer.php');?><!--CREAMOS EL PIÉ DE PÁGINA -->
</footer>
</html>