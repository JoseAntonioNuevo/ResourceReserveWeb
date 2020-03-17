<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<meta charset="utf-8">	
		<script src="https://kit.fontawesome.com/8876df5dfb.js"></script>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<?php 
	session_start();
	$id=($_SESSION['id']);
	$tipoUsuario=$_SESSION['tipo_user'];
	if (!isset($_SESSION['login_user'])) {
		header("location:login.php");
	}
	include "conexion.php";
	include "auto_liberar.proc.php";
	?> 
	<div class="general"> 
	 	<div id="menu">
	 		 <a href="index.php">Inventario</a>
	 		 <a href="reservas.php">Reservar</a>
	 		 <a href="liberarecursos.php">Liberar Recursos</a>
	 		 <a href="objetosenincidencia.php">Objetos en Incidencia</a>
	 		 <a href="hreservas.php">Historial de Reservas</a>
	 		 <a href="incidencias.php">Incidencias</a>
	 		 <?php
	 		 if ($tipoUsuario==0) {
	 		 echo "<a class='active' href='administracion.php'>Administración</a>";
	 		 }
	 		 ?>
	 		 <a href="logout.proc.php">Cerrar sesion</a>
		</div>
		<div class="derecha">
			<?php
			$nombre=$_SESSION['login_user'];
			$consulta="select nombre_Personal FROM personal where usuario_Personal = '".$nombre."'";
			$exe=mysqli_query($conn,$consulta);
			while ($casos=mysqli_fetch_array($exe)) {
		    echo "<a class='sesion' href=''>Bienvenido $casos[0]</a>";
			}	
		    ?>
		</div>
	</div>
	<br>

	<div id="main">
		<div><h1>Administración de reservas</h1></div>
	</div>
		<div id="main">Pedidos Activos</div>
	

<?php
$x= ("SELECT * FROM pedidos INNER JOIN personal ON personal.id_Personal=pedidos.personal_Pedidos INNER JOIN inventario ON pedidos.inventario_Pedidos=inventario.id_Inventario WHERE pedidos.finalizado='0'");

$resultado =mysqli_query($conn, $x);

	if (mysqli_num_rows($resultado)>0) {
	?>

<div id="main">
<table style="padding: 120px; margin-left: 4%;">
<tr class="esp2">
<th>Usuario</th>	
<th>Nombre</th>	
<th style="width: 800px;">Fecha</th>
<th>Hora Inicial</th>
<th>Hora Final</th>
<th>Opciones</th>
</tr>	

<?php

while ($value=mysqli_fetch_array($resultado)) {

echo "<tr>";
	echo "<td class='esp2'>".$value['usuario_Personal']."</td>";
	echo "<td class='esp2'>".$value['nombre_Pedidos']."</td>";
    echo "<td class='esp2'>".$value['fecha_inicio_Pedidos']."</td>";
	echo "<td class='esp2'>".$value['hora_inicio_Pedidos']."</td>";
	echo "<td class='esp2'>".$value['hora_final_Pedidos']."</td>";
	echo "<td class='esp2'><a href='actualizarReserva.php?reserva=".$value['id_Pedidos']."'><i style='color: green; margin-right:3%;' class='fas fa-edit'></i><a href='liberar2.php?inventario=".$value['nombre_Pedidos']."'><i style='color: red; margin-right:3%;' class='fas fa-trash'></i></a>";
}
?>
</table>
</div>
<?php
}else{
	?>
	<br><br>
	<div id="main">No hay pedidos activos </div>
	<?php
}

?>
<br><br><br>
<div id="main">
	<tr class="esp2">
	<a class="btnenviar" href="nuevaReserva.php">Nueva reserva</a>
</tr>
</div>
<br><br>

		<div id="main">
		<div>Pedidos pasados</div>
	</div>

	<div id="main">
<table style="padding: 120px; margin-left: 4%;">
<tr class="esp2">
<th>Usuario</th>	
<th>Nombre</th>	
<th style="width: 400px;">Fecha</th>
<th>Hora Inicial</th>
<th>Hora Final</th>
</tr>	

<?php
$x= ("SELECT * FROM pedidos INNER JOIN personal ON personal.id_Personal=pedidos.personal_Pedidos INNER JOIN inventario ON pedidos.inventario_Pedidos=inventario.id_Inventario WHERE pedidos.finalizado='1' ORDER BY pedidos.fecha_inicio_Pedidos ASC");

$resultado =mysqli_query($conn, $x);

while ($value=mysqli_fetch_array($resultado)) {

echo "<tr>";
	echo "<td class='esp2'>".$value['usuario_Personal']."</td>";
	echo "<td class='esp2'>".$value['nombre_Pedidos']."</td>";
    echo "<td class='esp2'>".$value['fecha_inicio_Pedidos']."</td>";
	echo "<td class='esp2'>".$value['hora_inicio_Pedidos']."</td>";
	echo "<td class='esp2'>".$value['hora_final_Pedidos']."</td>";
}
?>
</table>
<br><br><br>
<a class="btnenviar" href="administracion.php">Volver</a>
<br><br>
</div>