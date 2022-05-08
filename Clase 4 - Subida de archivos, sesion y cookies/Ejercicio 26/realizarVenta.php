<?php

    switch($_SERVER["REQUEST_METHOD"]){
        case "POST":
            try {

                if(Usuario::BuscarExistenciaUsuario()){
                    
                } else {
                    echo "No se pudo hacer";
                }

            } catch(Exception $ex){
                echo $ex->getMessage();
            }
            break;
        default:
            echo "Petición invalida";
            break;
    }

?>