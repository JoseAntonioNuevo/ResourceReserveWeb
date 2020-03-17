<?php
include "conexion.php";
$z= "SELECT inventario.nombre_Inventario,incidencias.descripcion_Incidencia,inventario.id_Inventario FROM incidencias inner join inventario on inventario.id_Inventario=incidencias.objeto_Incidencia WHERE inventario.estado_inventario='3'";
$resultado =mysqli_query($conn, $z);
while ($value=mysqli_fetch_array($resultado)) {
?>
<form action="incidencias_super.proc.php" method="POST">
<?php
echo "<h2>".$value[0]."</h2>";
echo "<p>".$value[1]."</p>";
echo "<input type='hidden' name='opcion' value='".$value[2]."'>";
echo "<input style='margin-top:2%' class='btnenviar' type='submit' value='Resolver Incidencia'>";
?>
</form>
<?php
}
?>