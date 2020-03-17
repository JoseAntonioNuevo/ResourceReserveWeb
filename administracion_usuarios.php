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
		<div><h1>Administración de usuarios</h1></div>
	</div>
<div id="main">
<table style="padding: 120px; margin-left: 4%;">
<tr class="esp2">
<th>Logo</th>	
<th>Usuario</th>	
<th>Nombre</th>
<th>Tipo</th>
<th>Opciones</th>
</tr>	

<?php

$x= ("SELECT * FROM personal WHERE estado=0");

$resultado =mysqli_query($conn, $x);

while ($value=mysqli_fetch_array($resultado)) {

$z=$value['tipo_user'];
$y= ("SELECT * FROM tipo_user WHERE id_tipo='$z'");
$resultado2 =mysqli_query($conn, $y);
$row=mysqli_fetch_array($resultado2);
$u=$row['nombre_tipo'];

echo "<tr>";
	echo "<td class='esp2'><img class='logos' src='./img/".$value['logo']."'></td>";
	echo "<td class='esp2'>".$value['usuario_Personal']."</td>";
	echo "<td class='esp2'>".$value['nombre_Personal']."</td>";
	echo "<td class='esp2'>".$u."</td>";
	echo "<td class='esp2'><a href='actualizarUsers.php?userblock=".$value['id_Personal']."&tiposusers=".$z."'><i style='color: green; margin-right:3%;' class='fas fa-edit'></i><a href='cambiosUsers.proc.php?userblock=".$value['id_Personal']."&caso=1'><i style='color: red; margin-right:3%;' class='fas fa-trash'></i></a>";
}
?>
</table>
</div>
<div id="main">
	<table class="regisElim">
	<tr>
	<td>
	<a class="btnenviar" href="altausuarios.php">Alta de Usuario</a>
    </td>
    <td style="width: 5%;"></td>
    <td>
	<a class="btnenviar" href="usuariosEliminados.php">Usuarios Eliminados</a>
    </td>
    </tr>
	</table>
</div>