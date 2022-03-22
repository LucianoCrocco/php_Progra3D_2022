<?php
/*
Luciano Crocco
Aplicación No 4 (Calculadora)
Escribir un programa que use la variable $operador que pueda almacenar los símbolos
matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. De acuerdo al
símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
resultado por pantalla. 
*/
$operador = '-';
$op1 = 1;
$op2 = 2;
$divisorCero = "No se puede dividir por 0";
$result = NULL;

switch($operador){
    case '-':
        $result = $op1 - $op2;
    break;
    case '*':
        $result = $op1 * $op2;
        break;
    case '/':
        if($op2 == 0){
            $result = $divisorCero;
        } else {
            $result = $op1 / $op2;
        }
        break;
    default:
        $result = $op1 + $op2;
        break;
}

print("El resultado de la $operador entre $op1 y $op2 es $result");

?>