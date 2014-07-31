<?php

    function DescargarArchivo($fichero)
	{
		$basefichero = basename($fichero);
		header( "Content-Type: application/octet-stream");
		header( "Content-Length: ".filesize($fichero));
		header( "Content-Disposition:attachment;filename=" .$basefichero."");
		readfile($fichero);
    }
	
	//Obtener Fecha de Hoy
	$fecha = time ();
	$fecha_partir1=date ( "h" , $fecha ) ;
	$fecha_partir2=date ( "i" , $fecha ) ;
	$fecha_partir4=date ( "s" , $fecha ) ;
	$fecha_partir3=$fecha_partir1-1;
	$reporte="Reporte_";
	$filename = $reporte. date("Y-m-d")."_". $fecha_partir3.'_'.$fecha_partir2.'_'.$fecha_partir4.'.pdf';
		
	//Llamando las librerias
	require_once('http://localhost:8080/JavaBridge/java/Java.inc');
	require('/php-jru/php-jru.php');
	//Llamando la funcion JRU de la libreria php-jru
	$jru=new JRU();
	//Ruta del reporte compilado Jasper generado por IReports
	$Reporte='C://xampp//htdocs//sistema//application//views//reportes//report10.jasper';
	//Ruta a donde deseo Guardar Mi archivo de salida Pdf
	$SalidaReporte='C://xampp//htdocs//sistema//application//views//reportes//'.$filename;
	//Parametro en caso de que el reporte no este parametrizado
	$Parametro=new java('java.util.HashMap');
	//$Parametro->put("id", 2);
	//Funcion de Conexion a mi Base de datos tipo MySql
	$Conexion= new	JdbcConnection("com.mysql.jdbc.Driver","jdbc:mysql://localhost/sys_activofijo","root","");
	//Generamos la Exportacion del reporte
	$jru->runReportToPdfFile($Reporte,$SalidaReporte,$Parametro,$Conexion->getConnection());
	
	if(file_exists($SalidaReporte)) 
	{ 	
		DescargarArchivo($filename);
		if(file_exists($SalidaReporte)) 
		{ 
			if(unlink($filename)) 
			{		
			}
		}
	}
?>