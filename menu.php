<!DOCTYPE html>
<html lang="es-ES">
<!-- en este menu se programo en css y html5 cpon boostrap  -->
<!--todo este proyecto esta encriptado, no se puede acceder al menu sin que el usuario 
y contraseña sea ingresado correctamente, se usaron $_SESSION para poder encriptar las paginas

PROYECTO ECHO POR EFRAIN MAY MAYO-170869-INGIENERIA EN COMPUTACION-BASE DE DATOS 2- 5 SEMESTRE-->
<head>
    <meta charset="UTF-8">
    <title>Menu Principal</title>
    <style>
        body{ 

            background-attachment: fixed;
            background-color: #FFFFFF;
            background-image: url("php-mysql.png");
            background-position: center center;

        }
    </style>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <style>
    #menu {
        width: 540px;
        margin: 0 auto
    }
    #menu>ul>li {
        float: left
    }
    #menu>ul>li a {
        display: block;
        width: 90px;
        height: 85px;
        text-align: center;
        line-height: 70px
    }
    #menu>ul>li>ul {
        display: none
    }
    #menu>ul>li>ul>li {
        position: relative
    }
    #menu>ul>li>ul>li>a {
        background: white
    }
    #menu>ul>li>ul>li>ul {
        position: absolute;
        left: 100px;
        top: 0;
        display: none
    }
    #menu>ul>li>ul>li>ul a {
        background: #ff0
    }
    #menu ul {
        list-style: none;
        margin: 0;
        padding: 0
    }
    </style>
    
</head>
<body>
<center><h1>**********MENU PRINCIPAL**********</h1></center>
<br><br>

    <?php
        session_start();
        ob_start();

        if(isset($_POST['btn_index']))//Verifico que el boton "iniciar sesion" fue oprimido
        {
        $_SESSION['sesion_exito']=0;

        $usuario = $_POST['usuario'];
        $pass = $_POST['pass'];

        if($usuario=="" || $pass==""){

            $_SESSION['sesion_exito']=2;//2 sera error de campos vacios
        }else{

            include("abrir_conexion.php");  
            
            $_SESSION['sesion_exito']=3;//3 Datos Incorrectos
            $resultados = mysqli_query($conexion,"SELECT * FROM $usuarios WHERE usuario = '$usuario' AND pass = '$pass'");
            while($consulta = mysqli_fetch_array($resultados)){

                $_SESSION['sesion_exito']=1;//Inicio Sesion :D
        }
        
            header('Location:menu.php');
            include("cerrar_conexion.php");
        }
        }

        if($_SESSION['sesion_exito']<>1){

            header('Location:index.php');
        }
        
    ?>

    <nav id="menu">
        <ul>
            <li><a class="btn btn-success" href="registro_clientes.php">CLIENTES.</a></li>

            <li><a class="btn btn-success" href="registro_agencia.php">AGENCIA.</a></li>

            <li><a class="btn btn-success" href="registro_reserva.php">RESERVA.</a></li>

            <li><a class="btn btn-success" href="registro_garage.php">GARAGE.</a></li>

            <li><a class="btn btn-success" href="registro_coche.php">COCHE.</a></li>

            <li><a class="btn btn-success" href="registro_involucra.php">INVOLUCRA.</a></li> 

        </ul> 
        <br><br>
        <center></center>
        <input type="button" value="CONSULTAS GENERALES" class="btn btn-primary btn-lg btn-block" onclick="location.href='consultas.php' "name="btn3"/>
        </center>
   </nav>  
    
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <center><a class="btn btn btn-danger" href="cerrar_sesion.php" role="button">CERRAR SESIÓN</a></center>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $menu = $('#menu').find('ul').find('li');

        $menu.hover(function() {
            $(this).children('ul').stop();
            $(this).children('ul').slideDown();
        }, function() {
            $(this).children('ul').stop();
            $(this).children('ul').slideUp();
        });
    });
    </script>
</body>

</html>