<!DOCTYPE html>
<html>
<head>
	<title>Reservar inventario</title>
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
			$pag="reservas.php";
			include "auto_liberar.proc.php";
?>

<div class="general">
	 	<div id="menu">
	 		 <a href="index.php">Inventario</a>
	 		 <a class="active" href="reservas.php">Reservar</a>
	 		 <a href="liberarecursos.php">Liberar Recursos</a>
	 		 <a href="objetosenincidencia.php">Objetos en Incidencia</a>
	 		 <a href="hreservas.php">Historial de Reservas</a>
	 		 <a href="incidencias.php">Incidencias</a>
	 		 <?php
	 		 if ($tipoUsuario==0){
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
		    echo "<a class='sesion' href=''>Bienvenido $casos[0]</a><br>";
			}	
		    ?>
		</div>
</div>
<br>
<div id="main">
	<div><a href=""><h1>Reservar Recursos</h1></a></div>
</div>

<?php
include "banner.html";
?>

<!-- Se muestran todos los recursos disponibles para reservar excepto los que están en incidencia. 
      
     Además se muestra un mensaje en caso de que el recurso se encuentre reservado en ese preciso momento.
-->

		<div id="recursos">
	<a name='salas' id='salas'></a>
	<h2>Salas</h2>
	<div class="salas">
	<?php
	include "reserva_salas.php";
	echo "<br>";
	?>
	</div>
	<a name='moviles' id='moviles'></a>
		<h2>Moviles</h2>
	<div class="moviles">
		<?php
		include "reserva_moviles.php";
		echo "<br>";
		?>
	</div>
	<a name='portatiles' id='portatiles'></a>
		<h2>Portatiles</h2>
	<div class="portatiles">
		<?php
		include "reserva_portatil.php";
		echo "<br>";
		?>
	</div>
	<a name='proyectores' id='proyectores'></a>
		<h2>Proyectores</h2>
	<div class="proyectores">
	<?php
	include "reserva_proyector.php";
	echo "<br>";
	?>
	</div>
</div>
</body>
</html>
