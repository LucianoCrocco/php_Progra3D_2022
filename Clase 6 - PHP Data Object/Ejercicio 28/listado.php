<?php

    require_once './usuario.php';
    require_once './servidor.php';

    switch($_SERVER["REQUEST_METHOD"]){
        case 'GET':
            try {
                if(key($_GET) == 'Usuarios'){
                    $servidor = new Servidor();

                    $matrizSQL = $servidor->BuscarTodosUsuarios();
                    $mensaje = Usuario::ListarUsuariosHTMLSQL($matrizSQL);

                    echo $mensaje;
                } else {
                    echo 'Parametros de la petición no validos';
                }
            } catch(Exception $ex){
                echo $ex->getMessage();
            }
            break;
        default:
            echo 'Peticion invalida';
            break;
    }

?>

