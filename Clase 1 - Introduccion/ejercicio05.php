<?php
/*
Luciano Crocco
Aplicación No 5 (Números en letras)
Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
entre el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.
*/
$num = 22;
$baseDecimal = $num[0];
$siguienteDecimal= $num[1];

$aux = (array)$num;

print($aux[0]);

print("$num[0] y $num[1]");

print("$baseDecimal $siguienteDecimal");
?>