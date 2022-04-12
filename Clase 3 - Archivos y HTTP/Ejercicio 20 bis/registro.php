<?php

require_once './usuario.php';

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $usuario = new Usuario($nombre, $apellido, $email);
        Usuario::GuardarUsuarioCSV($usuario);
        print('Usuario gurdado correctamente');
        break;
    default:
        echo 'Peticion invalida';
        break;
}
?>