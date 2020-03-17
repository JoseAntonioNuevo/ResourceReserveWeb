<!DOCTYPE html>
<html>
<head>
	<title>Objetos En Incidencia</title>
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
			$pag="objetosenincidencia.php";
			include "auto_liberar.proc.php";
?>
<div class="general">
	 	<div id="menu">
	 		 <a href="index.php">Inventario</a>
	 		 <a href="reservas.php">Reservar</a>
	 		 <a href="liberarecursos.php">Liberar Recursos</a>
	 		 <a class="active" href="objetosenincidencia.php">Objetos en Incidencia</a>
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
		</div><br>
</div>
	<div id="main">
	<div><a href=""><h1>Historial de Incidencias</h1></a></div>
	</div>
	<div id="recursos4">
	<?php
	$consulta="SELECT inventario.nombre_Inventario,incidencias.descripcion_Incidencia,incidencias.fecha_inicio_Incidencia,incidencias.fecha_fin_Incidencia,incidencias.hora_inicio_Incidencia,incidencias.hora_fin_Incidencia FROM incidencias inner join inventario on inventario.id_Inventario=incidencias.objeto_Incidencia";
	$var=mysqli_query($conn,$consulta);
	while ($array=mysqli_fetch_array($var)) {
		$nombre=$array[0];
		$descripcion=$array[1];
		$horaini=$array[4];
		$horafin=$array[5];
		$fechaini=$array[2];
		$fechafin=$array[3];
		echo "Nombre del objeto: ".$nombre."<br>Descripcion: ".$descripcion."<br>Fecha y hora de inicio: ".$fechaini." a las ".$horaini;
		if (is_null($horafin)) {
			echo"<br>Incidencia activa<br><br>";
		}else{
			echo "<br>Fecha y hora finales: ".$fechafin." a las ".$horafin."<br><br>";
		}
	}
?>
</div>
</body>
</html>