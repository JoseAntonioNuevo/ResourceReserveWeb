<br>
<div class="fechas_reserva">
	<p>Fecha y hora de la reserva</p>
	<form action="hacereserva.php?">
    <?php  
	echo "<input type='hidden' value='$inventario' name='inventario'>";
    ?>
    <input type="date" name="fecha_inicial" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" />
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