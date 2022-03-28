<?php
/*
Luciano Crocco
Aplicación Nº 10 (Arrays de Arrays)  
Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que 
contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los 
Arrays de Arrays.
 */

$arrayColor = array("Rojo", "Azul", "Verde");
$arrayMarca = array("Bic", "Faber Castell", "Simball");
$arrayTrazo = array("Fino", "Regular", "Grueso");
$arrayPrecio = array(1000, 500, 10000);

$lapiceraUno = array(
    "Color" => $arrayColor[array_rand($arrayColor, 1)],
    "Marca" => $arrayMarca[array_rand($arrayMarca, 1)],
    "Trazo" => $arrayTrazo[array_rand($arrayTrazo, 1)],
    "Precio" => $arrayPrecio[array_rand($arrayPrecio, 1)]
);
$lapiceraDos = array(
    "Color" => $arrayColor[array_rand($arrayColor, 1)],
    "Marca" => $arrayMarca[array_rand($arrayMarca, 1)],
    "Trazo" => $arrayTrazo[array_rand($arrayTrazo, 1)],
    "Precio" => $arrayPrecio[array_rand($arrayPrecio, 1)]
);
$lapiceraTres = array(
    "Color" => $arrayColor[array_rand($arrayColor, 1)],
    "Marca" => $arrayMarca[array_rand($arrayMarca, 1)],
    "Trazo" => $arrayTrazo[array_rand($arrayTrazo, 1)],
    "Precio" => $arrayPrecio[array_rand($arrayPrecio, 1)]
);

$lapiceras = array($lapiceraUno, $lapiceraDos, $lapiceraTres);

foreach($lapiceras as $key => $value){
    $key++;
    print("------Lapicera $key------<br>");
    foreach($value as $k => $v){
        print("$k: $v<br>");
    }   
}
?>