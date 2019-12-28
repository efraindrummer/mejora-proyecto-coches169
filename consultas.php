<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CONSULTAS</title>
    <style>
    body{
        background-image: url("coche01.jpg");
    }
    </style>

    <style>
    form input{
		display: inline-block;
		width: 200px;
	}
	</style>

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>
<body>
    <div class="row">
  	<div class="col-md-3"></div>
  	<div class="col-md-5">
  	<center><h1>CONSULTAS GENERALES DE LA BASE DE DATOS</h1></center>

  	<form method="POST" action="consultas.php" class="form-inline">
        <center>
            <br><br>
            <input type="button" value="LISTA DE NOMBRES DE LOS CLIENTES" class="btn btn-primary btn-lg btn-block" onclick="location.href='listar_mnnc.php' "name="tabla"/> 
            <br>
            <input type="button" value="FECHA Y PRECIO DE RESERVA DE CADA ID CLIENTE" class="btn btn-primary btn-lg btn-block" onclick="location.href='fecha_p_r_c.php' "name="tlasa"/>
            <br>
            <input type="button" value="MARCA Y MODELO DE LOS COCHES" class="btn btn-primary btn-lg btn-block" onclick="location.href='marca_modelo.php' "name="askja"/>
            <br>
            <input type="button" value="MATRICULAS EXISTENTES" class="btn btn-primary btn-lg btn-block" onclick="location.href='matricula.php' "name="akshfkushfskjd"/>
            
        </center>
    </form>
    <br><br><br><br><br><br><br><br><br><br>
    <center>
        <input type="button" value="REGRESAR AL MENU PRINCIPAL" class="btn btn-success" onclick="location.href='menu.php' "name="btn3"/>
    </center>
</body>
</html>