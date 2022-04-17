<?php

class Usuario {
    private string $_email;
    private string $_clave;

    public function __construct($email, $clave){
        $this->_clave = $clave;
        $this->_email = $email;
        
    }

    public static function CargarUsuariosArrayCSV(){
        $array = [];
        $archivo = fopen("MOCK_DATA.csv", "r");
        if($archivo != FALSE){
            while(!feof($archivo)){
                $mensaje = fgets($archivo);
                if(!empty($mensaje)){
                    $mensaje = str_replace("\n","",$mensaje);
                    $auxArray = explode(",", $mensaje);
                    $usuario = new Usuario($auxArray[0], $auxArray[1]);
                    array_push($array, $usuario); 
                }
            }
            fclose($archivo);
        }
        return $array;
    }

    public static function VerificarUsuario($usuario,$baseDD){
        $mensaje = "Usuario no registrado";
        $flag= true;

        foreach ($baseDD as $v){
            if($v->_email == $usuario->_email && $v->_clave == $usuario->_clave){
                $mensaje = "Verificado";
                break;
            } else if ($v->_email == $usuario->_email && $v->_clave != $usuario->_clave){
                $mensaje = "Error en los datos";
                break;
            }
        }

        return $mensaje;
    }

}
?>