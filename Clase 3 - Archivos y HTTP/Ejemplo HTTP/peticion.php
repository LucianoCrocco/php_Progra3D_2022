<?php

switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        echo 'peticion GET';
        //echo json_encode(['parametros' => $_GET]);
        echo json_encode($_GET);
        break;
    case 'POST':
        //echo json_encode(array("Mensaje" => $_POST)); //lo mismo que (['parametros' => $_GET]). Es una relacion key:value como el foreach
        //Otra manera de hacer un key:value y devolver al info comouna cabecera.
        $array = array();
        foreach($_POST as $k => $v){
            $array[$k] = $v;
        }
        echo json_encode(["Informacion Personal" => $array]);
        break;
    default:
        echo 'Peticion invalida';
        break;
}
?>