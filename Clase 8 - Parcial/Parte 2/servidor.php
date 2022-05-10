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
    public function ConsultaVentasFecha($fecha){
        try {
            if (empty($fecha)){
                $anio = $date("Y"); 
                $dia = $date("d") - 1; 
                $mes = $date("m"); 
                $fecha = $anio."-".$mes."-".$dia;
            }
            
            $sentencia = $this->_pdo->prepare("SELECT * FROM ventas WHERE ventas.fecha = (:fecha)"); 
            $sentencia->bindValue(":fecha", $fecha);
            $sentencia->execute();

            $matriz = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            return $matriz;
        } catch(Exception $ex) {
            throw $ex;
    }

    public function ConsultaVentasEntreFecha($fechaUno, $fechaDos){        try {
            if (!empty($fechaUno) && !empty($fechaDos)){
                $sentencia = $this->_pdo->prepare("SELECT * FROM ventas WHERE ventas.fecha > (:fechaUno) AND ventas.fecha < (:fechaDos)"); 
                $sentencia->bindValue(":fechaUno", $fechaUno);
                $sentencia->bindValue(":fechaDos", $fechaDos);
                $sentencia->execute();
                $matriz = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                return $matriz;
            } else {
                throw new Exception ("Fechas no validas");
            }
        } catch(Exception $ex) {
            throw $ex;
    }

    public function ConsultaVentasUsuario($user){
        try {
            if (!empty($fechaUno) && !empty($fechaDos)){
                $sentencia = $this->_pdo->prepare("SELECT * FROM ventas WHERE ventas.usuario = (:usuario)"); 
                $sentencia->bindValue(":usuario", $user);
                $sentencia->execute();
                $matriz = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                return $matriz;
            } else {
                throw new Exception ("Usuario invalido validas");
            }
        } catch(Exception $ex) {
            throw $ex;
    }

    public function ConsultaVentasTipo($tipo){
        try {
            if (!empty($fechaUno) && !empty($fechaDos)){
                $sentencia = $this->_pdo->prepare("SELECT * FROM ventas WHERE ventas.tipo = (:tipo)"); 
                $sentencia->bindValue(":tipo", $tipo);
                $sentencia->execute();
                $matriz = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                return $matriz;
            } else {
                throw new Exception ("Tipo invalido validas");
            }
        } catch(Exception $ex) {
            throw $ex;
    }

}

?>