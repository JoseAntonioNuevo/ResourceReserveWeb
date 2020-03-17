<!DOCTYPE html>
<html>
<head>
	<title>Reservar inventario</title>
	<meta charset="utf-8">	
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<table class="ancho">
<?php
include "conexion.php";
$today=date('Y-m-d');
$hour=date('H').":00";
$consulta="select nombre_Inventario from inventario where tipo_Inventario='Portatil' and estado_Inventario!='3'";
$exe=mysqli_query($conn,$consulta);
while ($casos=mysqli_fetch_array($exe)) {
		echo "<div class='nombre_espacio'><tr>";
	echo "<td class='centrartabla'>".$casos[0];"</td><br>";
	$inventario=$casos[0];


$consulta2="select * from pedidos where fecha_final_Pedidos='$today' and hora_inicio_Pedidos='$hour' and nombre_Pedidos='$inventario' and finalizado='0'";
$exe2=mysqli_query($conn,$consulta2);
$resultado=mysqli_num_rows($exe2);

if ($resultado>0) {
	echo "<div style='margin-left:42%; margin-top:20px; background-color:#eb4034;' class='nodisponible2' id=main2><p style='color:white;'>Reservado en este momento</p></div>";
}
include "datos_inventario.php";
}
 echo "<tr>";
?>
</table>
</body>
</html>