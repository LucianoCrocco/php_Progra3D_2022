<?php
include_once "./hamburgesa.php";

class Servidor{
    private PDO $_pdo;
    public function __construct(){
        $conStr = "mysql:host=localhost;dbname=clase_8_parcial";  
        $this->_pdo = new PDO($conStr,"root");     
    }

    public function CargarVenta($venta, $usuario, $hamburgesa){
        try {
            $sentencia = $this->_pdo->prepare("INSERT INTO ventas (fecha, numero_de_pedido, usuario, nombre, tipo, cantidad) VALUES (:fecha, :nro_pedido, :usuario, :nombre, :tipo, :cantidad)"); 
            $sentencia->bindValue(":fecha", $venta->getFecha(), PDO::PARAM_STR);
            $sentencia->bindValue(":nro_pedido", $venta->getRandomNumeroDePedido(), PDO::PARAM_INT);
            $sentencia->bindValue(":usuario", $usuario, PDO::PARAM_INT);
            $sentencia->bindValue(":nombre", $hamburgesa->getNombre(), PDO::PARAM_INT);
            $sentencia->bindValue(":tipo", $hamburgesa->getTipo(), PDO::PARAM_INT);
            $sentencia->bindValue(":cantidad", $hamburgesa->getCantidad(), PDO::PARAM_INT);
            $sentencia->execute();
        } catch(Exception $ex) {
            throw $ex;
        }
    }

}

?>