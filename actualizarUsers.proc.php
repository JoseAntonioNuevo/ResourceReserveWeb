<?php
include "conexion.php";

$user=$_REQUEST['User1'];
$nombre=$_REQUEST['NomUsu1'];
$pass=$_REQUEST['passUsu1'];
$tipo=$_REQUEST['tipoUsu1'];
$ID=$_REQUEST['IDUsu'];
$logo=$_REQUEST['logo1'];

$encript = md5($pass);

if ($nombre<>''){
$x= ("UPDATE personal SET nombre_Personal='$nombre' WHERE id_Personal=".$ID);
$resultado =mysqli_query($conn, $x);
}

if ($pass<>''){
$x= ("UPDATE personal SET contrasena_Personal='$encript' WHERE id_Personal=".$ID);
$resultado =mysqli_query($conn, $x);
}

if ($tipo<>''){
$x= ("UPDATE personal SET tipo_user='$tipo' WHERE id_Personal=".$ID);
$resultado =mysqli_query($conn, $x);
}

if ($user<>''){
$x= ("UPDATE personal SET usuario_Personal='$user' WHERE id_Personal=".$ID);
$resultado =mysqli_query($conn, $x);
}

if ($logo<>''){
$x= ("UPDATE personal SET logo='$logo' WHERE id_Personal=".$ID);
$resultado =mysqli_query($conn, $x);
}
header('Location: actualizacionhecha.php');
?>