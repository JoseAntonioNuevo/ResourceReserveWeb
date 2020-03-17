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
	if (!isset($_SESSION['login_user'])) {
		header("location:login.php");
	}
?>

	<div class="contenedor">
		<div class="is">
	<h3>Reserva completada</h3><br>
		</div><br>
		<p style="margin-left: 35%;" class="mensaje" id="mensaje"></p>
		<div class="form">
		<a class="btnenviar" href="reservas.php"> Volver</a>
		</div>
	</div>

</body>
</html>