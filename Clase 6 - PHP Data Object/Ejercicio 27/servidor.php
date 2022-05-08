<?php 
    class Servidor{
        private string $_serverCon;
        private string $_connection;

        public function __construct(){
            try {
                $this->_connection = "mysql:host=c;dbname=clase_6";
                $this->_serverCon = new PDO($this->_connection);
            } catch(Exception $ex) {
                throw $ex;
            }
        }

        public function AgregarUsuario($usuario){
            $sentencia = $this->_serverCon->prepare("INSERT INTO usuarios (nombre, apellido, clave, mail, localidad, fecha-registro) VALUES (:nombre, :apellido, :clave, :mail, :localidad, :fechaRegistro)"); 
            $sentencia->bindParam(":nombre", $usuario->getNombre(), PDO::PARAM_STR);
            $sentencia->bindParam(":apellido", $usuario->getApellido(), PDO::PARAM_STR);
            $sentencia->bindParam(":clave", $usuario->getClave(), PDO::PARAM_STR);
            $sentencia->bindParam(":mail", $usuario->getMail(), PDO::PARAM_STR);
            $sentencia->bindParam(":localidad", $usuario->getLocalidad(), PDO::PARAM_STR);
            $sentencia->bindParam(":fechaRegistro", $usuario->getFechaRegistro(), PDO::PARAM_STR);
            $sentencia->execute();
        }
    }
?>