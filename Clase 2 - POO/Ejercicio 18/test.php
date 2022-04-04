<?php
include_once "./auto.php";
include_once "./garage.php";

//Autos
$auto = new Auto("Ford", "Azul");
$auto2 = new Auto("Ford", "Rojo");
$auto3 = new Auto ("Chevrolet", "Plateado", 12500);
$auto4 = new Auto ("Chevrolet", "Plateado", 15000);
$auto5 = new Auto ("Toyota", "Amarillo", 15000, "25/06/78");

//Garage instanciacion y agregar autos
$miGarage = new Garage("Estacionamiento pepe");
$miGarage->Add($auto2);
$miGarage->Add($auto3);
$miGarage->Add($auto4);
$miGarage->Add($auto5);

//Intento agregar un vehiculo ya contenido
print($miGarage->Add($auto5)."<br>");

//Mostrar garage
$miGarage->MostrarGarage();

//Equals
print($miGarage->Equals($auto) ? "Esta en el garage<br>" : "No esta en el garage<br>");
print($miGarage->Equals($auto2) ? "Esta en el garage<br>" : "No esta en el garage<br>");

//Intento remover un vehiculo ya contenido
$miGarage->Remove($auto3);

//Intento remover un vehiculo no contenido
print($miGarage->Remove($auto3)."<br>");


//Mostrar garage despues de borrar
$miGarage->MostrarGarage();

?>