<?php
/*
Luciano Crocco
Aplicación Nº 9 (Arrays asociativos)  
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que 
contenga como elementos: ‘​color’​, ‘​marca’​, ‘​trazo’​ y ‘​precio’​. Crear, cargar y mostrar tres 
lapiceras
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

foreach($lapiceraUno as $key => $value){
    print("$key: $value<br>");
}
foreach($lapiceraDos as $key => $value){
    print("$key: $value<br>");
}
foreach($lapiceraTres as $key => $value){
    print("$key: $value<br>");
}

/*
$lapiceras = array($lapiceraUno, $lapiceraDos, $lapiceraTres);

foreach($lapiceras as $key => $value){
    $key++;
    print("------Lapicera $key------<br>");
    foreach($value as $k => $v){
        print("$k: $v<br>");
    }   
}*/
?>