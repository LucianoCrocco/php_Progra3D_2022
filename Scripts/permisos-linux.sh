#!/bin/bash
 
#Script para poder crear archivos en xampp. Guia de referencia: https://linuxgx.blogspot.com/2018/09/establecer-permisos-la-carpeta-htdocs.html
#Poner la carpeta a modificar y el usuario descomentado ambas variables.

USUARIO="luciano"
CARPETA="Programacion_3"

if [ $USER == "root" ]; then
 echo 'Permisos establecidos'
 sudo chown -R daemon:$USUARIO /opt/lampp/htdocs/$CARPETA
 sudo chmod -R 775 /opt/lampp/htdocs/$CARPETA
else
 echo 'Inicia como root'
fi

