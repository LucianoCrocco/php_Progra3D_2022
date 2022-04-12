<?php
$destino = "uploads/".$_FILES["archivo"]["name"];
move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino);
?>