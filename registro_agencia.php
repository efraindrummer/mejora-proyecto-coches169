<!DOCTYPE html>
<html>
<head>
	<title>REGISTRO TABLA AGENCIA</title>

	<style>
	body{

		background-attachment: fixed;
     	background-color: #FFFFFF;
		background-image: url("coche01.jpg");
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
	
  	<center><h1>REGISTRO AGENCIA</h1></center>

  	<form method="POST" action="registro_agencia.php" class="form-inline">
<center>
	<br><br>
	<div class="form-group">
      	<label for="id_agencia">NUMERO DE AGENCIA:</label>
		<input type="text" placeholder="Introduce el numero de agencia..." name="id_agencia" class="form-control" id="id_agencia" size="30px">
	</div>
	<br><br>
	<div class="form-group">
      	<label for="nombre_agencia">AGENCIA:</label>
		<input type="text" placeholder="Introduce el nombre de la agencia..." name="nombre_agencia" class="form-control" id="nombre_agencia" size="30px">
	</div>
</center>
	<center>
		<br><br>
		<input type="submit" value="ENVIAR" class="btn btn-primary" name="btn1">
		<input type="submit" value="ACTUALIZAR" class="btn btn-warning" name="btn3">
		<input type="submit" value="ELIMINAR" class="btn btn-danger" name="btn4">
		<input type="button" value="CONSULTA" class="btn btn-info" 	onclick="location.href='consulta_tabla_agencia.php' "name="agencia"/> 
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<input type="button" value="MENU PRINCIPAL" class="btn btn-success" onclick="location.href='menu.php' " name="btn5"/> 
	</center>	
</form>

<?php

	if(isset($_POST['btn1'])){

		include("abrir_conexion.php");

		$id_agencia	= $_POST['id_agencia'];
		$nombre_agencia = $_POST['nombre_agencia'];

		$conexion->query("INSERT INTO $agencia (id_agencia,nombre_agencia) values ('$id_agencia','$nombre_agencia')");

		echo "LOS DATOS FUERON ENVIADOS CORRECTAMENTE";

		include("cerrar_conexion.php");
	}

	if (isset($_POST['btn2'])) {

		include("abrir_conexion.php");

		$id_agencia	= $_POST['id_agencia'];
		$nombre_agencia = $_POST['nombre_agencia'];

		$resultados = mysqli_query($conexion,"SELECT * FROM $agencia WHERE id_agencia = '$id_agencia'");
		while ($consulta = mysqli_fetch_array($resultados)) {
		echo 
		"
		<table width=\"70%\" border=\"1\">
	      <tr>
		      <td><b><center>ID_AGENCIA</center></b></td>
		      <td><b><center>NOMBRE_AGENCIA</center></b></td>
		</tr>
		  <tr>
		  <td>".$consulta['id_agencia']."</td>
		  <td>".$consulta['nombre_agencia']."</td>
		</tr>
		</table>
		";
		}

		include("cerrar_conexion.php");
	}

	if (isset($_POST['btn3'])) {

		include("abrir_conexion.php");

		$id_agencia	= $_POST['id_agencia'];
		$nombre_agencia = $_POST['nombre_agencia'];

		if($id_agencia == "" || $nombre_agencia == ""){

			  echo "LOS CAMPOS SON OBLIGATORIOS";

		}else{

			$existe=0;

			$resultados = mysqli_query($conexion,"SELECT * FROM $agencia WHERE id_agencia = '$id_agencia'");
			while($consulta = mysqli_fetch_array($resultados)){

				$existe++;
			}

			if($existe==0){

			    echo "EL ID AGENCIA NO EXISTE";

			}else{

			//ACTUALIZAR 
			$_UPDATE_SQL="UPDATE $agencia Set id_agencia = '$id_agencia', nombre_agencia = '$nombre_agencia' WHERE id_agencia ='$id_agencia'"; 

			mysqli_query($conexion,$_UPDATE_SQL); 

			echo "ACTUALIZACION CON EXITO";
			  
			}
		} 

		include("cerrar_conexion.php");   
	}

	if (isset($_POST['btn4'])) {

		include("abrir_conexion.php");

		$id_agencia = $_POST['id_agencia'];
		$existe=0;

		if($id_agencia == ""){

			echo "EL ID AGENCIA ES OBLIGATORIO ES OBLIGATORIO";

		}else{

			$resultados = mysqli_query($conexion,"SELECT * FROM $agencia WHERE id_agencia = '$id_agencia'");
			while($consulta = mysqli_fetch_array($resultados)){

			$existe++;
		  }
		  if($existe==0){

			  echo "EL ID AGENCIA NO EXISTE";

		  }else{
			  //ELIMINAR
			$_DELETE_SQL = "DELETE FROM $agencia WHERE id_agencia = '$id_agencia'";
			mysqli_query($conexion,$_DELETE_SQL); 
			echo "LOS DATOS SE ELIMINARON CORRECTAMENTE";
			  }
		}
	}

?>

</body>
</html>