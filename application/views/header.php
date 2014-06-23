<html lang="en">
  <head>
<!-- <?php 
 foreach($css_files as $file): ?>
  <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
-->
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
  <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
body
{
  font-family: Arial;
  font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
  text-decoration: underline;
}
</style>
        <script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("cuentas").submit(function(e){
                    e.preventDefault();
                    // Iniciar peticion AJAX
                    $.post(
                        "cuentas/insertar_cuenta",         // ruta del controlador y accion
                        $(this).serialize(),     // Formulario
                        function(data){            // Funcion que recibe data
                            alert(data);
                        }
                    );
                });
            });
        </script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <base href="<?php echo base_url();  ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Sistema Activo Fijo</title>


    <!-- Bootstrap core CSS -->
     <link href="<?php echo base_url().'seteo/css/bootstrap.css';  ?>" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="<?php echo base_url().'seteo/css/sb-admin.css'; ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'seteo/font-awesome/css/font-awesome.min.css'; ?>">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
  </head>

 <body>

    <div id="wrapper">


     <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand" href="<?php echo base_url().'direccion'; ?>"> Sistema AF   																				     </a></div>                  
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="<?php echo base_url().'direccion'; ?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="<?php echo base_url().'direccion/hrefactivo'; ?>"><i class="fa fa-edit"></i> Activo Fijo</a></li>
            <li><a href="<?php echo base_url().'direccion/hrefbaja'; ?>"><i class="fa fa-edit"></i> Baja de AF</a></li>
            <li><a href="<?php echo base_url().'direccion/hrefempleados'; ?>"><i class="fa fa-edit"></i> Empleados</a></li>
            <li><a href="<?php echo base_url().'direccion/hrefproveedor'; ?>"><i class="fa fa-edit"></i> Proveedores</a></li>
            <li><a href="<?php echo base_url().'direccion/hrefsaldos'; ?>"><i class="fa fa-edit"></i> Depreciacion</a></li>
            <li><a href="<?php echo base_url().'direccion/hrefcuentas'; ?>"><i class="fa fa-edit"></i> Cuentas</a></li>
            <li><a href='<?php echo site_url('examples/offices_management')?>'><i class="fa fa-edit"></i></i> Sucursales</a></li>
            <li><a href="<?php echo base_url().'direccion/hrefareas'; ?>"><i class="fa fa-edit"></i> Areas</a></li>
            <li><a href="<?php echo base_url().'direccion/hreftraslado'; ?>"><i class="fa fa-edit"></i> TrasladoAF</a></li>
              <li><a href="<?php echo base_url().'usuarios'; ?>"><i class="fa fa-edit"></i> Usuarios</a></li>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Seting <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Dropdown Item</a></li>
                <li><a href="#">Another Item</a></li>
                <li><a href="#">Third Item</a></li>
                <li><a href="#">Last Item</a></li>
              </ul>
            </li>
          </ul>

        <!--    <li><a href="<?php echo base_url().'direccion/grid'; ?>"><i class="fa fa-edit"></i> Reportes</a></li> -->
           
           
          


          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
          <a heref="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo(isset($usuario)&&$usuario!=false)?'Bienvenido:'.$usuario['nombre_usuario']:'' ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Perfil</a></li>
                   <li><a href="#"><i class="fa fa-user"></i> Usuarios</a></li>
              
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-power-off"></i>  <?php echo(isset($usuario)&&$usuario!=false)?"<a href='acceso/salir' class='navbar-link'>Salir</a>":''; ?></a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
     <div id="page-wrapper">