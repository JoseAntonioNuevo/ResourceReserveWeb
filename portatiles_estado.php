<!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta charset="utf-8">	
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<?php  
$consulta="SELECT nombre_Inventario,estado_inventario,reservado_Inventario from inventario where tipo_inventario='Portatil'";

$exe=mysqli_query($conn,$consulta);
?>
	<h3 style="padding: 20px;">Estado de los portatiles</h3>
<table class="ancho3">

<?php

while ($casos=mysqli_fetch_array($exe)) {
	echo "<tr>";

	if ($casos[1]=="1") {
		$estado="Buen Estado";
		$color1="green";
	}else if ($casos[1]=="2") {
		$estado="Gastado";
		$color1="yellow";
	}else if ($casos[1]=="3") {
		$estado="En reparacion";
		$reserva="No disponible";
		$color1="red";
		$color2="red";
		
	}
	echo "<td class='centrartabla'>".$casos[0]."</td> <td class='centrartabla'> Estado: <span class='".$color1."''>".$estado."</span> </td> <td class='centrartabla'></td><br>";

}
 echo "<tr>";
?>
</table>


</body>
</html>
<?php
