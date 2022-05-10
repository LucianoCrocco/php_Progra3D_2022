<?php

include_once "./hamburgesa.php";
include_once "./Venta.php";
include_once "./servidor.php";

if(isset($_POST["email"]) && isset($_POST["nombre"])  && isset($_POST["tipo"])  && isset($_POST["cantidad"]) && isset($_FILES["foto"]["name"])){
    try {
        if(Hamburgesa::ExisteTipoONombre($_POST["nombre"], $_POST["tipo"]) == "Si hay"){
            $hamburgesa = new Hamburgesa($_POST["nombre"], 12312, $_POST["tipo"], $_POST["cantidad"], "NULL");
            Hamburgesa::ManejadorVentaHamburgesa($hamburgesa);
            $venta = new Venta();
            $servidor = new Servidor();
            $servidor->CargarVenta($venta, $_POST["email"], $hamburgesa);

            $destino = "./ImagenesDeLaVenta/".$_POST["tipo"]."-".$_POST["nombre"]."-".$_POST["email"].$_FILES["foto"]["name"];
            $origen = $_FILES["foto"]["tmp_name"];
            Venta::GuardarFotos($origen, $destino);
        }
    } catch (Exception $ex){
        echo $ex->getMessage();
    }
}else {
    echo 'Parametros de la petición no validos';
}

?>
