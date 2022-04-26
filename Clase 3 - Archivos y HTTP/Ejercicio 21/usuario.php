<?php

class Usuario {
    private string $_nombre;
    private string $_apellido;
    private string $_email;

    public function __construct($nombre, $apellido, $email){
        $this->_nombre = $nombre;
        $this->_apellido = $apellido;
        $this->_email = $email;
        
    }

    public static function MostrarUsuario($usuario){
        if(is_a($usuario, "Usuario")){
            return "$usuario->_nombre, $usuario->_apellido, $usuario->_email";
        }
    }

    public static function GuardarUsuarioCSV($usuario){
        $retorno = false;
        if(is_a($usuario, "Usuario")){
            $archivo = fopen("usuarios.csv", "a+");
            if($archivo != FALSE){
                $mensaje = Usuario::MostrarUsuario($usuario);
                $mensaje = str_replace(", ",",",$mensaje);
                $retorno = fputs($archivo, Usuario::MostrarUsuario($usuario).PHP_EOL);
                fclose($archivo);
            }
        }
        return $retorno;
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
                    $usuario = new Usuario($auxArray[0], $auxArray[1], $auxArray[2]);
                    array_push($array, $usuario); 
                }
            }
            fclose($archivo);
        }
        return $array;
    }

    public static function GenerarListaArrayUsuarios($usuarios){
        $mensaje = NULL;
        if($usuarios != NULL && sizeof($usuarios) > 0){
            $mensaje = '<ul>'.PHP_EOL;
            foreach($usuarios as $v){
                $auxUsuario = Usuario::MostrarUsuario($v);
                $auxUsuario = str_replace("\n","",$auxUsuario);
                $mensaje = $mensaje."<li>$auxUsuario</li>".PHP_EOL; 
            }
            $mensaje = $mensaje."</ul>";
        }
        return $mensaje;
    }
}
?>