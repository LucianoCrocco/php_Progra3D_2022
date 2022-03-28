<?php
/*
Luciano Crocco
Aplicación Nº 7 (Mostrar impares)
Generar una aplicación que permita cargar los primeros 10 números impares en un Array. 
Luego imprimir (utilizando la estructura ​for​) cada uno en una línea distinta (recordar que el alto de línea en HTML es la etiqueta ​<br/>​). Repetir la impresión de los números utilizando 
las estructuras ​while​ y ​foreach​. 
*/
$numeroImpar = 0;
$iteraciones = 10;
$i = 0;
$array = array();

while($i < $iteraciones){
    $numeroImpar = $i * 2 + 1;
    array_push($array, $numeroImpar);
    $i++;
}

echo "Estructura for<br>";
for($i = 0; $i < count($array);$i++){
    print("$array[$i] <br>");
}

echo "<br>Estructura while<br>";
$k = 0;
while($k < count($array)){
    print("$array[$k]<br>");
    $k++;
}

echo "<br>Estructura foreach value<br>";
foreach($array as $value){
    print("Valor $value<br>");
}

echo "<br>Estructura foreach key:value<br>";
foreach($array as $key=>$value){
    print("Posicion $key valor $value<br>");
}

?>