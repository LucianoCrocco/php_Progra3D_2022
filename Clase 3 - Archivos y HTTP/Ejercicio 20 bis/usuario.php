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
                $retorno = fputs($archivo, Usuario::MostrarUsuario($usuario).PHP_EOL);
                fclose($archivo);
            }
        }
        return $retorno;
    }

}
?>