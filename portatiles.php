<!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta charset="utf-8">	
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>

<?php
$x="SELECT inventario.nombre_Inventario, inventario.estado_inventario, inventario.reservado_Inventario, pedidos.fecha_inicio_Pedidos, pedidos.fecha_final_Pedidos, pedidos.hora_inicio_Pedidos, pedidos.hora_final_Pedidos, personal.usuario_Personal from inventario INNER JOIN pedidos ON id_Inventario=inventario_Pedidos INNER JOIN personal ON personal.id_Personal=pedidos.personal_Pedidos WHERE inventario.tipo_inventario='Portatil' AND inventario.reservado_Inventario=1 AND pedidos.finalizado=0 ORDER BY inventario.descripcion_Inventario";

$resultado =mysqli_query($conn, $x);

if (mysqli_num_rows($resultado)>0) {

?>
<table style="padding: 120px; margin-left: 4%;">
<tr class="esp2">	
<th>Nombre</th>	
<th>Fecha</th>	
<th>Hora de inicio</th>
<th>Hora de fin</th>
<th>Reservado por</th>
</tr>
<?php

while ($value=mysqli_fetch_array($resultado)) {

echo "<tr>";
	echo "<td class='esp2'>".$value['nombre_Inventario']."</td>";
	echo "<td class='esp2'>".$value['fecha_inicio_Pedidos']."</td>";
	echo "<td class='esp2'>".$value['hora_inicio_Pedidos']."</td>";
	echo "<td class='esp2'>".$value['hora_final_Pedidos']."</td>";
	echo "<td class='esp2'>".$value['usuario_Personal']."</td>";
}
}else{
	echo "<h3 class='ancho5'>No hay ningún portatil reservado.</h3>";
}
?>
</table>