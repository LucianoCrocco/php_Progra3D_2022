<?php

    require_once './usuario.php';
    require_once './servidor.php';

    switch($_SERVER["REQUEST_METHOD"]){
        case 'POST':
            try {
                if(key($_GET) == 'Usuarios'){
                    $servidor = new Servidor();
                    $matrizSQL = $servidor->BuscarTodosUsuarios();
                    echo Usuario::BuscarUsuariosExistenteSQL($_POST["mail"], $_POST["clave"], $matrizSQL) ? "Existe el usuario" : "No existe el usuario";
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

