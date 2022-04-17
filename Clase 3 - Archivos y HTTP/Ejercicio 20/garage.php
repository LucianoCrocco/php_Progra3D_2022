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
            print(Auto::MostrarAuto($v)."<br>");
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

    //Crear un método de clase para poder hacer el alta de un Garage y, guardando los datos en un archivo garages.csv.

    public static function GuardarCSV($garage){
        $retorno = false;
        if(is_a($garage, "Garage")){
            $archivo = fopen("garages.csv", "a+");
            if($archivo){
                $retorno = fputs($archivo, $garage->_razonSocial.", ".$garage->_precioPorHora.PHP_EOL);
                foreach($garage->_autos as $auto){
                    $retorno = fputs($archivo, "-> ".Auto::MostrarAuto($auto).PHP_EOL);
                }
                fclose($archivo);
            }
        }
        return $retorno;
    }

    //Hacer los métodos necesarios en la clase Garage para poder leer el listado desde el archivo garage.csv.
    
    public static function LeerCSV(){
        $retorno = false;
        $mensaje = NULL;

        $archivo = fopen("garages.csv", "r");
        if($archivo != FALSE){
            $mensaje = fread($archivo, filesize("garages.csv"));
            fclose($archivo);
        }
        
        
        return $mensaje;
    }
    
        //Se deben cargar los datos en un array de garage.
        public static function CargarGaragesArray(){
            $archivo = fopen("garages.csv", "r");
            $array = [];
            $garage = NULL;
            if($archivo != FALSE){
                while(!feof($archivo)){
                    $mensaje = fgets($archivo);
                    if(!empty($mensaje)){
                        $mensaje = str_replace("\n", "", $mensaje);
                        if(str_contains($mensaje, "->")){
                            $mensaje = str_replace("-> ", "", $mensaje);
                            $auxString = explode(", ", $mensaje);
                            $auto = new Auto($auxString[0],$auxString[1],$auxString[2],$auxString[3]);
                            array_push($array, $auto);
                        } else {
                            $auxString = explode(", ", $mensaje);
                            $garage = new Garage($auxString[0],$auxString[1]);
                        }
                    }
                }
                fclose($archivo);
                $garage->_autos = $array;
            }
            
            return $garage;
        }
}

?>