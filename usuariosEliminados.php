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
<br>
<div id="main">
Usuarios Eliminados
</div>
<?php

$x= ("SELECT * FROM personal WHERE estado='1'");

$resultado =mysqli_query($conn, $x);
if (mysqli_num_rows($resultado)>0) {

?>
<div id="main">
<table style="padding: 120px; margin-left: 4%;">
<tr class="esp2">
<th>Logo</th>	
<th>Usuario</th>	
<th>Nombre</th>
<th>Tipo</th>
<th>Restaurar</th>
</tr>	

<?php
}else{
	?>
<div id="main"><br><br>No hay usuarios eliminados <br><br>	
<?php
}

while ($value=mysqli_fetch_array($resultado)) {
$u=$value['usuario_Personal'];	

echo "<tr>";
	echo "<td class='esp2'><img class='logos' src='./img/".$value['logo']."'></td>";
	echo "<td class='esp2'>".$value['usuario_Personal']."</td>";
	echo "<td class='esp2'>".$value['nombre_Personal']."</td>";
	echo "<td class='esp2'>".$u."</td>";
	echo "<td class='esp2'><a href='cambiosUsers.proc.php?userblock=".$value['id_Personal']."&caso=2'> <i style='color:red;' class='fas fa-times fa-2x'></i></a></td>";
echo "</tr>";
}

?>		

</table>
<br><br>
<a class="btnenviar" href="administracion_usuarios.php">Volver</a>
<br><br>
</div>
</table>
</div>
<br><br>