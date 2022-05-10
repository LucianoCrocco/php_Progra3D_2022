<?php

class Hamburgesa implements JsonSerializable{
    /*Nombre, Precio, Tipo (“simple” o “doble”), Cantidad( de
    unidades).*/
    private int $_id;
    private string $_nombre;
    private string $_precio;
    private string $_tipo;
    private string $_cantidad;
    private string $_foto;
    public function __construct($nombre, $precio, $tipo, $cantidad, $foto){
        try {
            $this->setRandomId();;
            $this->setNombre($nombre);
            $this->setPrecio($precio);
            $this->setTipo($tipo);
            $this->setCantidad($cantidad);
            $this->setFoto($foto);
        }catch(Exception $ex){
            throw $ex;
        }
    }

     /* GETTERS */
     public function getId(){
        return $this->_id;
    }
    public function getNombre(){
        return $this->_nombre;
    }
    public function getPrecio(){
        return $this->_precio;
    }
    public function getTipo(){
        return $this->_tipo;
    }
    public function getCantidad(){
        return $this->_cantidad;
    }
    public function getFoto(){
        return $this->_foto;
    }

    
    /* SETTERS */
    public function setId($id){
        if(is_int($id)){
            $this->_id = $id;
        } else {
            throw new Exception("Id invalido.");
        }
    }
    public function setNombre($nombre){
        if(!empty($nombre)){
            $this->_nombre = $nombre;
        } else {
            throw new Exception("Nombre invalido.");
        }
    }
    public function setPrecio($precio){
        if(!empty($precio) && is_numeric($precio)){
            $this->_precio = $precio;
        } else {
            throw new Exception("Precio invalido.");
        }
    }
    public function setTipo($tipo){
        if(strtolower($tipo) == "simple" || strtolower($tipo) == "doble"){
            $this->_tipo = $tipo;
        } else {
            throw new Exception("Tipo invalido.");
        }
    }
    public function setCantidad($cantidad){
        if(!empty($cantidad)){
            $this->_cantidad = $cantidad;
        } else {
            throw new Exception("Cantidad invalida.");
        }
    }

    public function setFoto($foto){
        if (is_string($foto) && !empty($foto)) {
            $this->_foto = $this->_tipo."-".$this->_nombre."-".$foto;
        } else {
            throw new Exception("Foto invalida");
        }
    }
    private function setRandomId(){
        $this->_id = random_int(0, 10000);
    }

        /* JSON */
    public function jsonSerialize(){
        return get_object_vars($this);
    }

    public static function GuardarHamburgesasJSON($arrayHamburgesas){
        $retorno = false;
        if(is_array($arrayHamburgesas)){
            $archivo = fopen("Hamburgesas.json", "w");
            if($archivo != FALSE){
                $json = json_encode($arrayHamburgesas);
                $retorno = fputs($archivo, $json);
                fclose($archivo);
            }
        }
        return $retorno;
    }

    public static function CargarHamburgesasArrayJSON(){
        $array = [];
        if(file_exists("./Hamburgesas.json")){
            $archivo = fopen("Hamburgesas.json", "r");
            if($archivo != FALSE){
                $mensaje = fread($archivo, filesize("Hamburgesas.json"));
                $arrayAux = json_decode($mensaje);
                $array = Hamburgesa::GenerarArrayHamburgesas($arrayAux);
                fclose($archivo);
            }
        }
        return $array;
    }

    private static function GenerarArrayHamburgesas($array){
        $arrayNew = [];
        foreach($array as $v){
            $hamburgesa = new Hamburgesa($v->_nombre, $v->_precio, $v->_tipo, $v->_cantidad, $v->_foto);
            $hamburgesa->_id = $v->_id;
            $hamburgesa->_foto = $v->_foto;
            array_push($arrayNew, $hamburgesa);
        }
        return $arrayNew;
    }

    public static function GuardarFotos($temporal, $destino){
        if(!move_uploaded_file($temporal, $destino)){
            throw new Exception("Error al mover el archivo.");
        }
    }

    /* Funciones */
    public function Equals($nombre, $tipo){
        if($this->_nombre == $nombre && $this->_tipo == $tipo){
            return true;
        }
        return false;
    }

    public static function ExisteHamburgesa($array, $hamburgesa){
        for($i = 0; $i < count($array); $i++){
            if($array[$i]->Equals($hamburgesa->_nombre, $hamburgesa->_tipo)){
                return $i;
            }
        }
        return -1;
    }

    public static function ManejadorAgregarHamburgesa($hamburgesa){

        try{
            $arrayHamburgesas = Hamburgesa::CargarHamburgesasArrayJSON();
            $index = Hamburgesa::ExisteHamburgesa($arrayHamburgesas, $hamburgesa);

            if($index == -1){
                Hamburgesa::AgregarHamburgesaLista($arrayHamburgesas, $hamburgesa);
            } else {
                Hamburgesa::ManejadorStock($arrayHamburgesas, $hamburgesa->_cantidad, $index);
            }
    
        }catch(Exception $ex){
            throw $ex;
        }

    }

    private static function AgregarHamburgesaLista($arrayHamburgesas, $hamburgesa){
        array_push($arrayHamburgesas, $hamburgesa);
        Hamburgesa::GuardarHamburgesasJSON($arrayHamburgesas);
    }

    private static function ManejadorStock($arrayHamburgesas, $cantidad, $index){
        if($cantidad > 0){
            $arrayHamburgesas[$index]->_cantidad += $cantidad;
            Hamburgesa::GuardarHamburgesasJSON($arrayHamburgesas);
        } else if ($cantidad < 0) {
            if($arrayHamburgesas[$index]->_cantidad >= ($cantidad * -1)){
                $arrayHamburgesas[$index]->_cantidad += $cantidad;
                Hamburgesa::GuardarHamburgesasJSON($arrayHamburgesas);
            } else {
                throw new Exception ("La cantidad de stock de la hamburgesa es menor a la solicitada");
            }
        }
    }

    public static function ExisteTipoONombre($nombre, $tipo){
        $mensaje = "Si hay";
        $arrayHamburgesas = Hamburgesa::CargarHamburgesasArrayJSON();
        foreach($arrayHamburgesas as $v){
            if($v->_nombre != $nombre){
                $mensaje = "No existe el nombre";
                break;
            } else if ($v->_tipo != $tipo){
                $mensaje = "No existe el tipo";
            }
        }

        return $mensaje;
    }

    public static function ManejadorVentaHamburgesa($hamburgesa){

        try{
            $arrayHamburgesas = Hamburgesa::CargarHamburgesasArrayJSON();
            $index = Hamburgesa::ExisteHamburgesa($arrayHamburgesas, $hamburgesa);

            if($index != -1){
                Hamburgesa::ManejadorStock($arrayHamburgesas, $hamburgesa->_cantidad, $index);
            }
    
        }catch(Exception $ex){
            throw $ex;
        }
    }

}

?>