<?php

class Usuario implements JsonSerializable{
    private string $_nombre;
    private string $_apellido;
    private string $_email;
    private int $_id;

    public function __construct($nombre, $apellido, $email){
        $this->_nombre = $nombre;
        $this->_apellido =  $apellido;
        $this->_email = $email;
        $this->_id = Usuario::randomId();
    }

    public function __set($property, $value){
        if(property_exists($this, $property)){
            $this->property = $value;
        }
    }

    public function __get($_id){
        return $this->_id;
    }

    private static function randomId(){
        return random_int(0,10000);
    }

    public static function MostrarUsuario($usuario){
        if(is_a($usuario, "Usuario")){
            return "$usuario->_nombre, $usuario->_apellido, $usuario->_email, $usuario->_id";
        }
    }

    public function jsonSerialize(){
        return get_object_vars($this);
    }

    public static function GuardarUsuariosJSON($arrayUsuarios){
        $retorno = false;
        if(is_array($arrayUsuarios)){
            $archivo = fopen("usuarios.json", "w");
            if($archivo != FALSE){
                $json = json_encode($arrayUsuarios);
                $retorno = fputs($archivo, $json);
                fclose($archivo);
            }
        }
        return $retorno;
    }

    public static function CargarUsuariosArrayJSON(){
        $array = [];
        $archivo = fopen("usuarios.json", "r");
        if($archivo != FALSE){
            $mensaje = fread($archivo, filesize("usuarios.json"));
            $arrayAux = json_decode($mensaje);
            $array = Usuario::GenerarArrayUsuarios($arrayAux);
            fclose($archivo);
        }
        return $array;
    }

    private static function GenerarArrayUsuarios($array){
        $arrayNew = [];
        foreach($array as $v){
            $user = new Usuario($v->_nombre, $v->_apellido, $v->_email);
            $user->_id = $v->_id;
            array_push($arrayNew, $user);
        }
        return $arrayNew;
    }
/*
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
    }*/
}
?>