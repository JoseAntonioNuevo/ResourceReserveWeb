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

<div id="main">

<form action="nuevoRecurso.php">
	<h2>Añadir recurso</h2>
	<p>Tipo</p>
	<select name="tipo">
<?php
		$x= ("SELECT tipo FROM tipo_Recursos");
$resultado =mysqli_query($conn, $x);
while ($value=mysqli_fetch_array($resultado)) {
echo "<option>".$value['tipo']."</option>";
}
?>
	</select>

	<p>Nombre</p>

	<input type="text" name="nombre">

		<p>Descripcion</p>

	<input style='padding:50px;' type="text" name="desc">
<br>
<br>
	<input type="submit" value="Añadir" name="">

</form>
</div>