<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store On Line</title>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="stylesheet" href="./css/skeleton.css">
    <link rel="stylesheet" href="./css/tooplate-ben-resume-style.css">
    <link rel="stylesheet" href="./css/galeria.css">
    <h1 style="background-color:#FAEBD7;">
</head>
<body>

<div class="contenedor">
			<header class="header">
				<div class="logo">
				<p class="iniciales-logo"></p>
        <h1 style="background-color:LightGray;">Store On Line</h1>
</div>

<?php
session_start();
  if($_POST){
    if(($_POST['usuario']=="storeonline")&&($_POST['password']=="sistema")){
      
        $_SESSION['usuario']="ok";    
        $_SESSION['nombreUsuario']="storeonline";  
        header('Location:inicio.php');
    }else{
        $mensaje="Error: El usuario o contraseña o son incorrectos";
    }
}
 
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Administrador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
          h1 {
  font-size: 30px;
}

h2 {
  font-size: 20px;
}

p {
  font-size: 10px;
}
div.a {
  text-align: center;
  
  }
    </style>
  
  <div class="container">
  <h1 style="background-color:LightGray;">
  <div class="a">
    <h2>Administrador</h2>
  <p></p>
  </div>
      <div class="row">
          <div class="col-md-12">

            <div class="card">
              <div class="card-header">
              <div class="a">
                    Login
            </div>

          <div class="col-md-4">
            <div class="card-body">

              <?php if(isset($mensaje)) {?>
              <div class="alert alert-danger" role="alert">
                <?php echo $mensaje; ?>
              </div>
              <?php } ?>  
                <form method="POST">
                  <div class = "form-group">
                    <label >Usuario</label>
                    <input type="text" class="form-control" name="usuario" placeholder="Escribe tu usuario">
                  </div>

                  <div class="form-group">
                  <label >Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Escribe tu password">
                  </div>
                <button type="submit" class="btn btn-primary">Entrar al administrador</button>
              </form>
      </h1>                                        
        </div>
      </div>
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
                            <li><a href="#">Instagram</a></li>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
      

  </body>
</html>