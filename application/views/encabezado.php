<!DOCTYPE html> 
<html lang="en"> 
	<head> 
		<base href="<?php echo base_url(); ?>">
		<meta charset="utf-8"> 
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title>Activo fijo | SCAF</title> 
		<!-- Bootstrap --> 
		<link href="css/bootstrap.min.css" rel="stylesheet"> 
		<!-- JQUERY UI --> 
		<link href="css/smoothness/jquery-ui-1.10.4.custom.css" rel="stylesheet"> 
		<link href="css/smoothness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet"> 
	</head> 
	 
	<body> 
 
		<div class="page-header"> 
  			<center><h1>
		 <img src="<?php echo base_url().'seteo/logos/logo6.png'; ?>" height="75px" ><small>Sistema de Control de Activos Fijos</small></h1> </center>
		</div> 
     		 
		<p class="navbar-text navbar-right"><?php echo(isset($usuario)&&$usuario!=false)?'Bienvenido:'.$usuario['nombre_usuario']:'' ?> <?php echo(isset($usuario)&&$usuario!=false)?"<a href='acceso/salir' class='navbar-link'>Salir</a>":''; ?></p> 
 
		<!-- DIALOGO --> 
		<div id="dialogo" style="display:none;"><div class="notify"></div></div> 
 
		<!-- ALERTA --> 
		<div class="col-md-4 col-md-offset-4" style="position:fixed;" id="msj"></div>
