<?php

    require_once './usuario.php';
    require_once './servidor.php';

    switch($_SERVER["REQUEST_METHOD"]){
        case 'POST':
            try {
                if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['clave']) && isset($_POST['mail']) && isset($_POST['localidad'])){
                    $usuario = new Usuario($_POST['nombre'], $_POST['apellido'], $_POST['clave'], $_POST['mail'], $_POST['localidad']);
                    $server = new Servidor();
                    $server->AgregarUsuario($usuario);
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

