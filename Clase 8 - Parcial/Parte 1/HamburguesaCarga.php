<?php

include_once "./hamburgesa.php";

if(isset($_POST["nombre"]) && isset($_POST["precio"]) && isset($_POST["tipo"]) && isset($_POST["cantidad"]) && isset($_FILES["foto"]["name"])){
    try {
        $arrayHamburgesa = Hamburgesa::CargarHamburgesasArrayJSON();
        $hamburgesa = new Hamburgesa($_POST["nombre"], $_POST["precio"], $_POST["tipo"], $_POST["cantidad"], $_FILES["foto"]["name"]);

        Hamburgesa::ManejadorAgregarHamburgesa($hamburgesa);
        $destino = "./ImagenesDeHamburgesa/".$hamburgesa->getFoto();
        $origen = $_FILES["foto"]["tmp_name"];
        Hamburgesa::GuardarFotos($origen, $destino);

    } catch (Exception $ex){
        echo $ex->getMessage();
    }
} else {
    echo 'Parametros de la petición no validos';
}
?>