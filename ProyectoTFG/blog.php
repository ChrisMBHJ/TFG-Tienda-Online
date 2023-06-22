<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <style>
    body{ background-color:#FFEFD5;} 

    .midiv {
        background:#FFE4C4;
        border-radius: 10px;
    }
    </style>
</head>
<body>
    <?php include 'header/header.php';?>
    <h1><center>Blog</center></h1><br>
    <div class="container">
        <div class="midiv">
        <div class="row">
            <div class="col-md-6">
                <img src="pictures/carpintero.jpg" width="304" height="236" alt="No encuentro la imagen" class="rounded-circle align-middle">
            </div>
            <div class="col-md-6 justify-text-center">
                <h5>Somos una empresa especializada en venta de mobiliario ubicados en las Rozas de Madrid. 
                Con una amplia experiencia profesional avalada desde 1963 en el sector. Contamos con un equipo propio altamente cualificado y preparado para ofrecer la máxima calidad y eficacia en todos nuestros proyectos de carpintería madera. 
                Aquí encontrarás sillas, mesas, armarios, muebles de salon... en fin, todo lo que necesites para tu casa.
                Contamos con un servicio de envío a domicilio o recogida en nuestros almacenes.
                </h5>
            </div>
        </div>
        </div>
    </div><br><br><br>
    <div class="container">
        <div class="midiv">
        <div class="row">
            <spa class="col-md-6">
                <h5>Poseemos varios talleres de carpintería, ya que muchos clientes aprecian la calidad de la madera natural y del trabajo artesanal.
                Muchos de nuestros productos son artesanales con gran variedad de tipos de madera (Pino, Cedro, Arce..).
                Poseemos un equipo de trabajo dedicado a la restauración de cualquier mobiliario.
                Visita nuestro catálogo de productos 
                </h5>
            </spa>
            <div class="col-md-6">
                <img src="pictures/carpinteria.jpg" width="304" height="236" alt="No encuentro la imagen" class="rounded-circle">
            </div>
        </div>
    </div><br><br><br>
    <div class="container">
        <div class="midiv">
        <div class="row">
            <div class="col-md-6">
                <img src="pictures/sillas.jpg" width="304" height="236" alt="No encuentro la imagen" class="rounded">
            </div>
        <div class="col-md-6">
            <h5>Existen muchos estilos de muebles, seguramente más de los que imaginas. 
            Es posible que te guste un estilo concreto pero no sabes cómo se llama o de donde proviene y eso puede hacer que te resulte difícil encontrar el mueble ideal que andas buscando.
            Contacta con nuestro servicio de atención al cliente para cualquier duda y nuestros profesionales se pondrán en contacto para asesorarte de la mejor manera posible.
            </h5>
        </div>
    </div>
    </div><br><br><br>
    <div class="container">
        <div class="midiv">
        <div class="row">
            <div class="col-md-6 text-left">
                <h5>¿Te gusta lo que ves? Toda la colección de Covemu surge en talleres locales, de la mano de nuestros artesanos. 
                    Para ello empleamos únicamente materiales de origen sostenible que respetan el medio ambiente, 
                    desde la madera y los barnices hasta el envoltorio. Así es como producimos piezas únicas, útiles y valiosas para todos.
                </h5>
            </div>
            <div class="col-md-6">
                <img src="pictures/artesanal.jpg" width="400" height="236" alt="No encuentro la imagen" class="rounded">
            </div>
        </div>
    </div><br><br><br>
    <h2>NUESTRAS TIENDAS</h2><hr>
    <h3>Puedes encontrarnos en:</h3>
    <h4>Calle Londres, 17. P.I. Európolis 
    28232 Las Rozas, Madrid</h4>
    <div class="d-flex justify-content-center">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10204.488728188695!2d-3.897362803484267!3d40.501525745166354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4183438ca891cb%3A0x25ad6e329174d7d5!2sC.%20Londres%2C%2017%2C%2028232%20Las%20Rozas%20de%20Madrid%2C%20Madrid!5e0!3m2!1ses!2ses!4v1686760344031!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
    width="800" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="w-100"></iframe>
    </div>
    <footer>
        <!--<?php include ('footer/footer.php');?>--> <!--INCLUIMOS EL PIE DE PÁGINA -->
        &copy; <?php echo date('Y'); ?>. Todos los derechos reservados.
    </footer> 
</body>
</html>