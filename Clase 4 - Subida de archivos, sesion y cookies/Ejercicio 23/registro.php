<?php

require_once './usuario.php';


switch($_SERVER["REQUEST_METHOD"]){
    case 'POST':
        try {
            $arrayUsuarios = Usuario::CargarUsuariosArrayJSON();
            $usuario = new Usuario($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_FILES["archivo"]["name"]);

            $destino = "./Usuario/Fotos/".$usuario->getFoto();
            $origen = $_FILES["archivo"]["tmp_name"];
            
            Usuario::GuardarFotos($origen, $destino);
            
            array_push($arrayUsuarios, $usuario);
            Usuario::GuardarUsuariosJSON($arrayUsuarios);
            echo('Usuario registrado, foto almacenada');
        } catch(Exception $ex){
            print($ex->getMessage());
        }
        break;
    default:
        echo 'Peticion no valida';
        break;
}

?>