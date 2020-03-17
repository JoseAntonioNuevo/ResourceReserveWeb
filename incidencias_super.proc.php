<?php
include "conexion.php";
$id=$_REQUEST['opcion'];
//Marcar un producto como estropeado
$y = "UPDATE inventario SET estado_Inventario='1' WHERE id_inventario='$id'";
mysqli_query($conn, $y);


$consulta="update incidencias SET estado='0' WHERE objeto_Incidencia = '$id'";
mysqli_query($conn, $consulta);

$today = date("Y-m-d");
$hora = date("H:i");

$consulta2="update incidencias Set fecha_fin_Incidencia='$today',hora_fin_Incidencia='$hora' where objeto_Incidencia='$id'";
mysqli_query($conn, $consulta2);

header("Location: incidencias.php");
?>