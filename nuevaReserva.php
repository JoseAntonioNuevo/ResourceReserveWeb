<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<meta charset="utf-8">	
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<div id="main">
		<h2>Nueva Reserva</h2>
	</div>

<div id="main">
	<form action="hacereserva2.php" method="POST">
		<p>Recurso</p>
	<select name="inventario">
	<?php
		include "conexion.php";
	$x= ("SELECT nombre_Inventario FROM inventario");
$resultado =mysqli_query($conn, $x);
while ($value=mysqli_fetch_array($resultado)) {

echo "<option> ".$value['nombre_Inventario']."</option>";
}
	?>	
</select>
    <p>Usuario</p>
    <select name="nomPersonal">
    <?php
	$x= ("SELECT usuario_Personal FROM personal");
$resultado =mysqli_query($conn, $x);
while ($value=mysqli_fetch_array($resultado)) {

echo "<option> ".$value['usuario_Personal']."</option>";
}
    ?>
</select>
	<p>Fecha</p>
	<input type="date" name="fecha_inicial" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" />
	<p>Hora</p>
	<select name="hora_inicio">
    <?php
    $hora=date('H');

    for ($i=0; $i <=23 ; $i++) { 
    if ($i>9) {
    		$u='';
    	}else{
    		$u=0;
    	}	
        if ($hora==$i) {
    echo "<option selected value='".$i."'>".$u.$i.":00</option>";   
        }else{
	echo "<option value='".$i."'>".$u.$i.":00</option>";
	}
}
?>
</select>
<br>
<input style="margin-top: 3%; margin-bottom: 2.5%;" class='btnenviar' type="submit" value="Reservar" name="Reservar">


	</form>
</div>