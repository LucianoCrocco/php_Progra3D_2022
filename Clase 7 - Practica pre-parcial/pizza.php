<?php
//Sabor, precio, Tipo (“molde” o “piedra”), cantidad( de unidades). Se guardan los datos en en el archivo de texto Pizza.json, tomando un id autoincremental
class Pizza implements JsonSerializable{

    private int $_id;
    private string $_sabor;
    private float $_precio;
    private string $_tipo;
    private int $_cantidad;

    public function __construct($sabor, $precio, $tipo, $cantidad){
        $this->setRandomId();
        $this->setSabor($sabor);
        $this->setPrecio($precio);
        $this->setTipo($tipo);
        $this->setCantidad($cantidad);
    }

    /* GETTERS */
    public function getId(){
        return $this->_id;
    }
    public function getSabor(){
        return $this->_sabor;
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
    
    /* SETTERS */
    public function setId(){
        if(is_int($id)){
            $this->_id = $id;
        } else {
            throw new Exception("Id invalido.");
        }
    }
    public function setSabor($sabor){
        if(!empty($sabor)){
            $this->_sabor = $sabor;
        } else {
            throw new Exception("Sabor invalido.");
        }
    }
    public function setPrecio($precio){
        if(!empty($precio)){
            $this->_precio = $precio;
        } else {
            throw new Exception("Precio invalido.");
        }
    }
    public function setTipo($tipo){
        if(strtolower($tipo) == "molde" || strtolower($tipo) == "piedra"){
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

    /* JSON */
    public static function GuardarPizzaJSON($arrayPizza){
        $retorno = false;
        if(is_array($arrayPizza)){
            $archivo = fopen("Pizza.json", "w");
            if($archivo != FALSE){
                $json = json_encode($arrayPizza);
                $retorno = fputs($archivo, $json);
                fclose($archivo);
            }
        }
        return $retorno;
    }

    public static function CargarPizzaArrayJSON(){
        $array = [];
       if(file_exists("./Pizza.json")){
            $archivo = fopen("Pizza.json", "r");
            if($archivo != FALSE){
                $mensaje = fread($archivo, filesize("Pizza.json"));
                $arrayAux = json_decode($mensaje);
                $array = Pizza::GenerarArrayPizzas($arrayAux);
                fclose($archivo);
            }
       }

        return $array;
    }

    private static function GenerarArrayPizzas($array){
        $arrayNew = [];
        foreach($array as $v){
            $pizza = new Pizza($v->sabor, $v->precio, $v->tipo, $v->cantidad);
            $pizza->_id = $v->_id;
            array_push($arrayNew, $pizza);
        }
        return $arrayNew;
    }

    /* Funciones */
    public function jsonSerialize(){
        return get_object_vars($this);
    }

    private function setRandomId(){
        $this->_id = random_int(0, 10000);
    }
    
    public function Equals($tipo, $sabor){
        if($this->_tipo == $tipo && $this->_sabor == $sabor){
            return true;
        }
        return false;
    }

    private static function ExistePizza($array, $pizza){
        for($i = 0; $i < count($array); $i++){
            if($array[$i]->Equals($pizza->_tipo, $pizza->_sabor)){
                return $i;
            }
        }
        return -1;
    }

    public static function ManejadorAgregarPizza($pizza){
        $arrayPizzas = Pizza::CargarPizzaArrayJSON();
        $index = Pizza::ExistePizza($arrayPizzas, $pizza);

        if($index == -1){
            Pizza::AgregarPizzaLista($arrayPizzas, $pizza);
        } else {
            Pizza::ManejadorStock($arrayPizzas, $pizza, $index);
        }
    }

    private static function ManejadorStock($arrayPizzas, $pizza, $index){
        $arrayPizzas[$index]->_stock += $pizza->_stock;
        Pizza::GuardarPizzaJSON($arrayPizzas);
    }

    private static function AgregarPizzaLista($arrayPizzas, $pizza){
        array_push($arrayPizzas, $pizza);
        Pizza::GuardarPizzaJSON($arrayPizzas);
    }
}
?>