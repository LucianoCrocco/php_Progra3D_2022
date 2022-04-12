<?php
include_once "./auto.php";
/*
Aplicación Nº 18 (Auto - Garage)
Crear la clase Garage que posea como atributos privados:
_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:
i.   La razón social.
ii.  La razón social, y el precio por hora.
Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
que mostrará todos los atributos del objeto.
Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
(sólo si el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);
Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Remove($autoUno);
En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los
métodos.
Neiner, Maximiliano – Villegas, Octavio PHP- 2016 Página2 */
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
        $retorno = false;
        if(is_a($auto, "Auto") && $this->Equals($auto)){
            $i = array_search($auto, $this->_autos);
            unset($this->_autos[$i]);
            $retorno = true;
        }
        return $retorno;
    }
}

?>