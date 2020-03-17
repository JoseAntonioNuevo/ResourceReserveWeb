<!DOCTYPE html>
<html>
<head>
	<title>Inventario casal</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<meta charset="UTF-8">
	<script type="text/javascript" src="javascript.js"></script>
</head>
<body>
	<div class="contenedor">
		<div class="is">
		<h3>Iniciar Sesión</h3>
					<?php
			if (isset($_GET['log'])) {
				?>
				<script type="text/javascript">
					alert("El usuario es incorrecto");
				</script>
				<?php
			}
			?>
		</div><br>
		<p style="margin-left: 35%;" class="mensaje" id="mensaje"></p>
		<div class="form">
		<form action="comprobarusuarios.php" method="POST" name="formulario1" enctype="multipart/form-data" onsubmit="return login()">
			<label for="user" class="boton">Usuario:</label><br>
			<input type="string" name="user" id="user" default=""><br><br>
			<label for="pwd" class="boton">Contraseña:</label><br>
			<input type="password" name="pwd" id="pwd"><br>
			<input  class="btnenviar" type="submit" name="registro" default="" value="Entrar">
		</form>
		</div>
	</div>
</div>

<div style="margin-top: 5%" class="contenedor">
		<div class="is">
		<h3>Registarse</h3>
					<?php
			if (isset($_GET['log'])) {
				?>
				<script type="text/javascript">
					alert("El usuario es incorrecto");
				</script>
				<?php
			}
			?>
		</div><br>
		<p style="margin-left: 35%;" class="mensaje" id="mensaje"></p>
		<div class="form">
		<a href="registrarusuarios.html"><button class="btnenviar">Registrarse</button></a>
		</div>
	</div>
</div>
</body>
</html>