<?php
	require_once('clases/producto.php');
?>
<html>
<head>
	<title>Ejemplo de ALTA-LISTADO - con archivos -</title>

	<meta charset="UTF-8">
		
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="estilo.css">

</head>
<body>
	<a class="btn btn-info" href="index.html">Menu principal</a>

	<div class="container">
		<div class="page-header">
			<h1>Ejemplos de Grilla</h1>      
		</div>
		<div class="CajaInicio animated bounceInRight">
			<h1>Listado de PRODUCTOS</h1>

<?php 

$ArrayDeProductos = Producto::TraerTodosLosProductos();

echo "<table class='table'>
		<thead>
			<tr>
				<th>  COD. BARRA </th>
				<th>  NOMBRE     </th>
				<th>  FOTO       </th>
			</tr> 
		</thead>";   	

	foreach ($ArrayDeProductos as $prod){

		echo " 	<tr>
					<td>".$prod->GetCodBarra()."</td>
					<td>".$prod->GetNombre()."</td>
					<td><img src='archivos/".$prod->GetPathFoto()."' width='100px' height='100px'/></td>
				</tr>";
	}	
echo "</table>";		
?>
		</div>
	</div>
</body>
</html>