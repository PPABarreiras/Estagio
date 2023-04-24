<?php

    class Banco{

    
        private $conn;
        private $serverName = "localhost";
        private $userName = "root";
        private $password = "";
        private $dbname = "ppa";
 
        function conectar(){
            
            try {
                $this->conn = new PDO("mysql:host=$this->serverName;dbname=$this->dbname", $this->userName, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this -> conn;
                echo "foi";
           
            } catch (PDOException $ex) {
                echo "Conection failed: " . $ex->getMessage();
            }
        }
 
 
        function fecharConexao()
          {
            try{
                $this->conn = null;
                echo "conexao finalizada";
   
            } catch(PDOException $ex) {
                echo "erro ao finalizar conexao:" . $ex->getMessage();;
            }
        }
    }

 
    ?>