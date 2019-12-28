<?php
	//parametors para la conexion a la base de datos
	$host = "localhost";
	$basededatos = "proyecto_coches";
	$usuariodb = "baseDatosProyecto";
	$clavedb = "170869efrain1998";

	//tablas de la base de datos
	$agencia = "agencia";
	$cliente = "cliente";
	$coche = "coche";
	$garage = "garage";
	$involucra = "involucra";
	$reserva = "reserva";

	$usuarios = "usuarios";

	error_reporting(0);

	$conexion =  new mysqli($host,$usuariodb,$clavedb,$basededatos);

	if ($conexion->connect_errno) {
		echo "LA CONEXION EXPERIMENTA FALLOS";
		exit();
	}

?>