<?php
print_r($_GET);
include'global/configuracion.php';
include'global/conexion.php';
include'carrito.php';
include'templates/cabecera.php';
?>
<?php 

$ClienteID="AXEFE6tdtCmldaRVGNdQkdTGwHitD3ji1jn1Jbkq1XtvldfF9NQwq6_LVB2QHp2vKBZpN3OGnduocZpR";
$Secret="EGrsou4gyonmP-Ho7j3mt3FjK1oKSgN1yiALsxWSA9C_BcqTuRspHvIZNoqNlRhm2kSwGIWg3hQw02tn";

    $Login= curl_init("https://api-m.sandbox.paypal.com/v1/oauth2/token");

    curl_setopt($Login,CURLOPT_RETURNTRANSFER,TRUE);

    curl_setopt($Login,CURLOPT_USERPWD,$ClienteID.":".$Secret);

    curl_setopt($Login,CURLOPT_POSTFIELDS,"grant_type=client_credentials");

    $Respuesta=curl_exec($Login);

    print_r($Respuesta);
    
    $objRespuesta=json_decode($Respuesta);

    $AccessToken=$objRespuesta->access_token;

    $venta= curl_init("https://api-m.sandbox.paypal.com/v1/payments/payment/".$_GET['paymentID']);

    curl_setopt($venta,CURLOPT_HTTPHEADER,array("Content-Type: application/json","Authorization: Bearer ".$AccessToken));

    curl_setopt($venta,CURLOPT_RETURNTRANSFER,TRUE);

    $RespuestaVenta=curl_exec($venta);

    $objDatosTransaccion=json_decode($RespuestaVenta);

    $state=$objDatosTransaccion->state;
    $email=$objDatosTransaccion->payer->payer_info->email;

    $total = $objDatosTransaccion->transactions[0]->amount->total;
    $currency = $objDatosTransaccion->transactions[0]->amount->currency;
    $custom = $objDatosTransaccion->transactions[0]->amount->custom;

    print_r($custom);

    $clave=explode("#",$custom);

    $SID=$clave[0];
    $claveVenta=openssl_decrypt($clave[1],COD,KEY);

    curl_close($venta);
    curl_close($Login);

    if($state=="approved"){
          $mensajePaypal="<h3>Pago aprobado</h3>";

          $sentencia=$pdo->prepare("UPDATE `tblventas` 
                SET `PaypalDatos` =:PaypalDatos,
                'status' = 'aprobado'
                WHERE `tblventas`.`ID` = :ID;");

        $sentencia->bindParam(":ID",$claveVenta);
        $sentencia->bindParam(":PaypalDatos",$RespuestaVenta);
        $sentencia->execute();

        $sentencia=$pdo->prepare("UPDATE `tblventas` SET status='completo'
                                    WHERE ClaveTransaccion=:ClaveTransaccion
                                    AND Total=:TOTAL
                                    AND ID=:ID");

            $sentencia->bindParam(':ClaveTransaccion',$SID);
            $sentencia->bindParam(':TOTAL',$total);
            $sentencia->bindParam(':ID',$claveVenta);
            $sentencia->execute();

            $completado=$sentencia->rowCount();

    }else{
            $mensajePaypal="<h3>Hay un problema con el pago</h3>";

    }
       
?>

<div class="jumbotron">

    <h1 class="display-4">Listo!</h1>

    <hr class="my-4">

    <p class="lead"><?php echo $mensajePaypal; ?></p>
    
    <p>
    <?php

    if($completado>=1){
        
        $sentencia=$pdo->prepare("SELECT * FROM tbldetalleventa,productos
        WHERE tbldetalleventa.IDPRODUCTO=productos.ID 
        AND tbldetalleventa.IDVENTA=:ID");

        $sentencia->bindParam(':ID',$claveVenta);
        $sentencia->execute();

        $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);

        print_r($listaProductos);
    }

    ?>
    <div class="row">
        <?php foreach($listaProductos as $producto){ ?>
        <div class="col-2">
            <div class="card">
                <img class="card-img-top" src="<?php echo $producto['Imagen']; ?>">
                <div class="card-body">

                <p class="card-text"><?php echo $producto['Nombre']; ?></p>

                <form action="descargas.php" method="post">
                <input type="text" name="IDVENTA" id="" value="<?php echo openssl_encrypt($claveVenta,COD,KEY);?>">
                <input type="text" name="IDPRODUCTO" id="" value="<?php echo openssl_encrypt($producto['IDPRODUCTO'],COD,KEY) ;?>">
                
                <button class="btn btn-success" type="submit">Descargar Factura</button>


                </form>

                    


                </div>
            </div>
        </div>
        <?php } ?>    
    </div>

    </p>
</div>

<?php 
include 'templates\pie.php';
?>