<!DOCTYPE html>
<html>
<head>
	<title>REGISTRO GARAGE</title>
	<style>
	body{
		background-image: url("coche03.jpg");
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
	}
	</style>

	<!-- Latest compiled and minified CSS -->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>
<body>
	
  	<center><h1>REGISTRO GARAGE</h1></center>

  	<form method="POST" action="registro_garage.php" class="form-inline">
  		
  	<center>
	  <br><br>
  		<div class="form-group">
      		<label for="id_garage">NUMERO DE GARAGE:</label>
			<input type="text" placeholder="Introduce el numero del garage..." name="id_garage" class="form-control" id="id_garage" size="40px">
		</div>
		<br>
		<div class="form-group">
      		<label for="nombre_garage">NOMBRE DEL GARAGE:</label>
			<input type="text" placeholder="Introduce el nombre del garage..." name="nombre_garage" class="form-control" id="nombre_garage" size="40px">
		</div>
		<br>
		<div class="form-group">
      		<label for="coche_matricula">MATRICULA DEL COCHE:</label>
			<input type="text"placeholder="Introduce la matricula del coche..." name="coche_matricula" class="form-control" id="coche_matricula" size="40px">
		</div>

  		</center>
  			<center>
  				<br><br><br><br>
				<input type="submit" value="ENVIAR" class="btn btn-primary" name="enviar">
				<input type="submit" value="ACTUALIZAR" class="btn btn-warning" name="modificar">
				<input type="submit" value="ELIMINAR" class="btn btn-danger" name="eliminar">
				<input type="button" value="CONSULTA" class="btn btn-info" onclick="location.href='consulta_tabla_garage.php' "name="garage"/>
  		</center>	
		<center>
		<br><br><br><br><br><br><br><br><br><br>
		<input type="button" value="MENU PRINCIPAL" class="btn btn-success" onclick="location.href='menu.php' "name="btn"/> 
		</center>
  	</form>

  	<?php

  		if (isset($_POST['enviar'])) {
  			
  			include("abrir_conexion.php");

			$id_garage		 = $_POST['id_garage'];
			$nombre_garage   = $_POST['nombre_garage'];
			$coche_matricula = $_POST['coche_matricula'];

			$conexion->query("INSERT INTO $garage (id_garage,nombre_garage,coche_matricula) values ('$id_garage','$nombre_garage','$coche_matricula')");

			echo "LOS DATOS FUERON ENVIADOS CORRECTAMENTE";

			include("cerrar_conexion.php");
		} 
		  
		if (isset($_POST['consultar'])) {

			include("abrir_conexion.php");

			$id_garage		 = $_POST['id_garage'];
			$nombre_garage   = $_POST['nombre_garage'];
			$coche_matricula = $_POST['coche_matricula'];

			$resultados = mysqli_query($conexion,"SELECT * FROM $garage WHERE id_garage = '$id_garage'");
			while ($consulta = mysqli_fetch_array($resultados)) {
			echo 
			"
			<table width=\"70%\" border=\"1\">
			<tr>
				<td><b><center>ID_AGENCIA</center></b></td>
				<td><b><center>NOMBRE_AGENCIA</center></b></td>
			</tr>
			<tr>
			<td>".$consulta['id_garage']."</td>
			<td>".$consulta['nombre_garage']."</td>
			<td>".$consulta['coche_matricula']."</td>
			</tr>
			</table>
			";
			}

			include("cerrar_conexion.php");
		}

		if (isset($_POST['modificar'])) {

			include("abrir_conexion.php");

			$id_garage		 = $_POST['id_garage'];
			$nombre_garage   = $_POST['nombre_garage'];
			$coche_matricula = $_POST['coche_matricula'];

			if($id_garage == "" || $nombre_garage == "" || $coche_matricula == ""){

				echo "LOS CAMPOS SON OBLIGATORIOS";

			}else{

				$existe=0;

				$resultados = mysqli_query($conexion,"SELECT * FROM $garage WHERE id_garage = '$id_garage'");
				while($consulta = mysqli_fetch_array($resultados)){

					$existe++;
				}

				if($existe==0){

					echo "EL ID GARAGE NO EXISTE";

				}else{

				//ACTUALIZAR 
				$_UPDATE_SQL="UPDATE $garage Set id_garage = '$id_garage', nombre_garage = '$nombre_garage', coche_matricula = '$coche_matricula' WHERE id_garage ='$id_garage'"; 

				mysqli_query($conexion,$_UPDATE_SQL); 

				echo "ACTUALIZACION CON EXITO";
				
				}
			} 

			include("cerrar_conexion.php");   
		}

		if (isset($_POST['eliminar'])) {

			include("abrir_conexion.php");

			$id_garage = $_POST['id_garage'];
			$existe=0;

			if($id_garage == ""){

				echo "EL ID GARAGE ES OBLIGATORIO ES OBLIGATORIO";

			}else{

				$resultados = mysqli_query($conexion,"SELECT * FROM $garage WHERE id_garage = '$id_garage'");
				while($consulta = mysqli_fetch_array($resultados)){

				$existe++;
			}
			if($existe==0){

				echo "EL ID GARAGE NO EXISTE";

			}else{
				//ELIMINAR
				$_DELETE_SQL = "DELETE FROM $garage WHERE id_garage = '$id_garage'";
				mysqli_query($conexion,$_DELETE_SQL); 
				echo "LOS DATOS SE ELIMINARON CORRECTAMENTE";
				}
			}
		}


  	?>

</body>
</html>