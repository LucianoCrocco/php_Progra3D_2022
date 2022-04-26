<?php

include_once './producto.php';

try {
    $producto = new Producto(123456, "Uvas", "solido", 1, 20000);
    
} catch (Exception $ex){
    print($ex->getMessage());
}

?>