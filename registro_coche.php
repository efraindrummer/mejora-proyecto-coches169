<!DOCTYPE html>
<html>
<head>
	<title>REGRISTRO COCHES</title>
	<style>
body{
	background-attachment: fixed;
    background-color: #FFFFFF;
	background-image: url("coche03.jpg");
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

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	
  	<center><h1>REGISTRO COCHES</h1></center>

  	<form method="POST" action="registro_coche.php" class="form-inline">
  		<center>
			<br><br>
  			<div class="form-group">
  				<label for="id_matricula">NUMERO DE MATRICULA:</label>
				<input type="text" placeholder="Introduce el id matricula..." name="id_matricula" class="form-control" id="id_matricula" size="30px">
  			</div>
			<br><br>
  			<div class="form-group">
  				<label for="marca">MARCA:</label>
				<input type="text" placeholder="Introduce la marca..." name="marca" class="form-control" id="marca" size="30px">
  			</div>
			<br><br>
  			<div class="form-group">
  				<label for="modelo">MODELO:</label>
				<input type="text" placeholder="introduce el modelo..." name="modelo" class="form-control" id="modelo" size="30px">
  			</div>
			<br>
  			<div class="form-group">
  				<label for="GARAGE_id_garage">NUMERO DE GARAGE:</label>
				<input type="text" placeholder="introduce el id del garage ya ingresado antes..." name="GARAGE_id_garage" class="form-control" id="GARAGE_id_garage" size="30px">
  			</div>

  		</center>
  		<center>
			<br><br>
			<input type="submit" value="ENVIAR" class="btn btn-primary" name="enviar">
			<input type="submit" value="ACTUALIZAR" class="btn btn-warning" name="actualizar">
			<input type="submit" value="ELIMINAR" class="btn btn-danger" name="eliminar">
			<input type="button" value="CONSULTA" class="btn btn-info"  onclick="location.href='consulta_tabla_coche.php' "name="coche"/>
		</center>
		<center>
		<br><br><br><br><br><br><br><br><br><br>
			<input type="button" value="MENU PRINCIPAL" class="btn btn-success"  onclick="location.href='menu.php' "name="btn2"/> 
		</center>		
  	</form>

<?php

	if(isset($_POST['enviar'])){

		include("abrir_conexion.php");

		$id_matricula 	  = $_POST['id_matricula'];
		$marca 			  = $_POST['marca'];
		$modelo 		  = $_POST['modelo'];
		$GARAGE_id_garage = $_POST['GARAGE_id_garage'];

		$conexion->query("INSERT INTO $coche (id_matricula,marca,modelo,GARAGE_id_garage) values ('$id_matricula','$marca','$modelo','$GARAGE_id_garage')");

		echo "LOS DATOS FUERON ENVIADOS CORRECTAMENTE";

		include("cerrar_conexion.php");
	}

	if (isset($_POST['consultar'])) {

		include("abrir_conexion.php");

		$id_matricula 	  = $_POST['id_matricula'];
		$marca 			  = $_POST['marca'];
		$modelo 		  = $_POST['modelo'];
		$GARAGE_id_garage = $_POST['GARAGE_id_garage'];

		$resultados = mysqli_query($conexion,"SELECT * FROM $coche WHERE id_matricula = '$id_matricula'");
		while ($consulta = mysqli_fetch_array($resultados)) {
		echo 
		"
		<table width=\"70%\" border=\"1\">
		<tr>
			<td><b><center>ID_MATRICULA</center></b></td>
			<td><b><center>MARCA</center></b></td>
			<td><b><center>MODELO</center></b></td>
			<td><b><center>GARAGE_ID_GARAGE</center></b></td>
		</tr>
		<tr>
		<td>".$consulta['id_matricula']."</td>
		<td>".$consulta['marca']."</td>
		<td>".$consulta['modelo']."</td>
		<td>".$consulta['GARAGE_id_garage']."</td>
		</tr>
		</table>
		";
		}

		include("cerrar_conexion.php");
	}

	if (isset($_POST['actualizar'])) {

		include("abrir_conexion.php");

		$id_matricula 	  = $_POST['id_matricula'];
		$marca 			  = $_POST['marca'];
		$modelo 		  = $_POST['modelo'];
		$GARAGE_id_garage = $_POST['GARAGE_id_garage'];

		if($id_matricula == "" || $marca == "" || $modelo == "" || $GARAGE_id_garage == ""){

			echo "LOS CAMPOS SON OBLIGATORIOS";

		}else{

			$existe=0;

			$resultados = mysqli_query($conexion,"SELECT * FROM $coche WHERE id_matricula = '$id_matricula'");
			while($consulta = mysqli_fetch_array($resultados)){

				$existe++;
			}

			if($existe==0){

				echo "EL ID MATRICULA NO EXISTE";

			}else{

			//ACTUALIZAR 
			$_UPDATE_SQL="UPDATE $coche Set id_matricula = '$id_matricula', marca = '$marca', modelo = '$modelo', GARAGE_id_garage = '$GARAGE_id_garage' WHERE id_matricula ='$id_matricula'"; 

			mysqli_query($conexion,$_UPDATE_SQL); 

			echo "ACTUALIZACION CON EXITO";
			
			}
		} 

		include("cerrar_conexion.php");   
	}

	if (isset($_POST['eliminar'])) {

		include("abrir_conexion.php");

		$id_matricula = $_POST['id_matricula'];
		$existe=0;

		if($id_matricula == ""){

			echo "EL ID MATRICULA ES OBLIGATORIO ES OBLIGATORIO";

		}else{

			$resultados = mysqli_query($conexion,"SELECT * FROM $coche WHERE id_matricula = '$id_matricula'");
			while($consulta = mysqli_fetch_array($resultados)){

			$existe++;
		}
		if($existe==0){

			echo "EL ID MATRICULA NO EXISTE";

		}else{
			//ELIMINAR
			$_DELETE_SQL = "DELETE FROM $coche WHERE id_matricula = '$id_matricula'";
			mysqli_query($conexion,$_DELETE_SQL); 
			echo "LOS DATOS SE ELIMINARON CORRECTAMENTE";
			}
		}
	}

?>

</body>
</html>