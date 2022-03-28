<?php
/*
Luciano Crocco
Aplicación No 5 (Números en letras)
Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
entre el 20 y el 60.
Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.
*/
$num = 33;
$base = (int) ($num / 10);
$sufijo = (int) (((string)$num)[1]);
$mensaje = NULL;

switch($base){
    case 2:
        $mensaje = "Veinti";
        break;
    case 3:
        $mensaje = "Treinta y ";
        break;
    case 4:
        $mensaje = "Cuarenta y ";
        break;
    case 5:
        $mensaje = "Cincuenta y ";
        break;
    case 6:
        $mensaje = "Sesenta y ";
        break;
}

switch($sufijo){
    case 1:
        $mensaje.="uno";
        break;
    case 2:
        $mensaje.="dos";
        break;
    case 3:
        $mensaje.="tres";
        break;
    case 4:
        $mensaje.="cuatro";
        break;
    case 5:
        $mensaje.="cinco";
        break;
    case 6:
        $mensaje.="seis";
        break;
    case 7:
        $mensaje.="siete";
        break;
    case 8:
        $mensaje.="ocho";
        break;
    case 9:
        $mensaje.="nueve";
        break;
}

print("$mensaje");

?>