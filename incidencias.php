<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<meta charset="utf-8">	
	<script type="text/javascript" src="javascript.js"></script>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	
		<?php 
	session_start();
	$id=($_SESSION['id']);
	$tipoUsuario=$_SESSION['tipo_user'];
	if (!isset($_SESSION['login_user'])) {
		header("location:login.php");
	}
				include "conexion.php";
					$pag="incidencias.php";
	include "auto_liberar.proc.php";
	?>
	<div class="general">
	 	<div id="menu">
	 		 <a href="index.php">Inventario</a>
	 		 <a href="reservas.php">Reservar</a>
	 		 <a href="liberarecursos.php">Liberar Recursos</a>
	 		 <a href="objetosenincidencia.php">Objetos en Incidencia</a>
	 		 <a href="hreservas.php">Historial de Reservas</a>
	 		 <a class="active" href="incidencias.php">Incidencias</a>
	 		 <?php
	 		 if ($tipoUsuario==0){
	 		 echo "<a href='administracion.php'>Administración</a>";
	 		 }
	 		 ?>
	 		 <a href="logout.proc.php">Cerrar sesion</a>

		</div>

		<div class="derecha">
		  	<?php
			$nombre=$_SESSION['login_user'];
			$consulta="select nombre_Personal FROM personal where usuario_Personal = '".$nombre."'";
			$exe=mysqli_query($conn,$consulta);
			while ($casos=mysqli_fetch_array($exe)) {
		    echo "<a class='sesion' href=''>Bienvenido $casos[0]</a>";
			}	
		    ?>
		</div>
	</div>
	<br>

	<div id="main" >
		
		<div><a href=""><h1>Incidencias</a></h1></div>
	</div>
		<div id="recursos" >
		<form action="incidencias.proc.php" method="POST" onsubmit="return incidencia()">

			<a>Selecciona el recurso</a><br>
				<select name="opcion">
					<?php
					$z= "SELECT * FROM inventario WHERE estado_Inventario='1' OR estado_Inventario='2'";
					$resultado =mysqli_query($conn, $z);
					while ($value=mysqli_fetch_array($resultado)) {
					echo "<option value='".$value['id_Inventario']."'>".$value['nombre_Inventario']."</option>";
					}
					$_SESSION['opcion']=$value['id_Inventario'];
					?>
				</select>
				<br><br>
					<a>Escribe una breve descripción</a><br><br>
			<textarea name="descripcion" id="descripcion" rows="10" cols="40"></textarea>
			<br><br>
			            <p class="mensaje2" id="mensaje2"></p>
			
			<input style="margin-top: 2%;" class='btnenviar' type="submit" name="registro" default="" value="Enviar">
			</form> 
			</form>
			<br><br>

				<?php 
				$nombre=$_SESSION['id'];
			if ($nombre==1) {
				?>

			<a>Incidencias activas:</a>
			<div id="recursos">

				<?php 
			include "incidencias_super.php";
                 }
				?>
			</div>
		</div>
</body>
</html>

