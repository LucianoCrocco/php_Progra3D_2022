<?php
include_once "./auto.php";

//Crear dos objetos “Auto” de la misma marca y distinto color.
$auto = new Auto("Ford", "Azul");
$auto2 = new Auto("Ford", "Rojo");

//Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
$auto3 = new Auto ("Chevrolet", "Plateado", 12500);
$auto4 = new Auto ("Chevrolet", "Plateado", 15000);

//Crear un objeto “Auto” utilizando la sobrecarga restante.
$auto5 = new Auto ("Toyota", "Amarillo", 15000, "25/06/78");

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
$autos = array($auto, $auto2, $auto3, $auto4, $auto5);
foreach($autos as $k=>$v){
    if($k % 2 == 0){
        printf("Auto %d: <br>", $k+1);
        Auto::MostrarAuto($v);
    }
}
?>