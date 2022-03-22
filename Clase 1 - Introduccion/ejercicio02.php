<?php
/**
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

switch((int)date("m")){
    case 12: case 1: case 2: case 3:
        echo "Estacion Verano";
        break;
    case 4: case 5: case 6:
        echo 'Estacion Otoño';
        break;
    case 7: case 8: case 9:
        echo 'Estacion Invierno';
        break;
    default:
        print ('Estacion Primavera');
        break;
}
/* Arreglarlo para tener en cuenta los dias del mes */
?>