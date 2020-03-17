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
	<div class="general"> 
	 	<div id="menu">
	 		 <a href="index.php">Inventario</a>
	 		 <a href="reservas.php">Reservar</a>
	 		 <a href="liberarecursos.php">Liberar Recursos</a>
	 		 <a href="objetosenincidencia.php">Objetos en Incidencia</a>
	 		 <a href="hreservas.php">Historial de Reservas</a>
	 		 <a href="incidencias.php">Incidencias</a>
	 		 <?php
	 		 if ($id==1) {
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

<form method="POST" action="actualizarReserva.proc.php" onsubmit="return validacionInsert()">

	<div id="main">
		<div>Actualización de Reserva</div>
	</div>
<div id="main">	
<?php
$fechaHoy=date('Y-m-d');
$reserva=$_REQUEST['reserva'];

$query= ("SELECT * FROM pedidos WHERE id_Pedidos=".$reserva);
$result=mysqli_query($conn, $query);
$row=mysqli_fetch_array($result); 

$hora=$row['hora_inicio_Pedidos'];
$hora=substr($hora,0,2);
echo "<p style='color:red;' id='mensaje1'></p>";
echo "<div class='act'><p>Fecha</p>";
echo "<input type='date' value='".$row['fecha_inicio_Pedidos']."' min='".$fechaHoy."' name='fecha' id='fecha'><br></div>";
echo "<div class='act'><p>Hora</p>";
echo "<input type='hidden' name='id_reserva' value='".$row['id_Pedidos']."'>";
echo "<select name='hora'>"; 

    for ($i='0'; $i <='23' ; $i++) { 
    if ($i>'9') {
    		$u='';
    	}else{
    		$u='0';
    	}	
        if ($hora==($i)) {
    echo "<option selected value='".$i."'>".$u.$i.":00</option></div>";   
        }else{
	echo "<option value='".$i."'>".$u.$i.":00</option></div>";
	}
}


echo "</select><br><input class='btnenviar' type='submit' name='insertar' value='Modificar Reserva'><br><br>";