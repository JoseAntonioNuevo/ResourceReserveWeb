<?php
	include "conexion.php";
		$nombre=$_REQUEST['nombre'];
		$desc=$_REQUEST['desc'];
		$tipo=$_REQUEST['tipo'];

$consulta2="INSERT INTO `inventario` (`id_Inventario`, `nombre_Inventario`, `tipo_Inventario`, `descripcion_Inventario`, `estado_Inventario`, `reservado_Inventario`) VALUES (NULL, '$nombre', '$tipo', '$desc', '1', '1')";

		$consultafinal=mysqli_query($conn,$consulta2);

		header("location:administracion_recursos.php");

?>