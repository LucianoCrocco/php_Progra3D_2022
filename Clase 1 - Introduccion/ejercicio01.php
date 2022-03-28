<?php
/*
Luciano Crocco
Aplicación No 1 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron. 
*/
$acumulador = 0;
$i = 0;

while(($acumulador + $i) <= 1000){
    $i++;
    $acumulador += $i;
    echo 'Numero sumado: ', $i;
    echo '<br>';
}
print ("Resultado de la suma $acumulador - Interacciones totales: $i");
?>