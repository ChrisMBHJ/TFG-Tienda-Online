<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"><!--siempre divide el ancho en 12 partes-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <style>body{background-color:#FFEFD5;}</style>
</head>
<body>
    <?php include 'header/header.php';?>
    <form action="connections/conservice.php" class="container mx-5" method="POST">
    <div class="container">
    <div class="row">
    <div class="col">
        <h1>Contacto</h1>    
            <div class="row">
                <div><!--CREAMOS EL FORMULARIO PARA LA PARTE DE CONTACTO DE NUESTRA PÁGINA -->
                    <label for="asunto">Asunto</label><br>
                    <select id="asunto" name="asunto" required>
                        <option value="0">--Selecciona una opción--</option>
                        <option value="Servicio de atención al cliente">Servicio de atención al cliente</option>
                        <option value="Reclamación">Reclamación</option>
                        <option value="Devolución">Devolución</option>
                        <option value="Otros..">Otros..</option>
                    </select>
                </div>
                <div class="mt-3 col-md-5">
                    <label for="email">Correo electrónico</label>
                    <input type="text" name="email" required class="form-control">
                </div>
                <div class=" row mt-3 col-md-5 ">
                    <label for="referencia">Referencia del pedido</label>
                    <input type="text" name="referencia" required class="form-control">
                </div>
                <div class="mt-2">
                    <label for="archivo">Archivo</label><br>
                    <input type="submit" value="Seleccionar archivo"> Ningún archivo seleccionado
                </div>
                <div class="mt-2">   
                    <label for="mensaje">Mensaje</label>
                    <textarea type="password" name="mensaje" required class="form-control"></textarea><br>
                </div><br>
                <div class="form-group mb-2">
                        <label for="captcha">Ingrese el captcha:</label>
                        <input type="text" name="captcha" id="captcha" required>
                </div>
                    <div class="captcha-container"><img src="captcha.php" alt="captcha image" class="captcha-image" width="200" height="50"></div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success mt-4">ENVIAR</button>
                </div>
                
            </div>
        </div>
        </form>
</body>
<footer>
<?php include ('footer/footer.php');?>
</footer>
</html>