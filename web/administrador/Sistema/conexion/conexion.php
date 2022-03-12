<?php
class conexion {

    private $servidor;
    private $usuario;
    private $password;
    private $dbname;
    private $charset;
    
    public function connect() {
        $this->servidor= "localhost";
        $this->usuario= "root";
        $this->password="Buho2022";
        $this->db= "tienda_moda";
        $this->charset="utf8mb4";
    
        try {
    
            $dsn = "mysql:host=".$this->servidor.";dbname=".$this->dbname.";charset=".$this->charset;
            $pdo = new PDO($dsn,$this->usuario, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
    
        } catch (PDOException $e) {
            echo "Connection failed: ".$e->getMessage();
    
        }
    
         
        
    }
    }
    ?>



