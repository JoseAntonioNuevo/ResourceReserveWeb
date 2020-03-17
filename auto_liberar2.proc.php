<?php

//Actualiza la base de datos para finalizar la reserva

include "conexion.php";

$nombre=$_REQUEST['nombre'];
$pag=$_REQUEST['pag'];

echo $nombre;

$update="UPDATE inventario SET reservado_Inventario='2' WHERE nombre_Inventario='".$nombre."'";	
$exe=mysqli_query($conn,$update);
$update="UPDATE pedidos SET finalizado='1' WHERE nombre_Pedidos='".$nombre."'";	
$exe=mysqli_query($conn,$update);
header("location: ".$pag."");
?>