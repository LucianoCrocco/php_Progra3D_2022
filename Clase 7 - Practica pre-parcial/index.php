<?php

switch($_SERVER["REQUEST_METHOD"]){
    case 'GET':
        include "./PizzaCarga.php";
        break;
    default:
        break;
}
?>