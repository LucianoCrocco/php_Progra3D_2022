<?php
include_once "./auto.php";
include_once "./garage.php";
/*
Aplicación Nº 20 (Auto - Garage)
Crear la clase Garage que posea como atributos privados:
_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
Realizar un constructor capaz de poder instanciar objetos pasándole como
parámetros: i. La razón social.
ii. La razón social, y el precio por hora.
Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
que mostrará todos los atributos del objeto.
Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
(sólo si el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);
Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo). Ejemplo:
$miGarage->Remove($autoUno);
Crear un método de clase para poder hacer el alta de un Garage y, guardando los datos en un
archivo garages.csv.
Hacer los métodos necesarios en la clase Garage para poder leer el listado desde el archivo
garage.csv
Se deben cargar los datos en un array de garage.
En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos
los métodos.
Neiner, Maximiliano – Villegas, Octavio PHP- 2016Página2
*/
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
//print($miGarage->Add($auto5)."<br>");

//Mostrar garage
//$miGarage->MostrarGarage();

//Equals
//print($miGarage->Equals($auto) ? "Esta en el garage<br>" : "No esta en el garage<br>");
//print($miGarage->Equals($auto2) ? "Esta en el garage<br>" : "No esta en el garage<br>");

//Intento remover un vehiculo ya contenido
//print($miGarage->Remove($auto3) ? "Auto removido correctamente<br>" : "El auto no se encuentra en el garage<br>");

//Intento remover un vehiculo no contenido
//print($miGarage->Remove($auto3) ? "Auto removido correctamente<br>" : "El auto no se encuentra en el garage<br>");


//Mostrar garage despues de borrar
//$miGarage->MostrarGarage();


//Guardar en CSV
//Garage::GuardarCSV($miGarage);

print(Garage::LeerCSV()."<br>"."<br>");
$garageCargado = Garage::CargarGaragesArray();
$garageCargado->MostrarGarage();


?>