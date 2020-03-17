<!DOCTYPE html>
<html>
<head>
	<title>Reservar inventario</title>
	<meta charset="utf-8">	
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<body>
	<?php
session_start();
	$id=($_SESSION['id']);
		$tipoUsuario=$_SESSION['tipo_user'];
	if (!isset($_SESSION['login_user'])) {
		header("location:login.php");
}
			include "conexion.php";
			$pag="liberarecursos.php";
			include "auto_liberar.proc.php";
?>
<div class="general">
	 	<div id="menu">
	 		 <a href="index.php">Inventario</a>
	 		 <a href="reservas.php">Reservar</a>
	 		 <a class="active" href="liberarecursos.php">Liberar Recursos</a>
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


<!-- 

Se muestran todos las reservas realizadas por el usuario y le da la posibilidad de liberarlas antes de hora.

-->


	<div id="main">
		<div><h1>Liberar Recursos</h1></div>
	</div>
	<?php
include "banner.html";
?>
	<div id="recursos"><br> 
			<a name='salas' id='salas'></a>
			<div class="salas">
			<?php 

			echo "<br>";
			include "liberar_salas.php";
			echo "<br>";
			?>
		</div>
		<br><br>
		<a name='moviles' id='moviles'></a>
		<div class="moviles">
			<?php 
			echo "<br>";
			include "liberar_moviles.php";
			echo "<br>";
			?>
		</div>
		<br><br>
		<a name='portatiles' id='portatiles'></a>
		<div class="portatiles">
			<?php 
			echo "<br>";
			include "liberar_portatil.php";
			echo "<br>";
			?>
		</div>
		<br><br>
		<a name='proyectores' id='proyectores'></a>
		<div class="proyectores">
			<?php 
			echo "<br>";
			include "liberar_proyetor.php";

			echo "<br>";
			?>
		</div>
	</div><br>
</body>
</html>
