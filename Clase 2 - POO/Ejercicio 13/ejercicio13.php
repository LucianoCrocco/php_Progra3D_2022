<?php
/*
Luciano Crocco
Aplicación No 13 Validar Palabra
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario.
*/


function app($palabra, $max){
    $palabrasValidas = array("Recuperatorio", "Parcial", "Programacion");
    if(is_string($palabra) && is_numeric($max) && strlen($palabra) <= $max && in_array($palabra, $palabrasValidas)){
        return 1;
    } else {
        return 0;
    }
}
print(app("Parcial", 6));

?>