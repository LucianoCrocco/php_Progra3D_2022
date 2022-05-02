<?php

class Usuario implements JsonSerializable{
    private string $_nombre;
    private string $_apellido;
    private string $_email;
    private int $_id;
    private string $_foto;

    public function __construct($nombre, $apellido, $email, $foto){
        try {
            $this->_id = Usuario::randomId();
            $this->setNombre($nombre);
            $this->setApellido($apellido);
            $this->setEmail($email);
            $this->setFoto($foto);
        } catch(Exception $ex){
            throw $ex;
        }

    }

    public function setNombre($nombre){
        if (is_string($nombre) && !empty($nombre)) {
            $this->_nombre = $nombre;
        } else {
            throw new Exception("Nombre invalido");
        }
    }

    public function setApellido($apellido){
        if (is_string($apellido) && !empty($apellido)) {
            $this->_apellido = $apellido;
        } else {
            throw new Exception("Apellido invalido");
        }
    }

    public function setEmail($email){
        if (is_string($email) && !empty($email)) {
            $this->_email = $email;
        } else {
            throw new Exception("Email invalido");
        }
    }

    public function setFoto($foto){
        if (is_string($foto) && !empty($foto)) {
            $this->_foto = $this->$_id."-".$foto;
        } else {
            throw new Exception("Foto invalida");
        }
    }
    public function getNombre(){
        return $this->_nombre;
    }
    public function getApellido(){
        return $this->_apellido;
    }
    public function getFoto(){
        return $this->_foto;
    }


    public function __set($property, $value){
        if(!property_exists($this, $property) || empty($value)){
            throw new Exception("Campos enviados erroneos"); 
        } 
        $this->property = $value;
    }

    public function __get($_id){
        return $this->_id;
    }

    private static function randomId(){
        return random_int(0,10000);
    }

    public static function MostrarUsuario($usuario){
        if(is_a($usuario, "Usuario")){
            return "$usuario->_id, $usuario->_nombre, $usuario->_apellido, $usuario->_email";
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
            $user = new Usuario($v->_nombre, $v->_apellido, $v->_email, $v->_foto);
            $user->_id = $v->_id;
            $user->_foto = $v->_foto;
            array_push($arrayNew, $user);
        }
        return $arrayNew;
    }

    public static function GuardarFotos($temporal, $destino){
        if(!move_uploaded_file($temporal, $destino)){
            throw new Exception("Error al mover el archivo.");
        }
    }

    public static function ListarUsuariosHTML($array){
        if(is_array($array)){        
            $mensaje = "<ul>";
            $append = "";
            foreach($array as $v){
                $append = "<li>".$v->getNombre().", ".$v->getApellido().", "."<img src='./Usuario/Fotos/".$v->getFoto()."' height=100px"."</li>".PHP_EOL;
                $mensaje = $mensaje.$append;
            }
        
            return $mensaje."</ul>";
        } else {
            throw new Exception("Se esperaba un array de usuarios");
        }
    }
}
?>