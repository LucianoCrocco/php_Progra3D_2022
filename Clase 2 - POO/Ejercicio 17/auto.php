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
        if($flecha == NULL){
            $this->_fecha = date("d/m/y");
            //$this->_fecha = $fechaAux;
        } else {
            $this->_fecha = $fecha;
        }
    }


/*
    public static function AgregarImpuestos($auto, $impuesto){
        if(is_float($impuesto)){
            $auto->_precio += $impuesto;
        }
    } 
*/


    public function TEST_MOSTRAR(){
        //print("$this->_marca");
        print("$this->_marca");
        print("$this->_fecha");
    }

    /*
    public static function TEST(){
        print("TEST");
    }*/
}


?>