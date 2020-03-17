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

			if (isset($_REQUEST['user'])) {
				$user=$_REQUEST['user'];
				$nombre=$_REQUEST['nombre'];
			}else{
				$user='';
				$nombre='';
			}

		    ?>
		</div>
	</div>
	<br>
<br>
<div id="main">	
<h1>Alta nuevo usuario</h1>
</div>
<div id="main" class="registro_form">
<form method="POST" action="registro.proc.php" onsubmit="return validacionRegistroUsers()">
<p style='color:red;' id="mensaje"></p>	
<div class="espacioDiv">
<p>Usuario</p>
<?php
echo "<input type='text' value='".$user."' name='user' id='usuario'><br>";
echo "</div>";

echo "<div class='espacioDiv'>";
echo "<p>Nombre</p>";
echo "<input type='text' value='".$nombre."'  name='NomUsu' id='nombre'><br>";
echo "</div>";
?>
<div class="espacioDiv">
<p>Logo</p>
<input type="file" name="logo" id="logo" accept="image/x-png,image/gif,image/jpeg">
</div>

<div class="espacioDiv">
<p>Tipo de usuario</p>
<select name='tipoUsu1'>
<?php
include "conexion.php";
$query= ("SELECT * FROM tipo_user ORDER BY id_tipo DESC");	
$result=mysqli_query($conn, $query);

while ($row=mysqli_fetch_array($result)) {
					echo "<option value='".$row['id_tipo']."'>".$row['nombre_tipo']."</option>";
}
?>
</select>
</div>

<div class="espacioDiv">
<p>Password</p>
<input type="password" name="passUsu" id="pass"><br>
</div>

<div class="espacioDiv">
<p>Confirmar Password</p>
<input type="password" name="pass2Usu" id="pass2"><br><br>
</div>
<input type="hidden" name="php" value="1">
<input class="btnenviar" type="submit" name="insertar" value="Insertar Usuario">
<br><br><br>
</form>
<a class="btnenviar" href="administracion_usuarios.php">Volver</a>
</div>
</body>
</html>