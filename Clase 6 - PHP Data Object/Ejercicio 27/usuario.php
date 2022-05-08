<?php

class Usuario{
    const MAXIMO_DE_CARACTERES = 128;
    private string $_nombre;
    private string $_apellido;
    private string $_mail;
    private int $_clave;
    private string $_localidad;
    private string $_fechaRegitro;

    public function __construct($nombre, $apellido, $clave, $mail, $localidad){
        try {
            $this->setNombre($nombre);
            $this->setApellido($apellido);
            $this->setClave($clave);
            $this->setMail($mail);
            $this->setLocalidad($localidad);
            $this->setFechaRegistro();
        } catch(Exception $ex){
            throw $ex;
        }

    }

    public function setNombre($nombre){
        if (is_string($nombre) && !empty($nombre) && strlen($nombre) <= self::MAXIMO_DE_CARACTERES) {
            $this->_nombre = $nombre;
        } else {
            throw new Exception("Nombre invalido");
        }
    }

    public function setApellido($apellido){
        if (is_string($apellido) && !empty($apellido) && strlen($apellido) <= self::MAXIMO_DE_CARACTERES) {
            $this->_apellido = $apellido;
        } else {
            throw new Exception("Apellido invalido");
        }
    }

    public function setClave($clave){
        if (is_string($clave) && !empty($clave) && strlen($clave) <= self::MAXIMO_DE_CARACTERES) {
            $this->_clave = $clave;
        } else {
            throw new Exception("Clave invalida");
        }
    }

    public function setMail($mail){
        if (is_string($mail) && !empty($mail) && strlen($mail) <= self::MAXIMO_DE_CARACTERES) {
            $this->_mail = $mail;
        } else {
            throw new Exception("Mail invalido");
        }
    }

    public function setLocalidad($localidad){
        if (is_string($localidad) && !empty($localidad) && strlen($localidad) <= self::MAXIMO_DE_CARACTERES) {
            $this->_localidad = $localidad;
        } else {
            throw new Exception("Localidad Invalida");
        }
    }

    public function setFechaRegistro(){
        $this->_fechaRegistro = date("Y-m-d");
    }

    public function getNombre(){
        return $this->_nombre;
    }

    public function getApellido(){
        return $this->_apellido;
    }

    public function getClave(){
        return $this->_clave;
    }

    public function getMail(){
        return $this->_mail;
    }

    public function getLocalidad(){
        return $this->_localidad;
    }

    public function getFechaRegistro(){
        return $this->_fechaRegistro;
    }
}
?>