<?php
include'global/configuracion.php';
include'global/conexion.php';
include'carrito.php';
include'templates/cabecera.php';
?>

<?php

print_r($_POST);

if($_POST){

    $IDVENTA=$_POST['IDVENTA'];
    $IDPRODUCTO=$_POST['IDPRODUCTO='];
        
    $sentencia=$pdo->prepare("SELECT * FROM tbldetalleventa,
                                WHERE IDVENTA=:IDVENTA
                                AND IDPRODUCTO=:IDPRODUCTO
                                AND descargado<1");

                $sentencia->bindParam(":IDVENTA",$IDVENTA);
                $sentencia->bindParam(":IDPRODUCTO",$IDPRODUCTO);
                $sentencia->execute();

    $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    print_r($listaProductos);
}

?>


<?php include 'templates\pie.php';?>