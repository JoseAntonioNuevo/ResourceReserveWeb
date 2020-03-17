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

$caso=$_REQUEST['caso'];
$user=$_REQUEST['userblock'];

if ($caso==1) {

//evitar que el superusuario se elimine a si mismo
if ($id==$user) {
	?>
		<div class="contenedor">
		<div class="is">
	<h3>No te puedes eliminar a ti mismo</h3><br>
		</div><br>
		<p style="margin-left: 35%;" class="mensaje" id="mensaje"></p>
		<div class="form">
		<a class="btnenviar" href="administracion_usuarios.php"> Volver</a>
		</div>
	</div>
	<?php
}else{
		
$x= ("UPDATE personal SET estado=1 WHERE id_Personal=".$user);
$resultado =mysqli_query($conn, $x);
	?>
		<div class="contenedor">
		<div class="is">
	<h3>Usuario Eliminado</h3><br>
		</div><br>
		<p style="margin-left: 35%;" class="mensaje" id="mensaje"></p>
		<div class="form">
		<a class="btnenviar" href="administracion_usuarios.php"> Volver</a>
		</div>
	</div>
<?php
}
}else{
	$x= ("UPDATE personal SET estado=0 WHERE id_Personal=".$user);
$resultado =mysqli_query($conn, $x);
	?>
		<div class="contenedor">
		<div class="is">
	<h3>Usuario Restaurado</h3><br>
		</div><br>
		<p style="margin-left: 35%;" class="mensaje" id="mensaje"></p>
		<div class="form">
		<a class="btnenviar" href="usuariosEliminados.php"> Volver</a>
		</div>
	</div>
<?php
}