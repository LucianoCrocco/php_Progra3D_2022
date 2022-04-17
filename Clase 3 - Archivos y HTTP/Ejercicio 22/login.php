<?php

require_once './usuario.php';

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $email = $_POST['email'];
        $clave = $_POST['clave'];
        $usuario = new Usuario($email, $clave);
        $arrayBDD = Usuario::CargarUsuariosArrayCSV();
        print(Usuario::VerificarUsuario($usuario, $arrayBDD));
        break;
    default:
        echo 'Peticion Invalida';
        break;
}
?>