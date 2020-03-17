<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<meta charset="utf-8">	
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
	$pag="index.php";
	include "auto_liberar.proc.php";
	
	?> 
	<div class="general"> 
	 	<div id="menu">
	 		 <a class="active" href="index.php">Inventario</a>
	 		 <a href="reservas.php">Reservar</a>
	 		 <a href="liberarecursos.php">Liberar Recursos</a>
	 		 <a href="objetosenincidencia.php">Objetos en Incidencia</a>
	 		 <a href="hreservas.php">Historial de Reservas</a>
	 		 <a href="incidencias.php">Incidencias</a>
	 		 <?php
	 		 if ($tipoUsuario==0) {
	 		 echo "<a href='administracion.php'>Administración</a>";
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


<!--

Se muestran todas las reservas presentes y futuras que están activas y aún no han finalizado.
Además se muestra el estado de tosos los objetos del inventario. 

-->	


		<div><h1>Estado de los recursos</h1></div>
	</div>
<?php
include "banner.html";
?>
<div id="main">
<a name='salas' id='salas'></a>
<div class="salas">
<div id="main">
	<h2>Salas</h2>	
	<?php
    include "salas.php";
	?>
</div>
</div>

<?php
include "sala_estado.php";
?>	
</div>
    <div id="main">
    <a name='moviles' id='moviles'></a>
	<div class="moviles">
    <div id="main">
	<h2>Moviles</h2>	
	<?php
    include "moviles.php";
	?>
</div>
</div>

<?php
include "moviles_estado.php";
?>	
</div>
<div id="main">
<a name='portatiles' id='portatiles'></a>
	<div class="portatiles">
    <div id="main">
	<h2>Portatiles</h2>	
	<?php
    include "portatiles.php";
	?>
</div>
</div>
<?php
include "portatiles_estado.php";
?>	
</div>
<div id="main">
<a name='proyectores' id='proyectores'></a>
	<div class="proyectores">
    <div id="main">
	<h2>Proyectores</h2>	
	<?php
    include "proyectores.php";
	?>
</div>
</div>
<?php
include "proyectores_estado.php";
?>	
</div>

</body>
</html>

<?php
?>