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
		$consulta="update inventario SET reservado_Inventario='2' where nombre_Inventario='$objeto'";
		$exe=mysqli_query($conn,$consulta);
		$today = date("Y-m-d");
		$hora = date("H:i");
		$consultita="UPDATE pedidos SET fecha_inicio_Pedidos='$today', fecha_final_Pedidos='$today',hora_final_Pedidos='$hora', hora_inicio_Pedidos='$hora', finalizado=1 where nombre_Pedidos='$objeto'";
		$update=mysqli_query($conn,$consultita);
		header("location:liberacionhecha2.php");
	 ?>
</body>
</html>