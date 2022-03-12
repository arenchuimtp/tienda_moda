<?php 
include("../Admin/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>

<script src="../Alert/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../Alert/sweetalert.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

 <!-- ESTILO CURSOS DE PROGRAMACION -->
 <link rel="stylesheet" href="../css/style_cp.css">


<title>Insertar Datos</title>
</head>
<body>


<!-- NAVBAR -->
<?php include("../Admin/navbar.php"); ?>
<!-- END NAVBAR -->

<div class="container" style="justify-content: center; margin: 0 auto; position: relative;">

<div class="card mi_card" >

<div class="mb-4">
  <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">REGISTRO</p>
</div>

<form class="row g-3 needs-validation" action="index.php" method="POST" novalidate>
<input type="hidden" name="dato" value="insertar" >
  <div class="col-md-6">
    <label for="validationCustom01" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="validationCustom01" name="nombre"  required>
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte su nombre.
      </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Apellidos</label>
    <input type="text" class="form-control" id="validationCustom02" name="apellidos"  required>
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte sus apellidos.
      </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Localidad</label>
    <input type="text" class="form-control" id="validationCustom03" name="localidad"  required>
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte su localidad.
      </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom04" class="form-label">Teléfono</label>
    <input type="text" class="form-control" id="validationCustom04" name="telefono"  required>
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte su teléfono.
      </div>
  </div>

  <div class="col-md-12">
    <label for="validationCustom04" class="form-label">Contraseña</label>
    <input type="password" class="form-control" id="validationCustom04" name="pass"  required>
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte su teléfono.
      </div>
  </div>

  

  <div class="col-12">
    <button class="btn btn-primary" type="submit">Registrar</button>
  </div>

  <a href="login.php"><p>Iniciar sesión</p></a>

</form>
</div>

</div>










<script>
(function () {
  'use strict'
  
  var forms = document.querySelectorAll('.needs-validation')

  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>





<script type="text/javascript">
function JSalert(dato){
	swal("ACEPTADO", dato, "success");
}
</script>

<script type="text/javascript">
function JSalert_Error(dato){
  swal("ERROR", dato, "error");   
  }
</script>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>

</body>
</html>









<?php 
//insertamos los datos///////////////////////////
  if(!empty($_POST))
  {

if ($_POST["dato"] == 'insertar'){
 
  //generamos un token
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $password = "";
    for($i=0;$i<80;$i++) {
    $password .= substr($str,rand(0,64),1);
    }
    $token = $password;

$key = 'I1NiIsInR5cCI0NjbEwvRGtwbGhXY2xML0RrcJzdWIiOiIxMjM0NTY3O';
$pass = $_POST["pass"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$localidad = $_POST["localidad"];
$telefono = $_POST["telefono"];
$query = "INSERT INTO datos_usuario_cp (nombre,apellidos,localidad,telefono,pass,token,fecha)
VALUES ('$nombre' ,'$apellidos', '$localidad', '$telefono' ,to_base64(AES_ENCRYPT('$pass','$key')), '$token', '".date('Y-d-m')."')";
$result = mysqli_query($conexion,$query) or die(mysqli_error());


if ( $result === false ){
//return response('400','Algo ha ido mal!','KO');
//echo 'Algo ha ido mal';
echo '
<script>
  JSalert_Error("Se ha producido un error");
</script>
';
}
//echo 'Todo OK';
echo '
<script>
  JSalert("Insertado correctamente");
</script>
';
//return response('200','OK','OK');
//header("Location: ".$_SERVER['HTTP_REFERER']."");

}
  }

?>

