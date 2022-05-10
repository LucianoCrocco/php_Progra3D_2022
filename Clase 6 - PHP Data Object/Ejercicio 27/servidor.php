<?php 
    class Servidor{
        private PDO $_pdo;
        public function __construct(){
            $conStr = "mysql:host=localhost;dbname=clase_6";  
            $this->_pdo = new PDO($conStr,"root");     
        }
        public function AgregarUsuario($usuario){
            try {
                $sentencia = $this->_pdo->prepare("INSERT INTO usuarios (nombre, apellido, clave, mail, localidad, fecha_registro) VALUES (:nombre, :apellido, :clave, :mail, :localidad, :fechaRegistro)"); 
                $sentencia->bindValue(":nombre", $usuario->getNombre(), PDO::PARAM_STR);
                $sentencia->bindValue(":apellido", $usuario->getApellido(), PDO::PARAM_STR);
                $sentencia->bindValue(":clave", $usuario->getClave(), PDO::PARAM_STR);
                $sentencia->bindValue(":mail", $usuario->getMail(), PDO::PARAM_STR);
                $sentencia->bindValue(":localidad", $usuario->getLocalidad(), PDO::PARAM_STR);
                $sentencia->bindValue(":fechaRegistro", $usuario->getFechaRegistro(), PDO::PARAM_STR);
                $sentencia->execute();
            } catch(Exception $ex) {
                throw $ex;
            }
        }

    }
?>