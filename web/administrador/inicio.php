<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
<style>
body {
  background-color: #F5F5DC;
  border: 1px solid;
  padding: 10px;
  box-shadow: 5px 10px;
}
</style>
</head>
<body>
  <?php $url="http://".$_SERVER['HTTP_HOST']."/administrador" ?>
  			
</header>

            <div class="container">
                <div class="row">
                <div class="menu">
                <a href="">Administrador</a>
                <a href="<?php echo $url;?>#inicio.php">Inicio</a>
                <a href="<?php echo $url;?>//seccion/productos.php">Productos</a>
                <a href="<?php echo $url;?>//seccion/cerrar.php">Cerrar</a>
                    <div class="col-md-12">
                        <div class="jumbotron">
                            <h1 class="display-3">Bienvenido Administrador Store On Line</h1>
                            <p class="lead">Vamos a administrar nuestros productos en el Sitio Web</p>
                            <hr class="my-2">
                            <p class="lead">
                               <a class="btn btn-primary btn-lg" href="seccion/productos.php" role="button">Administrar productos</a>
                            </p>
                        </div>
                    </div>
                
                </div>
            </div> 
            <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Redes Sociales</h3>
                        <ul>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Whatsapp</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 text">
                        <h3>Contacto y Servicio al Cliente</h3>
                        <ul>
                        <p>Cl 100 # 95-78 Madrigal, Bogotá, Colombia.
                        Cel: 3202058198 o (000) De Lun a Viernes 8:00 a.m. a 8:00 p.m.- Sábados y Domingos de 8:00 am a 5:00 pm jornada continua. Festivos estaremos recargando baterías.</p>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Store On Line_Palkem.com</h3>
                        <p>Palkem.com © 2022 Todos los Derechos Reservados. Esta compañia se dedica a la venta y comercialización de ropa, calzado y accesorios para poblacion infantil, juvenil, mujer y hombre. info@palkem.com.co</p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">Palkem.com © 2022</p>
            </div>
        </footer>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
      </body>
</html>         

