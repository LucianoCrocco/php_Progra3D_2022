<?php
//INDICO CUAL SERA EL DESTINO DEL ARCHIVO SUBIDO
$destino = "archivos/" . $_FILES["archivo"]["name"];

$uploadOk = TRUE;

//PATHINFO RETORNA UN ARRAY CON INFORMACION DEL PATH
//RETORNA : NOMBRE DEL DIRECTORIO; NOMBRE DEL ARCHIVO; EXTENSION DEL ARCHIVO

//PATHINFO_DIRNAME - retorna solo nombre del directorio
//PATHINFO_BASENAME - retorna solo el nombre del archivo (con la extension)
//PATHINFO_EXTENSION - retorna solo extension
//PATHINFO_FILENAME - retorna solo el nombre del archivo (sin la extension)

//echo var_dump( pathinfo($destino));die();

$tipoArchivo = pathinfo($destino, PATHINFO_EXTENSION);


//VERIFICO QUE EL ARCHIVO NO EXISTA
if (file_exists($destino)) {
    echo "El archivo ya existe. Verifique!!!";
    $uploadOk = FALSE;
}
//VERIFICO EL TAMAÑO MAXIMO QUE PERMITO SUBIR
if ($_FILES["archivo"]["size"] > 500000) {
    echo "El archivo es demasiado grande. Verifique!!!";
    $uploadOk = FALSE;
}
//VERIFICO SI ES UNA IMAGEN O NO
//var_dump(getimagesize($_FILES["archivo"]["tmp_name"]));die();

//OBTIENE EL TAMAÑO DE UNA IMAGEN, SI EL ARCHIVO NO ES UNA
//IMAGEN, RETORNA FALSE
$esImagen = getimagesize($_FILES["archivo"]["tmp_name"]);

if($esImagen === FALSE) {//NO ES UNA IMAGEN

	//SOLO PERMITO CIERTAS EXTENSIONES
	if($tipoArchivo != "doc" && $tipoArchivo != "txt" && $tipoArchivo != "rar") {
		echo "Solo son permitidos archivos con extension DOC, TXT o RAR.";
		$uploadOk = FALSE;
	}
}
else {// ES UNA IMAGEN

	//SOLO PERMITO CIERTAS EXTENSIONES
	if($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif"
		&& $tipoArchivo != "png") {
		echo "Solo son permitidas imagenes con extension JPG, JPEG, PNG o GIF.";
		$uploadOk = FALSE;
	}

}

//VERIFICO SI HUBO ALGUN ERROR, CHEQUEANDO $uploadOk
if ($uploadOk === FALSE) {

    echo "<br/>NO SE PUDO SUBIR EL ARCHIVO.";

} else {
	//MUEVO EL ARCHIVO DEL TEMPORAL AL DESTINO FINAL
    if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino)) {
        echo "<br/>El archivo ". basename( $_FILES["archivo"]["name"]). " ha sido subido exitosamente.";
    } else {
        echo "<br/>Lamentablemente ocurri&oacute; un error y no se pudo subir el archivo.";
    }
}

?>