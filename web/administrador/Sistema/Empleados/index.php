<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtApellido=(isset($_POST['txtApellidoP']))?$_POST['txtApellidoP']:"";
$txtApellidoM=(isset($_POST['txtApellidoM']))?$_POST['txtApellidoM']:"";
$txtCorreo=(isset($_POST['txtCorreo']))?$_POST['txtCorreo']:"";
$txtTelefono=(isset($_POST['txtTelefono']))?$_POST['txtTelefono']:"";
$txtDireccion=(isset($_POST['txtDireccion']))?$_POST['txtDireccion']:"";
$txtFoto=(isset($_FILES['txtFoto']["name"]))?$_FILES['txtFoto']["name"]:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

$error=array();

$accionAgregar="";
$accionModificar=$accionElimininar=$accionCancelar="disabled";
$mostrarModal=true;

include ("../conexion/conexion.php");

switch($accion){
    case "btnAgregar":

        if($txtNombre==""){
            $error['Nombre']="Escribe el nombre";
        }
        if($txtApellidoP==""){
            $error['ApellidoP']="Escribe el apellido";
        }
        if($txtApellidoM==""){
            $error['ApellidoM']="Escribe el apellido";
        }
        if($txtCorreo==""){
            $error['Correo']="Escribe el correo";
        }
        if($txtDireccion==""){
            $error['Direccion']="Escribe el Direccion";
        }
        if($txtTelefono==""){
            $error['Telefono']="Escribe el Telefono";
        }
        if($txtFoto==""){
            $error['Foto']="Escribe el Foto";
        }
         if(count($error)>0){
             $mostrarModal=true;
             break;
         }

        $sentencia=$conexion->prepare(" INSERT INTO `empleados` (Nombre,ApellidoP,ApellidoM,Correo,Direccion,Telefono,Foto) VALUES (:Nombre;:Nombre,:ApellidoP,:ApellidoM,:Correo,:Telefono,:Direccion,:Foto) ");
        
        $sentencia->bindParam(':Nombre',$txtNombre);
        $sentencia->bindParam(':ApellidoP',$txtApellidoP);
        $sentencia->bindParam(':ApellidoM',$txtApellidoM);
        $sentencia->bindParam(':Correo',$txtCorreo);
        $sentencia->bindParam(':Direccion',$txtDireccion);
        $sentencia->bindParam(':Telefono',$txtTelefono);

        $Fecha= new DateTime();
        $nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES["$txtFoto"]["name"]:"imagen.jpg";

        $tmpFoto= $_FILES["txtFoto"]["tmp_name"];

        if($tmpFoto!=""){
            move_uploaded_file($tmpFoto,"../empleados/".$nombreArchivo);
        }

        $sentencia->bindParam(':Foto',$txtFoto);
        $sentencia->execute();
        header('Location: index.php');

    break;    
    case "btnModificar":

        $sentencia=$conexion->prepare(" UPDATE `empleados` SET
        Nombre=:Nombre,
        ApellidoP=:ApellidoP,
        ApellidoM=:ApellidoM,
        Correo=:Correo,
        Telefono=:Telefono,
        Direccion=:Direccion,
        Foto=:Foto WHERE id=:id");

        $sentencia->bindParam(':Nombre',$txtNombre);
        $sentencia->bindParam(':Nombre',$txtApellidoP);
        $sentencia->bindParam(':Nombre',$txtApellidoM);
        $sentencia->bindParam(':Nombre',$txtCorreo);
        $sentencia->bindParam(':Nombre',$txtTelefono);
        $sentencia->bindParam(':Nombre',$txtDireccion);

        $sentencia->bindParam(':id',$txtID);
        $sentencia->execute();
        
        $Fecha= new DateTime();
        $nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$_FILES["$txtFoto"]["name"]:"image/*";
        
        $tmpFoto= $_FILES["txtFoto"]["tmp_name"];
          
        if($tmpFoto!=""){
            move_uploaded_file($tmpFoto,"../../img/empleados/".$nombreArchivo);
        }
        $sentencia=$conexion->prepare(" SELECT Foto FROM empleados  WHERE id=:id");
        $sentencia->bindParam(':id',$txtID);
        $sentencia->execute();  
        $empleado=$sentencia->fetch(PDO::FETCH_LAZY);
        print_r($empleado);
        
        if(isset($empleado["Foto"])){
            if(file_exists("../../img/empleados/".$empleado["Foto"])){

            if($empleado['Foto']!="imagen.jpg"){
                unlink("../../img/empleados/".$empleado["Foto"]);
                }
            
            }
         }

         $sentencia=$conexion->prepare(" UPDATE empleados SET  Foto=:Foto
         WHERE id=:id");
         $sentencia->bindParam(':Foto',$nombreArchivo);
         $sentencia->bindParam(':Foto',$txtID);
         $sentencia->execute();


        header('Location: index.php');

        echo $txtID;
        echo"Presionaste btnModificar";
    break;

    case "btnEliminar":
        $sentencia=$conexion->prepare(" SELECT Foto FROM `empleados` WHERE id=:id");
        $sentencia->bindParam(':id',$txtID);
        $sentencia->execute();
        $empleado=$sentencia->fetch(PDO::FETCH_LAZY);
        print_r($empleado);

        if(isset($empleado["Foto"])){
            if(file_exists("../../img/empleados/".$empleado["Foto"])){
            unlink("../../img/empleados/".$empleado["Foto"]);
            }
         }
       
        $sentencia=$conexion->prepare(" DELETE FROM `empleados` WHERE id=:id");
        $sentencia->bindParam(':id',$txtID);
        $sentencia->execute();
        header('Location: index.php');
        echo $txtID;
        echo"Presionaste btnEliminar";
       
    break;

    case "btnCancelar":
        header('Location: index.php');
    break;
    case "Seleccionar":

        $accionAgregar="disabled";
        $accionModificar=$accionElimininar=$accionCancelar="";
        $mostrarModal=true;

        $sentencia=$conexion->prepare(" SELECT * FROM `empleados` WHERE id=:id");
        $sentencia->bindParam(':id',$txtID);
        $sentencia->execute();
        $empleado=$sentencia->fetch(PDO::FETCH_LAZY);

        $txtNombre=$empleado['Nombre'];
        $txtNombre=$empleado['ApellidoP'];
        $txtNombre=$empleado['ApellidoM'];
        $txtNombre=$empleado['Correo'];
        $txtNombre=$empleado['Telefono'];
        $txtNombre=$empleado['Direccion'];
        $txtNombre=$empleado['Foto'];

    break;
    
}
    $sentencia= $conexion->prepare("SELECT * FROM `empleados` WHERE 1");
    $sentencia->execute();
    $listaEmpleados=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    print_r($listaEmpleados);

?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://mazcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <style>
        table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 70%;
}

td, th {
  border: 1px solid #ffcccc;
  text-align: left;
  padding: 4px;
}

tr:nth-child(even) {
  background-color:  #ffe6e6;
}
</style>

</head>
<body>
 
<div class="container">
    <form action="" method="post" enctype="multipart/form-data" >

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form row">
        <input type="hidden" required name="txtID" value="<?php echo $txtID;?>" placeholder="" id="TxtID" require="">

        <div class="form-group col-md-4">
        <label for="">Nombre(S):</label>
        <input type="text" class="form-control" name="txtNombre" required  value="<?php echo $txtNombre;?>" placeholder="" id="TxtNombre" require="">
        <br>
        </div>
    
        <div class="form-group col-md-4">
        <label for="">Apellido Paterno:</label>
        <input type="text" class="form-control" name="txtApellidoP" required value="<?php echo $txtApellidoP;?>" placeholder="" id="TxtApellidoP" require="">
        <br>
        </div>

        <div class="form-group col-md-4">
        <label for="">Apellido Materno:</label>
        <input type="text" class="form-control" name="txtApellidoM" required value="<?php echo $txtApellidoM;?>" placeholder="" id="TxtApellidoM" require="">
        <br>
        </div>

        <div class="form-group col-md-12">
        <label for="">Correo:</label>
        <input type="email" class="form-control" name="txtCorreo" required value="<?php echo $txtCorreo;?>" placeholder="" id="TxtCorreo" require="">
        <br>
        </div>
        
        <div class="form-group col-md-12">
        <label for="">Direccion:</label>
        <input type="text" class="form-control" name="txtDireccion" required value="<?php echo $txtDireccion;?>" placeholder="" id="TxtDireccion" require="">
        <br>
        </div>

        <div class="form-group col-md-4">
        <label for="">Telefono:</label>
        <input type="text" class="form-control" name="txtTelefono" required value="<?php echo $txtTelefono;?>" placeholder="" id="TxtTelefono" require="">
        <br>
        </div>
        
        <div class="form-group col-md-12">
        <label for="">Foto:</label>
        <?php if($txtFoto!="") {?>
        <br/>
        <img class="img-thumbnail rounded mx-auto d-block" width="100px" src="../img/empleados/<?php echo $txtFoto?>" />
        <br/>
        <br> 
        <?php }?>

        <input type="file" class="form-control" accept="image/*" name="txtFoto" value="<?php echo $txtFoto;?>" placeholder="" id="TxtFoto" require="">
        <br>
        </div>

        </div>
      </div>
      <div class="modal-footer">
        <button value="btnAgregar" <?php echo $accionAgregar;?> class="btn btn-success" type="submit" name="accion">Agregar</button>
        <button value="btnModificar" <?php echo $accionModificar;?> class="btn btn-warning" type="submit" name="accion">Modificar</button>
        <button value="btnEliminar" <?php echo $accionElimininar;?> class="btn btn-danger" type="submit" name="accion">Eliminar</button>
        <button value="btnCancelar" <?php echo $accionCancelar;?> class="btn btn-primary" type="submit" name="accion">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<br/>
<br/>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar registro +
</button>
<br>
<br>

    </form>

<div class="row">

    <table class="table table-hover table-bordered">

        <thead class="thead-dark">    
            <tr>
                <th>Foto</th>
                <th>Nombre completo</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Acciones</th>
            </tr>
        </thead>
    <?php foreach($listaEmpleados as $empleado){ ?>
            <tr>
                <td><img class="img-thumbnail" width="100px" src="/web/img/<?php echo $empleado['Foto']; ?>"/></td>
                <td><?php echo $empleado['Nombre']; ?> <?php echo $empleado['ApellidoP']; ?> <?php echo $empleado['ApellidoM']; ?></td>
                <td><?php echo $empleado['Correo']; ?></td>
                <td><?php echo $empleado['Telefono']; ?></td>
                <td><?php echo $empleado['Direccion']; ?></td>
                
                <form action="" method="post">
                <input type="hidden" name="txtID" value="<?php echo $empleado['ID']; ?>">
                <input type="submit" value="Seleccionar" class="btn btn-info" name="accion"> 
                <button value="btnEliminar" type="submit" class="btn btn-danger" name="accion">Eliminar</button> 

                
                </form>


                </td>
            <tr>

    <?php } ?>
    
    </table>

</div>   
<?php if($mostrarModal){?>
    <script>
        $('#exampleModal').modal('show');
    </script>

<?php }?>
</div>
</body>
</html>