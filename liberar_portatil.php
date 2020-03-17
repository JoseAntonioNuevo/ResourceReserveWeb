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
$user=($_SESSION['login_user']);
$id=($_SESSION['id']);
$consulta="SELECT inventario.nombre_Inventario, pedidos.fecha_inicio_Pedidos, pedidos.hora_inicio_Pedidos, pedidos.hora_final_Pedidos, pedidos.id_Pedidos from inventario INNER JOIN pedidos ON pedidos.inventario_Pedidos=inventario.id_Inventario where inventario.estado_Inventario='1,2'AND inventario.tipo_Inventario='Portatil' AND pedidos.personal_Pedidos='$id' AND pedidos.finalizado=0 ";
$exe=mysqli_query($conn,$consulta);
if (mysqli_num_rows($exe)<1) {
	echo "<tr>";
	echo "<td class='centrartabla'><div style='margin-bottom:5%; margin-top:2%;'>No tienes portatiles reservados<td>";
	echo "</div>";	
}else{
while ($casos=mysqli_fetch_array($exe)) {
	echo "<tr>";
	echo "<td class='centrartabla'><div style='margin-bottom:5%; margin-top:2%;'>".$casos[0];"<td>";
	$inventario=$casos[0];
	$id_Pedidos=$casos['id_Pedidos'];
echo "<form action='liberar.php' method='POST'>";
echo $casos['fecha_inicio_Pedidos']."<br>".$casos['hora_inicio_Pedidos']." - ".$casos['hora_final_Pedidos']."<br>";
echo "<input type='hidden' value='$inventario' name='inventario'>";
echo "<input type='hidden' value='$id_Pedidos' name='id_pedidos'>";
echo "<input style='background-color:#04b530;' class='btnenviar' type='submit' value='Liberar Reserva' name='devolver'>";
echo "</form></div>";	
}
}
 echo "<tr>";
?>
</table>


</body>
</html>