<?php
    //parametors para la conexion a la base de datos
	$host = "localhost";
	$basededatos = "proyecto_coches";
	$usuariodb = "baseDatosProyecto";
    $clavedb = "170869efrain1998";
    
    try {
        $conexion = new PDO('mysql:host='.$host.';dbname='.$basededatos, $usuariodb, $clavedb);
    } 
    catch (PDOException $e) 
    {
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }

?>

<html lang="es">
	<head> 
		<title>CONSULTA TABLA RESERVA</title>
		<style>
		body{
			background-image: url("yellow_blue.jpg");
		}
		</style>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<!--<link rel="stylesheet" href="css/estilos.css">-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h3>TABLA RESERVA</h3>
			</div>
		</header>

		<section>
			<table class="col-md-12">
				<tr class="bg-primary">
					<th class="pad-basic">ID_RESERVA</th>
					<th class="pad-basic">FECHA_INICIO</th>
                    <th class="pad-basic">FECHA_FINAL</th>
                    <th class="pad-basic">LITROS</th>
                    <th class="pad-basic">PRECIO</th>
                    <th class="pad-basic">CLIENTE_ID_CLIENTE</th>
                    <th class="pad-basic">AGENCIA_ID_AGENCIA</th>
				<tr>

				<?php

				$query="SELECT * FROM reserva";
				$consulta=$conexion->query($query);
				while ($fila=$consulta->fetch(PDO::FETCH_ASSOC))
					{
						echo'
						<tr>
						<td>'.$fila['id_reserva'].'</td>
                        <td>'.$fila['fecha_inicio'].'</td>
                        <td>'.$fila['fecha_final'].'</td>
                        <td>'.$fila['litros'].'</td>
                        <td>'.$fila['precio'].'</td>
                        <td>'.$fila['cliente_id_cliente'].'</td>
                        <td>'.$fila['agencia_id_agencia1'].'</td>
						</tr>
						';
                    }

				?>

			</table>
		</section>
		<center>
		<br><br>
		<input type="button" value="REGRESAR" class="btn btn-primary" onclick="location.href='registro_reserva.php' "name="atras"/>
	    </center>
</body>
</html>