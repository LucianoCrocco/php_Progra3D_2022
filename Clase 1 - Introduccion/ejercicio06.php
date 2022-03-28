<?php
/*
Luciano Crocco
Aplicación Nº 6 (Carga aleatoria)  
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la 
función ​rand​). Mediante una estructura condicional, determinar si el promedio de los números 
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el 
resultado.
*/

$array = array();
$iteraciones = 5;

for($i = 0; $i < $iteraciones; $i++){
    array_push($array, rand(0, 10));
}

print("Acumulado del array: ".array_sum($array). "<br>");

if(array_sum($array) / count($array) > 6){
    echo 'El promedio es mayor que 6';
} else if (array_sum($array) / count($array) < 6){
    echo 'El promedio es menor que 6';
} else {
    echo 'El promedio es igual que 6';
}

?>