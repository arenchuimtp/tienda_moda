<?php
session_start();

$mensaje="";

if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){

        case 'Agregar':

            if(is_numeric( openssl_decrypt($_POST['Id'],COD,KEY))){ 
                $Id=openssl_decrypt($_POST['Id'],COD,KEY);
                $mensaje.="ok ID correcto".$Id."<br/>";
        
            }else{
                $mensaje.="upss ID incorrecto".$ID."<br/>";
            }
            if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
                $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
                $mensaje.="OK NOMBRE".$NOMBRE."<br/>";
                }else{ $mensaje.="Upss..algo pasa con la nombre"."<br/>";  break;}
            
            if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
                $mensaje.="OK CANTIDAD".$CANTIDAD."<br/>";
            }else{  $mensaje.="Upss..algo pasa con la cantidad"."<br/>";  break;}

            if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
                $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
                $mensaje.="OK PRECIO".$PRECIO."<br/>";
            }else{ $mensaje.="Upss..algo pasa con la precio"."<br/>";  break;}    

        if(!isset($_SESSION['CARRITO'])){ 

            $producto=array(
            'ID'=>$ID,
            'NOMBRE'=>$NOMBRE,
            'CANTIDAD'=>$CANTIDAD,
            'PRECIO'=>$PRECIO
            );
            $_SESSION['CARRITO'][0]=$producto;
            $mensaje= "Producto agregado al carrito";
        
        }else{

           $IdProductos=array_column($_SESSION['CARRITO'],"Id");     

            if(in_array($Id,$IdProductos)){
                echo "<script>alert('El producto y aha sido seleccionado...');</script>";
                $mensaje= "";
            }else{
                $NumeroProductos=count($_SESSION['CARRITO']);
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                    );

                    $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                    $mensaje= "Producto agregado al carrito";
                }

                $mensaje= print_r($_SESSION,true);
            }
        
        
        
        

        break;
        case 'Eliminar':
            if(is_numeric( openssl_decrypt($_POST['ID'],COD,KEY ))){ 
                $ID=openssl_decrypt($_POST['ID'],COD,KEY );

            foreach($_SESSION['CARRITO'] as $indice=>$producto)  {
                if($producto['ID']==$ID){
                    unset($_SESSION['CARRITO'][$indice]);
                    echo "<script>alert('Elemento borrado...');</script>";
                }
            }
                $mensaje.="ok ID correcto".$ID."<br/>";
            
        }else{
            $mensaje.="upss ID incorrecto".$ID."<br/>";
        }
            
        break;

    }
}

?>

