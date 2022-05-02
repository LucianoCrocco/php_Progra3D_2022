<?php

require_once './usuario.php';


switch($_SERVER["REQUEST_METHOD"]){
    case 'GET':
        try {
            $arrayUsuarios = Usuario::CargarUsuariosArrayJSON();
            $retorno = Usuario::ListarUsuariosHTML($arrayUsuarios);
            print($retorno);
        } catch(Exception $ex){
            print($ex->getMessage());
        }
        break;
    default:
        echo 'Peticion no valida';
        break;
}

?>