<?php

class Producto {
    private int $_id;
    private int $_codigoDeBarras;
    private string $_nombre;
    private string $_tipo;
    private int $_stock;
    private float $_precio;

    public function __construct($codigoDeBarras, $nombre, $tipo, $stock, $precio){
        try {
            $this->setRandomId();
            $this->setCodigoDeBarras($codigoDeBarras);
            $this->_nombre = $nombre;
            $this->_tipo = $tipo;
            $this->_stock = $stock;
            $this->_precio = $precio;
        } catch (Exception $ex){
            throw $ex;
        }
    }

    public function __set($property, $value){
        if(property_exists($this,$property)){
            $this->property = $value; 
        }
    }

    private function setRandomId(){
        $this->_id = random_int(0,10000);
    }

    private function setCodigoDeBarras($value){
        if(strlen((string)$value) > 6){
            throw new Exception("Cifras codigo de barras excedido");
        } else {
            $this->_codigoDeBarras = $value;
        }
    }

    public static function MostrarProducto($producto){
        if(is_a($producto, "Producto")){
            return "$producto->_id, $producto->_codigoDeBarras, $producto->_nombre, $producto->_tipo, $producto->_stock, $producto->_precio";
        }
    }

    public static function GuardarProdutosCSV($productos){
        $retorno = false;
        if (is_array($productos)){
            $archivo = fopen("productos.csv", "w");
            if($archivo != FALSE){
                foreach($productos as $v){
                    $retorno = fputs($archivo, Producto::MostrarProducto($v).PHP_EOL);
                }
                fclose($archivo);
            }
        }
        return $retorno;
    }

    public static function CargarProdutosArrayCSV(){
        $array = [];
        $archivo = fopen("productos.csv", "r");
        if($archivo != FALSE){
            while(!feof($archivo)){
                $mensaje = fgets($archivo);
                if(!empty($mensaje)){
                    $mensaje = str_replace("\n","",$mensaje);
                    $auxArray = explode(", ", $mensaje);
                    $producto = new Producto($auxArray[1], $auxArray[2], $auxArray[3], $auxArray[4], $auxArray[5]);
                    array_push($array, $producto); 
                }
            }
            fclose($archivo);
        }
        return $array;
    }

    public function Equals($nombre){
        if($this->_nombre == $nombre){
            return true;
        }
        return false;
    }

    private static function ExisteProducto($array, $producto){
        for($i = 0; $i < count($array); $i++){
            if($array[$i]->Equals($producto->_nombre)){
                return $i;
            }
        }
        return -1;
    }


    public static function ManejadorAgregarProductos($producto){
        $mensaje = "Ingresado";
        $arrayProductos = Producto::CargarProdutosArrayCSV();
        $index = Producto::ExisteProducto($arrayProductos, $producto);

        if($index == -1){
            Producto::AgregarProductoLista($arrayProductos, $producto);
        } else {
            Producto::ManejadorStock($arrayProductos, $producto, $index);
            $mensaje = "Actualizado";
        }
        return $mensaje;
    }

    private static function ManejadorStock($arrayProductos, $producto, $index){
        $arrayProductos[$index]->_stock += $producto->_stock;
        Producto::GuardarProdutosCSV($arrayProductos);
    }

    private static function AgregarProductoLista($arrayProductos, $producto){
        array_push($arrayProductos, $producto);
        Producto::GuardarProdutosCSV($arrayProductos);
    }
    
}
?>