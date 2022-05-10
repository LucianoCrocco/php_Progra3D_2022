<?php

    include_once "./pizza.php";

    if(isset($_GET["sabor"]) && isset($_GET["precio"]) && isset($_GET["tipo"]) && isset($_GET["cantidad"])){
        try {
            $arrayPizza = Pizza::CargarPizzaArrayJSON();
            $pizza = new Pizza($_GET["sabor"], $_GET["precio"], $_GET["tipo"], $_GET["cantidad"]);
            
            Pizza::ManejadorAgregarPizza($pizza);
        } catch (Exception $ex){
            echo $ex->getMessage();
        }
    } else {
        echo 'Parametros de la petición no validos';
    }
?>