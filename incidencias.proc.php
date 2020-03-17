

<!DOCTYPE html>

<html>

<head>

	<title></title>

		<link rel="stylesheet" type="text/css" href="estilos.css">

</head>

<body>

<?php

include "conexion.php";

$id=$_REQUEST['opcion'];


//Marcar un producto como estropeado

$y = "UPDATE inventario SET estado_Inventario='3' WHERE id_inventario='$id'";

mysqli_query($conn, $y);

$descripcion=$_REQUEST['descripcion'];

$today = date("Y-m-d");

$hora = date("H:i");

$consulta3="insert into incidencias (fecha_inicio_Incidencia,hora_inicio_Incidencia,descripcion_Incidencia,objeto_Incidencia,estado) values ('$today','$hora','$descripcion','$id','1')";

mysqli_query($conn, $consulta3);

?>

	<div class="contenedor">

		<div class="is">

	<h3>Incidencia Registrada</h3><br>

		</div><br>

		<p style="margin-left: 35%;" class="mensaje" id="mensaje"></p>

		<div class="form">

		<a class="btnenviar" href="incidencias.php"> Volver</a>

		</div>

	</div>

</body>

</html>

