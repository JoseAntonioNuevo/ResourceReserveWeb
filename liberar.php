<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		include "conexion.php";
		session_start();
		$id=($_SESSION['id']);
		$objeto=($_REQUEST['inventario']);
		echo $objeto;
		$id_Pedidos=($_REQUEST['id_pedidos']);
		$today = date("Y-m-d");
		$hora = date("H:i");
		$consultita="UPDATE pedidos SET fecha_inicio_Pedidos='$today', fecha_final_Pedidos='$today',hora_final_Pedidos='$hora', hora_inicio_Pedidos='$hora', finalizado=1 where id_Pedidos='$id_Pedidos' and nombre_Pedidos='$objeto'";
		$update=mysqli_query($conn,$consultita);

		header("location:liberacionhecha.php");
	 ?>
</body>
</html>