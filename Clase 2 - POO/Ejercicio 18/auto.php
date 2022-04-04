<?php

class Auto{
    private string $_marca;
    private string $_color;
    private float $_precio;
    private string $_fecha; //No lo puse como date pq rompe por todos lados (ultima version), ni setearlo a null, ni con una constante ni nada me solucionan el problema. Agregue una validacion para saber si es una flecha. Un compañero menciono que no se puede instanciar una flecha en el constructor y que precisa una constante, bueno ni con la constante pude.
    //checkdate();
    //date("FORMATO-DATE", strtotime("2011-01-07"));

    public function __construct($marca, $color, $precio = 10000, $fecha = NULL){ //Generar una fecha genericam sacar el null. Precio hacer un rand.
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = $precio;
        if($fecha == NULL){
            $this->_fecha = date("d/m/y"); 
        } else {
            $this->_fecha = $fecha;
        }
    }


    public function AgregarImpuestos($impuesto){
        if(is_numeric($impuesto)){
            $this->_precio += $impuesto;
        }
    } 

    public static function MostrarAuto($auto){
        if(is_a($auto, "Auto")){
            print("$auto->_marca<br>$auto->_color<br>$auto->_precio<br>$auto->_fecha<br>");
        }
    }
    
    public function Equals($auto){
        if (is_a($auto, "Auto")){
            if($auto->_marca == $this->_marca){
                return true;
            }
        }
        return false;
    }


    public static function Add($auto1, $auto2){
        $retorno = "Los elementos no son autos";
        if(is_a($auto1, "Auto") && is_a($auto2, "Auto")){
            $retorno = "Los autos no coinciden en marca y/o color";
            if($auto1->_marca == $auto2->_marca && $auto1->_color == $auto2->_color){
                $retorno = $auto1->_precio +  $auto2->_precio;
            }
        }
        return $retorno;
    }

    /*
    public static function TEST(){
        print("TEST");
    }*/
}


?>