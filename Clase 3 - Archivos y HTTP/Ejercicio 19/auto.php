<?php

class Auto{
    private string $_marca;
    private string $_color;
    private float $_precio;
    private string $_fecha;

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
            return "$auto->_marca<br>$auto->_color<br>$auto->_precio<br>$auto->_fecha<br>";
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

    //Crear un método de clase para poder hacer el alta de un Auto, guardando los datos en un archivo autos.csv.
    public static function GuardarCSV($auto){
        $retorno = false;
        if(is_a($auto, "Auto")){
            $archivo = fopen("Autos_guardados.csv", "a");
            if($archivo != FALSE){
                $retorno = fputs($archivo, Auto::MostrarAuto($auto)."\n");
                $retorno = fclose($archivo);
            }
        }
        return $retorno;
    }

    //Hacer los métodos necesarios en la clase Auto para poder leer el listado desde el archivo autos.csv
    public static function LeerCSV(){
        $retorno = false;
        $mensaje = NULL;

        $archivo = fopen("Autos_guardados.csv", "r");
        if($archivo != FALSE){
            $mensaje = fread($archivo, filesize("Autos_guardados.csv"));
            $retorno = fclose($archivo);
        }
        
        if($mensaje != false && $retorno){
            return $mensaje;
        }
        return false;
    }

    //Se deben cargar los datos en un array de autos.
    //Uitlizar str replace y str search, leer la documentacion. https://www.php.net/manual/es/function.str-replace.php
    /*public static function CargarAutosArray(){
        $archivo = fopen("Autos_guardados.csv", "r");
        if($archivo != FALSE){
            while(!feof($archivo)){
                $mensaje = fgets($archivo);
                str_split($mensaje, "<br>");
                echo $mensaje;
            }
            $retorno = fclose($archivo);
        }
    }*/
}
?>