<?php

require_once './usuario.php';

switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        $tipo = $_GET['tipo'];
        if(strtolower($tipo) == 'usuarios'){
            $array = Usuario::CargarUsuariosArrayCSV();
            $output = Usuario::GenerarListaArrayUsuarios($array);
            echo $output;
        } else {
            echo 'El tipo de archivo no existe';
        }
        break;
    default:
        echo 'Peticion Invalida';
        break;
}
?>