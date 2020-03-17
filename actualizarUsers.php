<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="estilos.css">
	<script language="javascript" src="javascript.js"></script>
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
<br>

<form method="POST" action="actualizarUsers.proc.php" onsubmit="return validacionInsert()">

	<div id="main">
		<div>Actualización de usuarios</div>
	</div>
<div id="main">	
<?php

$user=$_REQUEST['userblock'];

$query= ("SELECT * FROM personal WHERE id_Personal=".$user);
$result=mysqli_query($conn, $query);

$row=mysqli_fetch_array($result); 

echo "<p style='color:red;' id='mensaje1'></p>";
echo "<div class='act'><p>Usuario</p>";
echo "<input type='text' value='".$row['usuario_Personal']."' name='User1' id='user1'><br></div>";
echo "<div class='act'><p>Nombre</p>";
echo "<input type='text' value='".$row['nombre_Personal']."' name='NomUsu1' id='nombre1'><br></div>";
echo "<div class='act'><p>Password</p>";
echo "<input type='password' name='passUsu1' id='pass1'><br></div>";
echo "<div class='act'><p>Confirmar Password</p>";
echo "<input type='password' name='pass2Usu1' id='pass21'><br><br></div>";
echo "<div class='act'><p>Logo</p>";
echo "<input type='file' name='logo1' id='logo1' accept='image/x-png,image/gif,image/jpeg'</div>";
echo "<input type='hidden' name='IDUsu' value='".$row['id_Personal']."'<br>";
//Evitar que el superusuario se quite el admin
if ($user<>$id) {
echo "<br><br><br><br><div class='act'><span>Tipo:</span>";

echo "<select name='tipoUsu1'>";


$j=$_REQUEST['tiposusers'];

if ($j==0) {
	$query= ("SELECT * FROM tipo_user");
}else{
	$query= ("SELECT * FROM tipo_user ORDER BY id_tipo DESC");
}
$result=mysqli_query($conn, $query);

while ($row=mysqli_fetch_array($result)) {
					echo "<option value='".$row['id_tipo']."'>".$row['nombre_tipo']."</option>";
}

echo "</select>";
}
?>
<br>
<input class="btnenviar" type="submit" name="insertar" value="Modificar Usuario">
</form>
<br><br><br>
<a class="btnenviar" href="administracion_usuarios.php">Volver</a>
<br><br><br>
</div>