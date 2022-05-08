<?php

include_once './producto.php';

switch($_SERVER["REQUEST_METHOD"]){
    case 'POST':
        try {
            $producto = new Producto($_POST["codigo_de_barras"], $_POST["nombre"], $_POST["tipo"], $_POST["stock"], $_POST["precio"]);
            $mensaje = Producto::ManejadorAgregarProductos($producto);
            echo $mensaje;
        } catch (Exception $ex){
            echo "No se pudo hacer";
        }        
        break;

    default:
        echo "Peticion no valida";
        break;
}


?>