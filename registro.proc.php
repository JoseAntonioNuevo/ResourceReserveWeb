<head>
<link rel="stylesheet" href="estilos.css">
</head>
<?php

include "conexion.php";

$nombre = $_REQUEST['NomUsu'];
$user=$_REQUEST['user'];
$logo=$_REQUEST['logo'];

if ($logo=="") {
	$logo="none.png";
}

$query= ("SELECT usuario_personal FROM personal WHERE usuario_Personal='$user'");
$result= mysqli_query($conn, $query);
$value=mysqli_fetch_array($result); 

$usuario=$value['usuario_personal'];

if ($usuario==$user) {
?>
<div class="main">
	<div class="contenedor">
		<div class="is">
	<h3>El usuario ya está registrado</h3><br>
		</div><br>
		<p style="margin-left: 35%;" class="mensaje" id="mensaje"></p>
		<div class="form">

			
			<?php
if (isset($_REQUEST['php'])) {
	echo "<a class='btnenviar' href='altausuarios.php'> Volver</a>";
}else{
	echo "<a class='btnenviar' href='registrarusuarios.html'> Volver</a>";
}
			?>

		</div>
	</div>
	</div>
<?php
}else{	
	
$pass = $_REQUEST['passUsu'];

$encript = md5($pass);

if (isset($_REQUEST['php'])) { 
$tipo=$_REQUEST['tipoUsu1'];
}else{
	$tipo=1;
}

$sql= "INSERT INTO `personal` (`id_Personal`, `usuario_Personal`, `contrasena_Personal`, `nombre_Personal`, `estado`, `tipo_user`, `logo`) VALUES (NULL, '$user', '$encript', '$nombre', '0', '$tipo', '$logo')";
mysqli_query($conn, $sql);

	session_start();
    $_SESSION['nombre']=$user;

if (isset($_REQUEST['php'])) {   
		
?>
<div class="main">
	<div class="contenedor">
		<div class="is">
	<h3>Usuario Registrado Correctamente</h3><br>
		</div><br>
		<p style="margin-left: 35%;" class="mensaje" id="mensaje"></p>
		<div class="form">
<?php	
		echo "<a class='btnenviar' href='administracion_usuarios.php'> OK</a>"; 
		}else{
			?>
<div class="main">
	<div class="contenedor">
		<div class="is">
	<h3>Usuario Registrado Correctamente</h3><br>
		</div><br>
		<p style="margin-left: 35%;" class="mensaje" id="mensaje"></p>
		<div class="form">
<?php	
	echo "<a class='btnenviar' href='index.php'> OK</a>";	

}
}
?>