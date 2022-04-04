<?php
/*
Luciano Crocco
Aplicación No 17 (Auto)
Realizar una clase llamada “Auto” que posea los siguientes atributos privados:
_color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)
Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:
i. La marca y el color.
ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.
Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por
parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
por parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
devolverá TRUE si ambos “Autos” son de la misma marca.
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
la suma de los precios o cero si no se pudo realizar la operación.
Ejemplo:
 $importeDouble = Auto::Add($autoUno, $autoDos);
En testAuto.php:
Crear dos objetos “Auto” de la misma marca y distinto color.
Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
Crear un objeto “Auto” utilizando la sobrecarga restante.
Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
al atributo precio.
Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
resultado obtenido.
Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
no.
Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,
5)
*/

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