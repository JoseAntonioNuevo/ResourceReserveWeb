	<head>
	<title>Reservar inventario</title>
	<meta charset="utf-8">	
	<link rel="stylesheet" type="text/css" href="estilos.css">
    </head>

<?php
include "conexion.php";

$fechas=$_REQUEST['fecha'];
$hora_inicio=$_REQUEST['hora'];
$horaNueva=$hora_inicio;
$ID=$_REQUEST['id_reserva'];
$hora=date('H');
$fecha=date('Y-m-d');


$hora_final=($hora_inicio+1);

if ($hora_inicio<10) {
$hora_inicio="0".$hora_inicio.":00";
}else{
$hora_inicio=$hora_inicio.":00";
}

if ($hora_final<10) {
$hora_final="0".$hora_final.":00";
}else{
$hora_final=$hora_final.":00";
}

if ($fechas==$fecha) {
	    if ($horaNueva>$hora) {
		
$x= ("UPDATE pedidos SET fecha_inicio_Pedidos='$fechas' WHERE id_Pedidos=".$ID);
$resultado =mysqli_query($conn, $x);

$x= ("UPDATE pedidos SET fecha_final_Pedidos='$fechas' WHERE id_Pedidos=".$ID);
$resultado =mysqli_query($conn, $x);

$x= ("UPDATE pedidos SET hora_inicio_Pedidos='$hora_inicio' WHERE id_Pedidos=".$ID);
$resultado =mysqli_query($conn, $x);

$x= ("UPDATE pedidos SET hora_final_Pedidos='$hora_final' WHERE id_Pedidos=".$ID);
$resultado =mysqli_query($conn, $x);

header('location:actualizacionreservahecha.php');
	
	}else{
		?>
		<div class="contenedor">
		<div class="is">
	    <h3 style="text-align: center;">Hora de la reserva incorrecta<br>Intentalo de nuevo</h3><br>
		</div><br>
		<p style="margin-left: 35%;" class="mensaje" id="mensaje"></p>
		<div class="form">
		<a class="btnenviar" href="administracion_reservas.php"> Volver</a>
	</div>
<?php
	}
	}else{

$x= ("UPDATE pedidos SET fecha_inicio_Pedidos='$fechas' WHERE id_Pedidos=".$ID);
$resultado =mysqli_query($conn, $x);

$x= ("UPDATE pedidos SET fecha_final_Pedidos='$fechas' WHERE id_Pedidos=".$ID);
$resultado =mysqli_query($conn, $x);

$x= ("UPDATE pedidos SET hora_inicio_Pedidos='$hora_inicio' WHERE id_Pedidos=".$ID);
$resultado =mysqli_query($conn, $x);

$x= ("UPDATE pedidos SET hora_final_Pedidos='$hora_final' WHERE id_Pedidos=".$ID);
$resultado =mysqli_query($conn, $x);

header('location:actualizacionreservahecha.php');
	}
?>