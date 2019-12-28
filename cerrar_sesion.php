<?php
	session_start();
	ob_start();
	//Cerrar sesion es tan simple como igualar a 0 la variable... en este caso
	//La iguale a 4 para saber exactamente cuando cierran sesion y asi mostrar
	//en el index un mensaje de despedida (mirar linea 49 del index)
	$_SESSION['sesion_exito']=4;//error 4 cerro sesion exitosamente
	header('Location: index.php');
?>