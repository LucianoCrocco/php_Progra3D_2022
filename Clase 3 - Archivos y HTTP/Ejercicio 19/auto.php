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
            return "$auto->_marca, $auto->_color, $auto->_precio, $auto->_fecha";
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
            $archivo = fopen("Autos_guardados.csv", "a+");
            if($archivo != FALSE){
                $retorno = fputs($archivo, Auto::MostrarAuto($auto).PHP_EOL);
                fclose($archivo);
            }
        }
        return $retorno;
    }

    //Hacer los métodos necesarios en la clase Auto para poder leer el listado desde el archivo autos.csv
    public static function LeerCSV(){
        $mensaje = false;

        $archivo = fopen("Autos_guardados.csv", "r");
        if($archivo != FALSE){
            $mensaje = fread($archivo, filesize("Autos_guardados.csv"));
            fclose($archivo);
        }
        
        return $mensaje;
    }

    //Se deben cargar los datos en un array de autos.
    public static function CargarAutosArray(){
        $archivo = fopen("Autos_guardados.csv", "r");
        $array = [];
        if($archivo != FALSE){
            while(!feof($archivo)){
                $mensaje = fgets($archivo);
                if(!empty($mensaje)){
                    $mensaje = str_replace("\n", "", $mensaje);
                    $auxString = explode(", ", $mensaje);
                    $auto = new Auto($auxString[0],$auxString[1],$auxString[2],$auxString[3]);
                    array_push($array, $auto);
                }
            }
            fclose($archivo);
        }
        return $array;
    }
}
?>