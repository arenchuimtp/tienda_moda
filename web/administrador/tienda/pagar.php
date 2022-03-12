<?php
include'global/configuracion.php';
include'global/conexion.php';
include'carrito.php';
include'templates/cabecera.php';
?>
<?php
if($_POST){
    $total=0;
    $SID=session_id();
    $Correo=$_POST['email'];

    foreach($_SESSION['CARRITO'] as $indice=>$producto)  {

        $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
    }
         

       $sentencia=$conexion->prepare("INSERT INTO `tblventas` 
                    (`ID`, `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, `status`) 
        VALUES (NULL,:ClaveTransaccion, '', NOW(),:Correo,:Total, 'pendiente');");

        $sentencia->bindParam(":ClaveTransaccion",$SID);
        $sentencia->bindParam(":Correo",$Correo);
        $sentencia->bindParam(":Total",$total);
        $sentencia->execute();
        $idVenta=$conexion->lastInsertId();

        foreach($_SESSION['CARRITO'] as $indice=>$producto)  {

            $sentencia=$pdo->prepare("INSERT INTO
             `tbldetalleventa` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`) VALUES (NULL,:IDVENTA, :IDPRODUCTO, :PRECIOUNITARIO, :CANTIDAD, '0');");
              $sentencia->bindParam(":IDVENTA",$idVenta);
              $sentencia->bindParam(":IDPRODUCTO",$producto['ID']);
              $sentencia->bindParam(":PRECIOUNITARIO",$producto['PRECIO']);
              $sentencia->bindParam(":CANTIDAD",$producto['CANTIDAD']);
              $sentencia->execute();

        }


        
    echo "<h3>".$total."</h3>";
}
?>
<script src="https://www.paypal.com/api/checkout.js"></script>
<style> 

     /*Media query for mobile viewport */
     @media screen and (max-width:400px) {
         #paypal-button-container {
             width: 100%;
        }
    }
    /*Media query for mobile viewport */
    @media screen and (max-width:400px) {
            #paypal-button-container {
                width: 250%;
                display: inline-block;
            }
        }
</style>


<div class="jumbotron text-center">
    <h1 class="display-4">Paso Final!</h1>
    <hr class="my-4">
    <p class="lead"> Estas a punto de pagar con paypal la cantidad de: 
    <?php
  function money_format($junk, $total) {
    return number_format($total, 2);
  }
?>
       </p>
        <div id="paypal-button-container"></div>
     
    <p>Los productos podrán ser enviados una vez que se procese el pago<br/>
    <strong>(Para aclaraciones :palkem@gmail.com)</strong>
    </p>
</div>

<script>
    paypal.Button.render({
        // env: 'sandbox', //sandbox| production
        style: {
            label: 'checkout', // checkout | credit | pay | buy now | generic
            size: 'responsive', // small | medium | large | responsive 
            shape:'pill', // pill | rect 
            color:'gold' // gold | blue | silver | black 
        },
        // PayPal Client IDs - repplace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox: 'AXEFE6tdtCmldaRVGNdQkdTGwHitD3ji1jn1Jbkq1XtvldfF9NQwq6_LVB2QHp2vKBZpN3OGnduocZpR',
            production: 'EGrsou4gyonmP-Ho7j3mt3FjK1oKSgN1yiALsxWSA9C_BcqTuRspHvIZNoqNlRhm2kSwGIWg3hQw02tn'
        },

        //wait for the PayPal button to be clicked

        payment: function(data, actions) {
            return actions.payment.create({
                payment:{
                    transactions: [ 
                    {
                        amount: { total: '<?php echo $total;?>', currency: 'USD'},
                        description:"Compra de productos a Store On Line:$<?php echo number_format($total,2);?>",
                        custom:"<?php echo $SID;?>#<?php echo openssl_encrypt($idVenta,COD,KEY); ?>"   
                    }                   
                ]
            }
        });
    },

        //Wait for the payment to be autorized by the customer

        onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    console.log('data!');
                    window.Location="verificador.php?paymentToken="+data.paymentToken+"&paymentID="+data.paymentID;
                });
    
        }
    }, '#paypal-button-container');

    </script>
</body>

</html>
    

<?php include 'templates\pie.php';?>