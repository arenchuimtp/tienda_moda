<?php

define("KEY", "palkem2022");
define("COD","AES-128-ECB");
define("SERVIDOR","localhost");
define("USUARIO","root");
define("PASSWORD","Buho2022");
define("BD", "tienda_moda");


try {
        $conexion =new PDO("mysql:host=localhost;dbname=bd",'usuario','password');
    } catch (Exception $ex) {

    echo $ex->getMessage();
}
?>
