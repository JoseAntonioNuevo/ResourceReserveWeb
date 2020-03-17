<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		include "conexion.php";
		session_start();
		$user=($_SESSION['login_user']);
		$userid="select id_personal from personal where usuario_Personal = '$user'";
		$usuarioid=mysqli_query($conn,$userid);
		$casos=mysqli_fetch_array($usuarioid);
		$idu=$casos[0];
		$objeto=($_GET['inventario']);
		$consulta="update inventario SET reservado_Inventario='1' where nombre_Inventario='$objeto'";
		$exe=mysqli_query($conn,$consulta);
		$consulta3="select id_Inventario from inventario where nombre_Inventario='$objeto'";
		$conobject=mysqli_query($conn,$consulta3);
		$idobject=mysqli_fetch_array($conobject);
		$ido=$idobject[0];
		$today = date("Y-m-d");
		$hora = date("H:i");
		$consulta2="insert into pedidos (nombre_Pedidos,fecha_inicio_Pedidos,hora_inicio_Pedidos,inventario_Pedidos,personal_pedidos, finalizado) values
		 ('$objeto','$today','$hora','$ido','$idu', 1)";
		 echo $consulta2;
		$consultafinal=mysqli_query($conn,$consulta2);
		header("location:reservahecha.php");
	 ?>
</body>
</html>