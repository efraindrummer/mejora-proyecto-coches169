<!DOCTYPE html>
<!-- saved from url=(0050)http://getbootstrap.com/examples/navbar-fixed-top/ -->
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Login" content="">
        <meta name="LOGIN" content="">
        <link rel="icon" href="efrain.jpg">
        <title>Login</title>
        
        <style>
        body{
            background-attachment: fixed;
     	    background-color: #FFFFFF;
            background-image: url("yellow_blue.jpg");
            background-position: center center;
        }
        </style>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8"><font color="#000"><center><strong><h1>RESERVA DE COCHES</h1></strong><h3>Php+Css+Html5+Bootstrap+MySQL+Javascript</h3></center></font></div>
                    <div class="col-md-2"></div>
                </div>
                <hr>
    <h3>    
        <p class="bg-danger" align="center">
        <b>
            <?php
            session_start();
            ob_start();
                if(isset($_SESSION['sesion_exito']))
                {
                    //if($_SESSION['sesion_exito']==0) 
                    // {echo "inicie sesion por favor";} Ya que si lo dejamos, siempre que accedemos a index arroja error.
                    if($_SESSION['sesion_exito']==2)
                        {echo "Los campos SON OBLIGATORIOS";}
                    if($_SESSION['sesion_exito']==3)
                        {echo "DATOS INCORRECTOS";}
                }
                else
                {
                    $_SESSION['sesion_exito']=0;
                }
                
            ?>
        </b>
        </p>
        <p class="bg-success" align="center">
        <b>
            <?php
                if($_SESSION['sesion_exito']==4)
                    {echo "GRACIAS POR USAR NUESTROS SERVICIOS";}
                $_SESSION['sesion_exito']=0; //Despues de confirmar el error, igualo lo variable a 0
            ?>
        </b>
        </p>
    </h3>
        <!--Inicio del formulario de Iniciar sesion-->
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="well"> <!--hace un sombreado a la columna-->
                            <center>
                                <h3><strong>INICIAR SESION</strong></h3><br>
                                <img src="1234.jpg" class="img-circle" width="160" height="160">
                                
                                <br><br><br>
                                
                                <form class="form-inline" method="POST" action="menu.php" name="login">
                                    <div class="form-group">
                                    <label for="usuario">USUARIO.</label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control" id="usuario" placeholder="Usuario" name="usuario">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                      <label for="pass">CONTRASEÑA</label>
                                        <input type="password" class="form-control" id="pass" placeholder="Contraseña" name="pass">   
                                    </div>  
                                    <br><br>
                                    <input type="hidden" name="envio">
                                    <p><input type="submit" id="enviar" class="btn btn-success" value="INICIAR SESIÓN" name="btn_index">
                                     <a class="btn btn btn-danger" href="https://www.instagram.com/efraindrummer/?hl=es-la" role="button">SALIR</a></p>
                                </form>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
              </div>
            </div>
            <p align="center"><i>SISTEMA DE RESERVA DE AUTOS CREADO POR <strong>EFRAIN MAY MAYO</strong></i> </p>
      </body>
  </html>