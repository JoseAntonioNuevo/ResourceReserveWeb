<?php

//Todo esto sirve para que los recursos vuelvan a estar disponible una vez llegue el día y la hora del fin de la reserva.

$consulta="SELECT pedidos.fecha_final_Pedidos, pedidos.hora_final_Pedidos, inventario.reservado_Inventario, inventario.nombre_Inventario FROM pedidos INNER JOIN inventario ON pedidos.inventario_Pedidos=inventario.id_inventario WHERE pedidos.finalizado=0";
$exe=mysqli_query($conn,$consulta);

while($value=mysqli_fetch_array($exe)){

$horaF=$value['hora_final_Pedidos'];
$fecha=$value['fecha_final_Pedidos'];
$year= substr($fecha,0 ,4);
$month= substr($fecha,5 ,2);
$day= substr($fecha,8 ,2);
$horas= substr($horaF,0 ,2);


$nombre=$value['nombre_Inventario'];

//En caso de que la fecha y la hora de la reserva sea inferior a la fecha y hora actual se redirige o otra página en la cual se pondrá fin a la reserva. 

if ($year<date('Y')) {

header("location:auto_liberar2.proc.php?nombre=".$nombre."&pag=".$pag."");

}elseif ($year==date('Y')) {

if ($month<date('m')) {

header("location:auto_liberar2.proc.php?nombre=".$nombre."&pag=".$pag."");

}elseif ($month==date('m')) {

if ($day<date('d')) {

header("location:auto_liberar2.proc.php?nombre=".$nombre."&pag=".$pag."");

}elseif ($day==date('d')) {

if ($horas<=date('H')) {

header("location:auto_liberar2.proc.php?nombre=".$nombre."&pag=".$pag."");

}
}
}
}	
}
?>