<?php
// En este php evaluamos la session si esta longeado y si esa si muestra todo el contenido de la pagina
   // session_start(); 
if (isset($_SESSION['my_usuario']))
{

?>
<html>

<head>

   <script src="jquery.js"></script>     
     <script src="validCampoFranz.js"></script>
    <base href="<?php echo base_url(); ?>">
        <meta charset="utf-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
   
        <!-- Bootstrap --> 
        <link href="css/bootstrap.min.css" rel="stylesheet"> 
        <!-- JQUERY UI --> 
        <link href="css/smoothness/jquery-ui-1.10.4.custom.css" rel="stylesheet"> 
        <link href="css/smoothness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet"> 


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo base_url();  ?>">

    <title>Sistema de Activo Fijo</title>
     
    <!-- Código del Icono -->
    <link href="<?php echo base_url().'seteo/logos/logo7.png'; ?>" type="image/x-icon" rel="shortcut icon" />
    

    <!-- Core CSS - Include with every page -->
<link href="<?php echo base_url().'seteo/js/devoops.js'; ?>" type="javascript" >
  <link href="<?php echo base_url().'seteo/js/devoops.min.js'; ?>" type="javascript">  
   <link href="<?php echo base_url().'seteo/plugins/bootstrap/bootstrap.css'; ?>" rel="stylesheet">

<link href="<?php echo base_url().'seteo/plugins/jquery-ui/jquery-ui.min.css'; ?>" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url().'seteo/plugins/fancybox/jquery.fancybox.css'; ?>" rel="stylesheet">
<link href="<?php echo base_url().'seteo/plugins/fullcalendar/fullcalendar.css'; ?>" rel="stylesheet">
<link href="<?php echo base_url().'seteo/plugins/xcharts/xcharts.min.css'; ?>" rel="stylesheet">
<link href="<?php echo base_url().'seteo/plugins/select2/select2.css'; ?>" rel="stylesheet">
<link href="<?php echo base_url().'seteo/css/style.css' ; ?>" rel="stylesheet">


    <link href="<?php echo base_url().'seteo/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'seteo/font-awesome/css/font-awesome.css'; ?>" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="<?php echo base_url().'seteo/css/plugins/morris/morris-0.4.3.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'seteo/css/plugins/timeline/timeline.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'seteo/css/plugins/dataTables/dataTables.bootstrap.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'seteo/media/css/jquery.dataTables.css'; ?>" rel="stylesheet">
    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo base_url().'seteo/css/sb-admin.css'; ?>" rel="stylesheet">


<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">
        google.load("jquery", "1.4.4");
        </script>
        <script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
</head>

<body>
    <!-- DIALOGO --> 
        <div id="dialogo" style="display:none;"><div class="notify"></div></div> 
 
        <!-- ALERTA --> 
        <div class="col-md-4 col-md-offset-4" style="position:fixed;" id="msj"></div>


    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <img src="<?php echo base_url().'seteo/logos/banner.png'; ?>" height="75px" >

           


            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">

           <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
           
             <li><a href='acceso/salir'><i class="fa fa-user fa-fw"></i>Perfil</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href='acceso/salir'><i class="fa fa-sign-out fa-fw"></i>Cerrar Session</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                       
                                            <?php foreach ($menu as $menu):?>
                                                
                        <li><a href="<?  echo base_url().$menu->url;  ?>"><i class="fa fa-dashboard fa-fw"></i> <?= $menu->opcion?> </a></li>
                           <?php endforeach ;?>
                       
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
        <?php
}
else
{
   redirect( 'acceso', 'refresh' ); 
}
?>