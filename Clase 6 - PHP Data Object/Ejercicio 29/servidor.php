<?php 
    class Servidor{
        
        private PDO $_pdo;

        public function __construct(){
            $conStr = "mysql:host=localhost;dbname=clase_6";  
            $this->_pdo = new PDO($conStr,"root");     
        }

        public function BuscarTodosUsuarios(){
            try {
                $sentencia = $this->_pdo->prepare("SELECT * FROM usuarios"); 
                $sentencia->execute();

                $array = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                return $array;
            } catch(Exception $ex) {
                throw $ex;
            }
        }

    }
?>