<!DOCTYPE html>
<html>
<head>
	<title>REGISTRO CLIENTES</title>

	<style>
	body{

		background-image: url("coche01.jpg");

	}
	</style>

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>
<body>

	<div class="row">
  	<div class="col-md-4"></div>
  	<div class="col-md-5">
  	<center><h1>CLIENTES</h1></center>

  	<form method="POST" action="registro_clientes.php" class="form-inline">
  		
  	<center>
  		<br>
  		<div class="form-group">
      		<label for="id_cliente">NUMERO DE CLIENTE:</label>
			<input type="text" placeholder="Introduce el numero de cliente..." name="id_cliente" class="form-control" id="id_cliente" size="40px">
		</div>
		<br><br>
		<div class="form-group">
      		<label for="RFC">RFC:</label>
			<input type="text" placeholder="Introduce tu RFC de 18 caracteres..."  name="RFC" class="form-control" id="RFC" size="57px">
		</div>
		<br><br>
		<div class="form-group">
      		<label for="Nombre_Cliente">NOMBRE DEL CLIENTE:</label>
			<input type="text" placeholder="Introduce tu Nombre..." name="Nombre_Cliente" class="form-control" id="Nombre_Cliente" size="39px">
		</div>
		<br><br>
		<div class="form-group">
      		<label for="Direccion">DIRECCION:</label>
			<input type="text" placeholder="Introduce tu dirreccion..." name="Direccion" class="form-control" id="Direccion" size="50px">
		</div>
		<br><br>
		<div class="form-group">
      		<label for="Avala">AVALA:</label>
			<input type="text" placeholder="Introduce tu numero de cliente de nuevo..." name="Avala" class="form-control" id="Avala" size="55px">
		</div>

  		</center>
  		<center>
  			<br><br>
  			<input type="submit" value="ENVIAR" class="btn btn-primary" name="btn_enviar">
			<input type="submit" value="ACTUALIZAR" class="btn btn-warning" name="btn_actualizar"> 
			<input type="button" value="CONSULTA" class="btn btn-info" onclick="location.href='consulta_tabla_cliente.php' "name="tabla"/> 
			<input type="submit" value="ELIMINAR" class="btn btn-danger" name="btn_eliminar">
			<br><br><br><br><br><br><br><br>
			<input type="button" value="REGRESAR AL MENU PRINCIPAL" class="btn btn-outline-warning" onclick="location.href='menu.php' "name="btn3"/>
		  </center>

  	</form>

<?php

	if(isset($_POST['btn_enviar'])){

		include("abrir_conexion.php");

		$id_cliente		 = $_POST['id_cliente'];
		$RFC        	 = $_POST['RFC'];
		$Nombre_Cliente  = $_POST['Nombre_Cliente'];
		$Direccion 		 = $_POST['Direccion'];
		$Avala 			 = $_POST['Avala'];

		$conexion->query("INSERT INTO $cliente (id_cliente,RFC,Nombre_Cliente,Direccion,Avala) values ('$id_cliente','$RFC','$Nombre_Cliente','$Direccion','$Avala')");

		echo "LOS DATOS FUERON ENVIADOS CORRECTAMENTE";

		include("cerrar_conexion.php");
	}

	if (isset($_POST['btn_consultar'])) {

		include("abrir_conexion.php");

		$id_cliente		 = $_POST['id_cliente'];
		$RFC        	 = $_POST['RFC'];
		$Nombre_Cliente  = $_POST['Nombre_Cliente'];
		$Direccion 		 = $_POST['Direccion'];
		$Avala 			 = $_POST['Avala'];


		$resultados = mysqli_query($conexion,"SELECT * FROM $cliente WHERE id_cliente = '$id_cliente'");
		while ($consulta = mysqli_fetch_array($resultados)) {
		echo 
		"
		<table width=\"100%\" border=\"1\">
		  <tr>
		      <td><b><center>RFC</center></b></td>
		      <td><b><center>NOMBRE_CLIENTE</center></b></td>
		      <td><b><center>DIRECCION</center></b></td>
		      <td><b><center>AVALA</center></b></td>
		</tr>
		  <tr>
		  <td>".$consulta['RFC']."</td>
		  <td>".$consulta['Nombre_Cliente']."</td>
		  <td>".$consulta['Direccion']."</td>
		  <td>".$consulta['Avala']."</td>
		</tr>
		</table>
		";
		}
		include("cerrar_conexion.php");
	}

	/*metodo actualizar presionando el boton actualizar, el primer if esta rpogramado para que obligue al usuario
	a ingresar todo los campos y si comprueba ejecuta la consulta,  */

	if (isset($_POST['btn_actualizar'])) {

			include("abrir_conexion.php");

			$id_cliente	 	= $_POST['id_cliente'];
		    $RFC 			= $_POST['RFC'];
		   	$Nombre_Cliente = $_POST['Nombre_Cliente'];
		   	$Direccion 		= $_POST['Direccion'];
		   	$Avala 			= $_POST['Avala'];

		    if($id_cliente == "" || $RFC == "" || $Nombre_Cliente == "" || $Direccion == "" || $Avala == ""){

		  		echo "LOS CAMPOS SON OBLIGATORIOS";

		    }else{

		    	$existe=0;

		    	$resultados = mysqli_query($conexion,"SELECT * FROM $cliente WHERE id_cliente = '$id_cliente'");
				while($consulta = mysqli_fetch_array($resultados)){

					$existe++;
  				}
  				if($existe==0){

  					echo "EL CLIENTE NO EXISTE";

  				}else{

					//ACTUALIZAR 
					$_UPDATE_SQL="UPDATE $cliente Set id_cliente = '$id_cliente', 
					RFC = '$RFC', 
					Nombre_Cliente = '$Nombre_Cliente', 
					Direccion = '$Direccion',
					Avala = '$Avala' 
					WHERE id_cliente ='$id_cliente'"; 

					mysqli_query($conexion,$_UPDATE_SQL); 

					echo "ACTUALIZACION CON EXITO";
  				
  				}
		    } 

		    include("cerrar_conexion.php");   
		}

		//metodo eliminar al presionar el boton eliminar 

		if (isset($_POST['btn_eliminar'])) {

			include("abrir_conexion.php");

		    $id_cliente = $_POST['id_cliente'];
		    $existe=0;

		    if($id_cliente == ""){

		    	echo "EL ID CLIENTE ES OBLIGATORIO";

		    }else{

		    	$resultados = mysqli_query($conexion,"SELECT * FROM $cliente WHERE id_cliente = '$id_cliente'");
				while($consulta = mysqli_fetch_array($resultados)){

				$existe++;
  			}
  			if($existe==0){

  				echo "LA MATRICULA NO EXISTE";

  			}else{
  				//ELIMINAR
				$_DELETE_SQL = "DELETE FROM $cliente WHERE id_cliente = '$id_cliente'";
				mysqli_query($conexion,$_DELETE_SQL); 
				echo "LOS DATOS SE ELIMINARON CORRECTAMENTE";
  				}
		    }
		}
?>


</body>
</html>