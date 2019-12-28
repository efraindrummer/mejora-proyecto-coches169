<!DOCTYPE html>
<html>
<head>
	<title>REGRISTRO INVOLUCRA</title>
	<style>
	body{
		background-attachment: fixed;
		background-color: #FFFFFF;
		background-image: url("coche02.jpg");
		background-position: center center;
	}
	</style>

	<style>
	form label{
		display: inline-block;
		width: 150px;
	}
	form input{
		display: inline-block;
		width: 200px;
	}</style>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	
  	<center><h1>REGISTRO INVOLUCRA</h1></center>

  	<form method="POST" action="registro_involucra.php" class="form-inline">
  		<center>
			<br><br>
  			<div class="form-group">
  				<label for="id_reserva">NUMERO DE RESERVA:</label>
				<input type="text" placeholder="Introduce el id reserva antes ingresado..." name="id_reserva" class="form-control" id="id_reserva" size="40px">
  			</div>
			<br>
  			<div class="form-group">
  				<label for="id_matricula">NUMERO DE MATRICULA:</label>
				<input type="text" placeholder="Introduce el id matricula antes ingresado..." name="id_matricula" class="form-control" id="id_matricula" size="40px">
  			</div>
			<br><br>
  			<div class="form-group">
  				<label for="PrecioAlquiler">PRECIO ALQUILER:</label>
				<input type="text" placeholder="Introduce el precio del alquiler..." name="PrecioAlquiler" class="form-control" id="PrecioAlquiler" size="40px">
  			</div>

  		</center>
  		<center>
			<br><br>
			<input type="submit" value="ENVIAR" class="btn btn-primary" name="enviar">
			<input type="button" value="CONSULTA" class="btn btn-info" onclick="location.href='consulta_tabla_involucra.php' "name="btn2"/>			
		</center>
		<center>
		<br><br><br><br><br><br><br><br><br><br><br><br>
		<input type="button" value="MENU PRINCIPAL" class="btn btn-success"  onclick="location.href='menu.php' "name="btn2"/>
		</center>		
  	</form>

<?php


	if(isset($_POST['enviar'])){

		include("abrir_conexion.php");

		$id_reserva 	= $_POST['id_reserva'];
		$id_matricula 	= $_POST['id_matricula'];
		$PrecioAlquiler = $_POST['PrecioAlquiler'];

		$conexion->query("INSERT INTO $involucra (id_reserva,id_matricula,PrecioAlquiler) values ('$id_reserva','$id_matricula','$PrecioAlquiler')");

		echo "LOS DATOS FUERON ENVIADOS CORRECTAMENTE";

		include("cerrar_conexion.php");
	}



	if (isset($_POST['consultar'])) {
		
		include("abrir_conexion.php");

		$id_reserva 	= $_POST['id_reserva'];
		$id_matricula 	= $_POST['id_matricula'];
		$PrecioAlquiler = $_POST['PrecioAlquiler'];

		$resultados = mysqli_query($conexion,"SELECT * FROM $involucra WHERE id_reserva = '$id_reserva'");
		while ($consulta = mysqli_fetch_array($resultados)) {
		echo 
		"
		<table width=\"70%\" border=\"1\">
		<tr>
			<td><b><center>ID_RESERVA</center></b></td>
			<td><b><center>ID_MATRICULA</center></b></td>
			<td><b><center>PRECIO_ALQUILER</center></b></td>
		</tr>
		<tr>
		<td>".$consulta['id_reserva']."</td>
		<td>".$consulta['id_matricula']."</td>
		<td>".$consulta['PrecioAlquiler']."</td>
		</tr>
		</table>
		";
		}

		include("cerrar_conexion.php");

	}


?>

</body>
</html>