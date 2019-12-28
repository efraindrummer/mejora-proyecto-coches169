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
		<title>CONSULTA</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link rel="stylesheet" href="css/estilos.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h3>FECHAS, PRECIO Y ID CLIENTES</h3>
			</div>
		</header>

		<section>
			<table class="col-md-12">
				<tr class="bg-primary">

					<th class="pad-basic">FECHA DE INICIO</th>
                    <th class="pad-basic">FECHA FINAL</th>
                    <th class="pad-basic">PRECIO</th>
                    <th class="pad-basic">ID_CLIENTE</th>
				<tr>

				<?php

				$query="SELECT DISTINCT fecha_inicio, fecha_final, precio, cliente_id_cliente FROM reserva ORDER BY 'cliente_id_cliente' DESC ";
				$consulta=$conexion->query($query);
				while ($fila=$consulta->fetch(PDO::FETCH_ASSOC))
					{
						echo'
						<tr>
						<td>'.$fila['fecha_inicio'].'</td>
                        <td>'.$fila['fecha_final'].'</td>
                        <td>'.$fila['precio'].'</td>
                        <td>'.$fila['cliente_id_cliente'].'</td>
						</tr>
						';
					}

				?>

			</table>
		</section>
		<center>
		<br><br>
		<input type="button" value="REGRESAR" class="btn btn-link" onclick="location.href='consultas.php' "name="atras"/>
	    </center>
</body>
</html>