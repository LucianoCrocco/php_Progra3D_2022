<?php

require_once './usuario.php';

switch($_SERVER["REQUEST_METHOD"]){
    case 'POST':
        $arrayUsuarios = Usuario::CargarUsuariosArrayJSON();
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $usuario = new Usuario($nombre, $apellido, $email);
        $destino = "./Usuario/Fotos/".$usuario->_id."-".$_FILES["archivo"]["name"];
        move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino);
        array_push($arrayUsuarios, $usuario);
        Usuario::GuardarUsuariosJSON($arrayUsuarios);
        echo('Usuario registrado, foto almacenada');
        break;
    default:
        echo 'Peticion no valida';
        break;
}

?>