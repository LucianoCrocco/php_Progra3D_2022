<?php
include_once "./auto.php";
/*
Aplicación Nº 19 (Auto)
Realizar una clase llamada “Auto” que posea los siguientes atributos
privados: _color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)
Realizar un constructor capaz de poder instanciar objetos pasándole como
parámetros: i. La marca y el color.
ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.
Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble
por parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
por parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
devolverá TRUE si ambos “Autos” son de la misma marca.
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
la suma de los precios o cero si no se pudo realizar la operación.
Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);
Crear un método de clase para poder hacer el alta de un Auto, guardando los datos en un
archivo autos.csv.
Hacer los métodos necesarios en la clase Auto para poder leer el listado desde el archivo
autos.csv
Se deben cargar los datos en un array de autos.
En testAuto.php:
●Crear dos objetos “Auto” de la misma marca y distinto color.
●Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
●Crear un objeto “Auto” utilizando la sobrecarga restante.
●Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
al atributo precio.
●Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
resultado obtenido.
●Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
no.
●Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,
5)
 */

//Crear dos objetos “Auto” de la misma marca y distinto color.
$auto = new Auto("Ford", "Azul");
$auto2 = new Auto("Ford", "Rojo");

//Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
$auto3 = new Auto ("Chevrolet", "Plateado", 12500);
$auto4 = new Auto ("Chevrolet", "Plateado", 15000);

//Crear un objeto “Auto” utilizando la sobrecarga restante.
$auto5 = new Auto ("Toyota", "Amarillo", 15000, "25/06/78");
/*
//Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500 al atributo precio.
$auto3->AgregarImpuestos(1500);
$auto4->AgregarImpuestos(1500);
$auto5->AgregarImpuestos(1500);

//Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el resultado obtenido.
print(Auto::Add($auto, $auto2)."<br>");

//Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no.
if($auto->Equals($auto2) && $auto->Equals($auto5)){
    echo 'El auto uno es igual al 2 y 5<br>';
} else {
    echo 'El auto uno no es igual al 2 y 5<br>';
}

//Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)
print(Auto::MostrarAuto($auto));
print(Auto::MostrarAuto($auto3));
print(Auto::MostrarAuto($auto5));*/

/*
print(Auto::GuardarCSV($auto) ? "Auto guardado<br>" : "Error... Auto no guardado<br>");
print(Auto::GuardarCSV($auto2) ? "Auto guardado<br>" : "Error... Auto no guardado<br>");
print(Auto::GuardarCSV($auto3) ? "Auto guardado<br>" : "Error... Auto no guardado<br>");
print(Auto::GuardarCSV($auto4) ? "Auto guardado<br>" : "Error... Auto no guardado<br>");
*/
print(Auto::LeerCSV());

//Auto::CargarAutosArray();

    /*$autos = array($auto, $auto2, $auto3, $auto4, $auto5);
foreach($autos as $k=>$v){
    if($k % 2 == 0){
        printf("Auto %d: <br>", $k+1);
        Auto::MostrarAuto($v);
    }
}*/
?>