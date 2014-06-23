<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <base href="<?php echo base_url();  ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ingreso al Sistema de Activofijo</title>

    <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url().'seteo/css/bootstrap.css';  ?>" rel="stylesheet">
    <link href="seteo/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="seteo/css/sb-admin.css" rel="stylesheet">

</head>

<body>
    <div class="page-header"> 
            <center><h1>Sistema de Control de Activos Fijos <small>Universidad General Gerardo Barrios</small></h1></center> 
        </div> 

    <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ingrese Usuario y Contraseña</h3>
                        </div>
                        <div class="panel-body">

                            <form role="form" action="admin/validar_login" method="post" name="view_login" id="view_login">

                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Usuario" name="nombre_usuario" id="nombre_usuario" type="text" autofocus="">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Clave" name="clave" id="clave" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Guardar Contraseña
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <!--<a href="index.html" class="btn btn-lg btn-success btn-block">Ingresar</a>-->

                                    <input type="submit" name="Enviar" value="Enviar" id="enviar" class="btn btn-lg btn-success btn-block"
                                    style="border-radius: 2px;font-size:15px;" >



                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url().'seteo/js/jquery-1.10.2.js';  ?>"></script>
    <script src="seteo/js/bootstrap.min.js"></script>
    <script src="seteo/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <!-- SB Admin Scripts - Include with every page -->
    <script src="seteo/js/sb-admin.js"></script>

   
</body>

</html>
