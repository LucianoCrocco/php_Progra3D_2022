<?php
/**
Luciano Crocco
Aplicación No 3 (Obtener el valor del medio)
Dadas tres variables numéricas de tipo entero $a, $b y $c realizar una aplicación que muestre
el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido.
Ejemplo 1: $a = 6; $b = 9; $c = 8; => se muestra 8.
Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”
 */

$a = 1;
$b = 5;
$c = 1;
$intermedio = NULL;

if(($a > $b && $a < $c) || ($a < $b && $a > $c)){
    $intermedio = $a;
} else if(($b > $a && $b < $c) || ($b < $a && $b > $c)){
    $intermedio = $b;
} else if(($c > $a && $c < $b) || ($c < $a && $c > $b)){
    $intermedio = $c;
}

if($intermedio != NULL){
    print("El numero intermedio de $a $b $c es $intermedio");
} else{
    print("No existe numero intermedio");
}


?>