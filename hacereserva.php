	<head>
	<title>Reservar inventario</title>
	<meta charset="utf-8">	
	<link rel="stylesheet" type="text/css" href="estilos.css">
    </head>
	<?php
		$fecha_inicio=$_REQUEST['fecha_inicial'];
		$fecha_final=$fecha_inicio;
		$hora_inicio=$_REQUEST['hora_inicio'];
		$horaX=$_REQUEST['hora_inicio'];
		$objeto=$_REQUEST['inventario'];
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

		include "conexion.php";
		session_start();
		$id=($_SESSION['id']);
		$consulta3="select id_Inventario from inventario where nombre_Inventario='$objeto'";
		$conobject=mysqli_query($conn,$consulta3);
		$idobject=mysqli_fetch_array($conobject);
		$ido=$idobject[0];

		if ($fecha_inicio==$fecha) {
		
        if ($hora_inicio>$hora) {


$consulta="SELECT * from pedidos where finalizado='0' AND nombre_Pedidos='$objeto'";
$exe=mysqli_query($conn,$consulta);
while ($casos=mysqli_fetch_array($exe)) {
$horaI=$casos['hora_inicio_Pedidos'];	
$fecha=$casos['fecha_final_Pedidos'];
$nombre=$casos['nombre_Pedidos'];



if ($fecha==$fecha_inicio) {

if ($horaI==$hora_inicio) {
ob_start();
header("Location: reservayahecha.php");
exit();
}
}
}

        $consulta="update inventario SET reservado_Inventario='1' where nombre_Inventario='$objeto'";
		$exe=mysqli_query($conn,$consulta);
		$consulta2="INSERT INTO pedidos (nombre_Pedidos,fecha_inicio_Pedidos,hora_inicio_Pedidos, fecha_final_pedidos, hora_final_pedidos, inventario_Pedidos,personal_pedidos, finalizado) VALUES
		 ('$objeto','$fecha_inicio','$hora_inicio','$fecha_final','$hora_final','$ido','$id', '0')";
		 
		$consultafinal=mysqli_query($conn,$consulta2);
		header("location:reservahecha.php");
	
	}else{
		?>
		<div class="contenedor">
		<div class="is">
	    <h3 style="text-align: center;">Hora de la reserva incorrecta<br>Intentalo de nuevo</h3><br>
		</div><br>
		<p style="margin-left: 35%;" class="mensaje" id="mensaje"></p>
		<div class="form">
		<a class="btnenviar" href="reservas.php"> Volver</a>
		</div>
	</div>
<?php
	}
	}else{

		$consulta="update inventario SET reservado_Inventario='1' where nombre_Inventario='$objeto'";
		$exe=mysqli_query($conn,$consulta);
		$consulta2="INSERT INTO pedidos (nombre_Pedidos,fecha_inicio_Pedidos,hora_inicio_Pedidos, fecha_final_pedidos, hora_final_pedidos, inventario_Pedidos,personal_pedidos, finalizado) VALUES
		 ('$objeto','$fecha_inicio','$hora_inicio','$fecha_final','$hora_final','$ido','$id','0')";

		$consultafinal=mysqli_query($conn,$consulta2);
		header("location:reservahecha.php");
	}