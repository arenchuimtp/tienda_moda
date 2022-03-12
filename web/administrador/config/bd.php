<?php
$host="localhost";
$bd="tienda_moda";
$usuario="root";
$password="Buho2022";

try {
        $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$password);
    } catch (Exception $ex) {

    echo $ex->getMessage();
}
?>