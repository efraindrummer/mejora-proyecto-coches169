<!DOCTYPE html>
<html>
<head>
	<title>REGISTRO RESERVA</title>
	<style>
body{
	background-attachment: fixed;
    background-color: #FFFFFF;
	background-image: url("yellow_blue.jpg");
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
<!--ventana modal libreria-->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>
<body>
	
  	<center><h1>REGISTRO RESERVA</h1></center>

  	<form method="POST" action="registro_reserva.php" class="form-inline">
<center>
	<div class="form-group">
	<br><br>
      	<label for="id_reserva">NUMERO DE RESERVA:</label>
		<input type="text" placeholder="Introduce el numero de reserva..." name="id_reserva" class="form-control" id="id_reserva" size="40px">
	</div>
	<br>
	<div class="form-group">
      	<label for="fecha_inicio">FECHA DE INICIO:</label>
		<input type="date" placeholder="introduce: 2000-01-01..." name="fecha_inicio" class="form-control" id="fecha_inicio">
	</div>
	<br>
	<div class="form-group">
      	<label for="fecha_final">FECHA FINAL:</label>
		<input type="date" placeholder="introduce: 2000-01-03..." name="fecha_final" class="form-control" id="fecha_final">
	</div>
	<br>
	<div class="form-group">
      	<label for="litros">LITROS:</label>
		<input type="text" placeholder="Introduce la cantidad de litros..." name="litros" class="form-control" id="litros" size="40px">
	</div>
	<br>
	<div class="form-group">
      	<label for="precio">PRECIO:</label>
		<input type="text" placeholder="Introduce el precio: 1234..." name="precio" class="form-control" id="precio" size="40px">
	</div>
	<br>
	<div class="form-group">
      	<label for="cliente_id_cliente">ID CLIENTE:</label>
		<input type="text" placeholder="Introduce el numero de cliente..." name="cliente_id_cliente" class="form-control" id="cliente_id_cliente" size="40px">
	</div>
	<br>
	<div class="form-group">
      	<label for="agencia_id_agencia1">ID AGENCIA:</label>
		<input type="text" placeholder="Introduce el numero de agencia..." name="agencia_id_agencia1" class="form-control" id="agencia_id_agencia1" size="40px">
	</div>


</center>
	<center>
		<br>
		<input type="submit" value="ENVIAR" class="btn btn-primary" name="enviar">
		<input type="submit" value="ACTUALIZAR" class="btn btn-warning" name="actualizar">
		<input type="submit" value="ELIMINAR" class="btn btn-danger" name="eliminar"> 
		<input type="button" value="CONSULTA" class="btn btn-info" 	onclick="location.href='consulta_tabla_reserva.php' "name="btn2"/>
	</center>
	<center>
	<br><br><br><br><br><br><br><br><br><br>
	<input type="button" value="MENU PRINCIPAL" class="btn btn-success" onclick="location.href='menu.php' "name="btn2khgd"/>
	</center>	
</form>

<?php

	if(isset($_POST['enviar'])){

		include("abrir_conexion.php");

		$id_reserva 		 = $_POST['id_reserva'];
		$fecha_inicio		 = $_POST['fecha_inicio'];
		$fecha_final 		 = $_POST['fecha_final'];
		$litros  			 = $_POST['litros'];
		$precio 			 = $_POST['precio'];
		$cliente_id_cliente  = $_POST['cliente_id_cliente'];
		$agencia_id_agencia1 = $_POST['agencia_id_agencia1'];

		$conexion->query("INSERT INTO $reserva (id_reserva,fecha_inicio,fecha_final,litros,precio,cliente_id_cliente,agencia_id_agencia1) values ('$id_reserva','$fecha_inicio','$fecha_final','$litros','$precio','$cliente_id_cliente','$agencia_id_agencia1')");

		echo "LOS DATOS FUERON ENVIADOS CORRECTAMENTE";

		include("cerrar_conexion.php");
	}

	if (isset($_POST['consultar'])) {

		include("abrir_conexion.php");

		$id_reserva 		 = $_POST['id_reserva'];
		$fecha_inicio		 = $_POST['fecha_inicio'];
		$fecha_final 		 = $_POST['fecha_final'];
		$litros  			 = $_POST['litros'];
		$precio 			 = $_POST['precio'];
		$cliente_id_cliente  = $_POST['cliente_id_cliente'];
		$agencia_id_agencia1 = $_POST['agencia_id_agencia1'];

		$resultados = mysqli_query($conexion,"SELECT * FROM $reserva WHERE id_reserva = '$id_reserva'");
		while ($consulta = mysqli_fetch_array($resultados)) {
		echo 
		"
		<table width=\"70%\" border=\"1\">
	      <tr>
		      <td><b><center>ID_RESERVA</center></b></td>
		      <td><b><center>FECHA_INICIO</center></b></td>
		      <td><b><center>FECHA_FINAL</center></b></td>
			  <td><b><center>LITROS</center></b></td>
			  <td><b><center>PRECIO</center></b></td>
			  <td><b><center>ID_CLIENTE</center></b></td>
			  <td><b><center>ID_AGENCIA</center></b></td>
		</tr>
		  <tr>
		  <td>".$consulta['id_reserva']."</td>
		  <td>".$consulta['fecha_inicio']."</td>
		  <td>".$consulta['fecha_final']."</td>
		  <td>".$consulta['litros']."</td>
		  <td>".$consulta['precio']."</td>
		  <td>".$consulta['cliente_id_cliente']."</td>
		  <td>".$consulta['agencia_id_agencia1']."</td>
		</tr>
		</table>
		";
		}
		include("cerrar_conexion.php");
	}

	if (isset($_POST['actualizar'])) {

		include("abrir_conexion.php");

		$id_reserva 		 = $_POST['id_reserva'];
		$fecha_inicio		 = $_POST['fecha_inicio'];
		$fecha_final 		 = $_POST['fecha_final'];
		$litros  			 = $_POST['litros'];
		$precio 			 = $_POST['precio'];
		$cliente_id_cliente  = $_POST['cliente_id_cliente'];
		$agencia_id_agencia1 = $_POST['agencia_id_agencia1'];

		if ($id_reserva == "" || $fecha_inicio == "" || $fecha_final == "" || $litros == "" || $precio == "" || $cliente_id_cliente == "" || $agencia_id_agencia1 == ""){

			echo "LOS CAMPOS SON OBLIGATORIOS";

		}else{

			$existe=0;

			$resultados = mysqli_query($conexion,"SELECT * FROM $reserva WHERE id_reserva = '$id_reserva'");
			while($consulta = mysqli_fetch_array($resultados)){

			$existe++;
		}

			if($existe==0){

				echo "EL ID RESERVA NO EXISTE";

			}else{
				//ACTUALIZAR 
				$_UPDATE_SQL="UPDATE $reserva Set id_reserva = '$id_reserva', fecha_inicio = '$fecha_inicio', fecha_final = '$fecha_final', litros = '$litros', precio = '$precio', cliente_id_cliente = '$cliente_id_cliente', agencia_id_agencia1 = '$agencia_id_agencia1' WHERE id_reserva ='$id_reserva'"; 

				mysqli_query($conexion,$_UPDATE_SQL); 

				echo "ACTUALIZACION CON EXITO";
				
			}
		} 

		include("cerrar_conexion.php");   
	}

	if (isset($_POST['eliminar'])) {

		include("abrir_conexion.php");

		$id_reserva = $_POST['id_reserva'];
		$existe=0;

		if($id_reserva == ""){

			echo "EL ID RESERVA ES OBLIGATORIO ES OBLIGATORIO";

		}else{

			$resultados = mysqli_query($conexion,"SELECT * FROM $reserva WHERE id_reserva = '$id_reserva'");
			while($consulta = mysqli_fetch_array($resultados)){

			$existe++;
		  }
		  if($existe==0){

			  echo "EL ID RESERVA NO EXISTE";

		  }else{
			  //ELIMINAR
			$_DELETE_SQL = "DELETE FROM $reserva WHERE id_reserva = '$id_reserva'";
			mysqli_query($conexion,$_DELETE_SQL); 
			echo "LOS DATOS SE ELIMINARON CORRECTAMENTE";
			}
		}
	}

?>

</body>
</html>