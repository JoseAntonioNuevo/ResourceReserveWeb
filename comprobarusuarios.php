<head>
		<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<?php
//Esto evitara que entremos como hackers
include "conexion.php";
if (!$_POST["user"] && !$_POST["pwd"]) {
	header("location:login.php");
}else{
//Nos coge las variables y luego nos mira si el usuario con esa contraseña existe

$name=$_POST["user"];

$consultas="SELECT usuario_personal, estado from personal where usuario_personal='$name'";
$exe=mysqli_query($conn,$consultas);
$casos=mysqli_fetch_array($exe);

$estado=$casos['estado'];

if ($estado=='1') {
?>
		<div class="contenedor">
		<div class="is">
		<?php
	    echo "<h3 style='text-align: center;'>El usuario ".$name." <br> está eliminado.</h3><br>";
		?>
		</div><br>
		<p style="margin-left: 35%;" class="mensaje" id="mensaje"></p>
		<div class="form">
		<a class="btnenviar" href="login.php"> Volver</a>
		</div>
	</div>
	<?php
}else{

$pwd=$_POST["pwd"];
$encript=md5($pwd);
$consulta="select * from personal where contrasena_personal='$encript' and usuario_personal='$name'";
$consulta=mysqli_query($conn,$consulta);
if(mysqli_num_rows($consulta) && !empty($consulta)){
	echo "El usuario es correcto";
	$row=mysqli_fetch_array($consulta);
	session_start();
	$_SESSION['id']=$row['id_Personal'];
	$_SESSION['login_user']=$name;
	$_SESSION['tipo_user']=$row['tipo_user'];

	echo $name;
	header("location:index.php");
}else{
	header("location:login.php?log=erroneo");

}
}
}
?>