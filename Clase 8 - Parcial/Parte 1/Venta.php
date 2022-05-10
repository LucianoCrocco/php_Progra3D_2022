<?php

class Venta {
    private string $_fecha;
    private int $_numeroDePedido;

    public function __construct(){
        try {
            $this->setRandomNumeroDePedido();
            $this->setFecha();
        }catch(Exception $ex){
            throw $ex;
        }
    }
    public function setRandomNumeroDePedido(){
        $this->_numeroDePedido = random_int(0, 10000);
    }
    
    public function setFecha(){
        $this->_fecha = date("Y-m-d");
    }

    public function getRandomNumeroDePedido(){
        return $this->_numeroDePedido;
    }
    
    public function getFecha(){
        return $this->_fecha;
    }

    public static function GuardarFotos($temporal, $destino){
        if(!move_uploaded_file($temporal, $destino)){
            throw new Exception("Error al mover el archivo.");
        }
    }

}

?>