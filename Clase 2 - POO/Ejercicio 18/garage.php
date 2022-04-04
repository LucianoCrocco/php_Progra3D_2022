<?php
include_once "./auto.php";

class Garage {
    private string $_razonSocial;
    private float $_precioPorHora;
    private array $_autos;


    public function __construct($razonSocial, $precioPorHora = 200){
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora;
        $this->_autos = array();
    }

    public function MostrarGarage(){
        print($this->_razonSocial."<br>");
        print("Precio por hora: ".$this->_precioPorHora."<br>");
        echo "----Autos estacionados---<br>";
        foreach($this->_autos as $v){
            Auto::MostrarAuto($v);
        }
    }

    public function Equals($auto){
        return in_array($auto, $this->_autos);
    }

    public function Add($auto){
        if(is_a($auto, "Auto") && !in_array($auto, $this->_autos)){
            array_push($this->_autos, $auto);
        } else {
            return "El auto ya se encuentra en el garage";
        }
    }

    public function Remove($auto){
        if(is_a($auto, "Auto") && in_array($auto, $this->_autos)){
            $i = array_search($auto, $this->_autos);
            unset($this->_autos[$i]);
        } else {
            return "El auto no se encuentra en el garage";
        }
    }
}

?>