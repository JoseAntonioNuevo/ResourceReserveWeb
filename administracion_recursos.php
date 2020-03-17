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
		<div><h1>Administración de recursos</h1></div>
	
		<div id="main">Recursos</div>

<h2>Recursos Actuales</h2>
<?php

$x= ("SELECT * FROM inventario");
$resultado =mysqli_query($conn, $x);
while ($value=mysqli_fetch_array($resultado)) {
echo "<option>".$value['nombre_Inventario']."<span style='margin-left:80px;'></span> ".$value['tipo_Inventario']."</option>";
}
?>
</tr>

<br><br><br>
<a class="btnenviar" href="anadirRecurso.php">Añadir recurso</a>

</div>
</body>

