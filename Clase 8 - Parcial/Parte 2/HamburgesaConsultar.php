<?php

include_once "./hamburgesa.php";

if(isset($_POST["nombre"]) && isset($_POST["tipo"])){
    $mensaje =  Hamburgesa::ExisteTipoONombre($_POST["nombre"] ,$_POST["tipo"]);
    echo $mensaje;
}else {
    echo 'Parametros de la petición no validos';
}
?>