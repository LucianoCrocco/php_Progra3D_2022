<?php
/*
Luciano Crocco
Aplicación No 12 (Invertir palabra)
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
Rehacer sin array_reverse.
*/

function invertirPalabra($palabra){
    if(is_array($palabra)){
        $k = 0;
        $i = sizeof($palabra) - 1;
        $aux = NULL;
        while($i > $k){
            $aux = $palabra[$k];
            $palabra[$k] = $palabra[$i];
            $palabra[$i] = $aux;
            $k++;
            $i--;
        }
    } else {
        return "No se envio un array";
    }
    return $palabra;
}

/*
function invertirPalabra($palabra){
    if(is_array($palabra)){
        return array_reverse($palabra);
    } else {
        return "No se envio un array";
    }
}*/

$palabra = array("H", "O", "L", "A");
print_r(invertirPalabra($palabra));

?>