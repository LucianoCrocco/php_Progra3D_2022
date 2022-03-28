<?php
/*
Luciano Crocco
Aplicación No 2 (Mostrar fecha y estación)
Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.
 */
date_default_timezone_set("America/Buenos_Aires");

echo "Fecha: ", date("l, j F o"), "<br>";
echo "Fecha: ", date("d/m/y"), "<br>";
$fecha = date("j F Y G:i:s a");
echo "Fecha: ", $fecha, "<br>";
$dia = (int)date("z");

if((int) date("L")){
    if($dia <= 79 || $dia >= 355){
        echo 'Estacion Verano';
    } else if ($dia <= 171){
        echo 'Estacion Otoño';
    } else if($dia <= 263){
        echo 'Estacion Invierno';
    } else {
        echo 'Estacion Primavera';
    }
} else {
    if($dia <= 78 || $dia >= 354){
        echo 'Estacion Verano';
    } else if ($dia <= 170){
        echo 'Estacion Otoño';
    } else if($dia <= 262){
        echo 'Estacion Invierno';
    } else {
        echo 'Estacion Primavera';
    }
}


?>