<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  width: 80%;
  background-color: lightblue;
  border-left: 15px solid red;
  border: 1px solid black;
  margin-top: 100px;
  margin-bottom: 100px;
  margin-right: 80px;
  margin-left: 90px;
  background-color:#FAEBD7;
}

td, th {
  border: 2px solid #dddddd;
  text-align: left;
  padding: 2px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<body style="background-color:#B0C4DE;">


<h1>Productos Store On Line</h1>
<?php $url="http://".$_SERVER['HTTP_HOST']."/administrador" ?>	
</header>
<div class="newspaper">
<div class="container">
<table class="center">
                <div class="row">
                <div class="menu">
                <a href="">Administrador</a>
                <a href="<?php echo $url;?>//inicio.php">Inicio</a>
                <a href="<?php echo $url;?>//seccion/productos.php">Productos</a>
                <a href="<?php echo $url;?>//seccion/cerrar.php">Cerrar</a>
<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:""; 

include("..\config\bd.php"); 
$sentenciaSQL= $conexion->prepare("SELECT id, Nombre, imagen FROM productos");
$sentenciaSQL->execute();
$listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
switch ($accion){
        case "Agregar":
            $sentenciaSQL= $conexion->prepare("INSERT INTO productos (Nombre,imagen) VALUES (:Nombre,:imagen);");
            $sentenciaSQL->bindParam(':Nombre',$txtNombre);

            $fecha= new DateTime();
            $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];
            if($tmpImagen!=""){
                move_uploaded_file($tmpImagen,"..\..\img".$nombreArchivo);            
            }
            $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
            $sentenciaSQL->execute();
            header("Location:productos.php");
            break; 

        case "Modificar":

            $sentenciaSQL= $conexion->prepare("UPDATE productos SET Nombre=:Nombre WHERE Id=:id");
            $sentenciaSQL->bindParam(':Nombre',$txtNombre);
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();

            if($txtImagen!=""){

                $fecha= new DateTime();
                $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
                $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

                if ($tmpImagen!="") {
                    move_uploaded_file($tmpImagen,"..\..\img".$nombreArchivo);
                }            

                $sentenciaSQL= $conexion->prepare("SELECT imagen FROM productos WHERE Id=:id");;
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);  

                if( isset($libro["imagen"]) &&($producto["imagen"]!="imagen.jpg") ){
        
                    if(file_exists("..\..\img".$producto["imagen"])){
                        unlink("..\..\img".$producto["imagen"]);
                    }
        
                }

                $sentenciaSQL= $conexion->prepare("UPDATE productos SET imagen=:imagen WHERE Id=:id");
                $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
            }
            header("Location:productos.php");
            break;    

        case "Cancelar":
            header("Location:productos.php");
            break;  

        case "Seleccionar":

                $sentenciaSQL= $conexion->prepare("SELECT * FROM productos WHERE Id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute();
                $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

                $txtNombre=$producto['Nombre'];
                $txtImagen=$producto['imagen'];

                // echo "Presionado boton Seleccionar";
                break;

        case "Borrar":

            $sentenciaSQL= $conexion->prepare("SELECT imagen FROM productos WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $productos =$sentenciaSQL->fetch(PDO::FETCH_LAZY);  
 
            if(isset($productos["imagen"]) &&($productos["imagen"]!="imagen.jpg") ){

                if(file_exists("..\..\img".$productos["imagen"])){

                        unlink("..\..\img".$productos["imagen"]);
            }

        }
          
                $sentenciaSQL= $conexion->prepare("DELETE FROM productos WHERE id=:id");
                $sentenciaSQL->bindParam(':id',$txtID);
                $sentenciaSQL->execute(); 
                header("Location:productos.php");
                break;
}
$sentenciaSQL= $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$producto=$sentenciaSQL->fetch(PDO::FETCH_ASSOC);
?>

  
<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Datos del Producto
        </div>

        <div class="card-body">
           
        <form method="POST" enctype="multipart/form-data" >

    <div class="form-group">
    <label for="txtID">ID:</label>
    <input type="text" required readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
    </div>

    <div class="form-group">
    <label for="txtNombre">Nombre:</label>
    <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre del producto">
    </div>

    <div class="form-group">
    <label for="txtNombre">Imagen:</label>

    <?php echo $txtImagen; ?>
    <?php if($txtImagen!=""){?>

        <img class="img-thumbnail rounded" src="..\..\img\<?php echo $txtImagen;?>" width="50" alt="" srcset="">

    <?php } ?>

    <input type="file" class="form-control" name="txtImagen" id="txtImagen" class="form-control" placeholder="Nombre del producto">
    </div>

    
        <div class="btn-group" role="group" aria-label="">
            <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-succes">Agregar</button>
            <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Modificar" class="btn btn-warning">Modificar</button>
            <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Cancelar" class="btn btn-info">Cancelar</button>
        </div>

      
</form>
    
    </div>

    </div>


</div>
<div class="col-md-7">
        Tabla de Productos
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
             </tr>
        </thead>
        <tbody>
        <?php foreach($listaProductos as $producto ) { ?>
        <tr>
            <td><?php echo $producto['id']; ?></td>
            <td><?php echo $producto['Nombre']; ?></td>
            <td>

            <img class="img-thumbnail rounded" src="../../img/<?php echo $producto['imagen']; ?>" width="50" alt="" srcset="">

            </td>      
            
            <td>
            <form method="post">

                <input type="hidden" name="txtID" id="txtID" value="<?php echo $producto['id']; ?>" />
                <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
                <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>

            </form>

   
            
            
     <?php } ?>
        </tbody>
    </table>
    </div>
</div>
</body>
</html>



