<?php

switch($_SERVER["REQUEST_METHOD"]){
    case 'POST':
        switch (key($_GET)){
            case 'Carga':
                include "./HamburguesaCarga.php";
                break;
            case 'Consultar':
                include "./HamburgesaConsultar.php";
                break;
            case 'Venta':
                include "./AltaVenta.php";
                break;
        }
    break;

    default:
        echo 'Tipo de peticion invalida';
        break;
}
?>