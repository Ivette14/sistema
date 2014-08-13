<?php if ( ! defined ('BASEPATH')) exit('No direct otscript access allowed');

class exportar extends CI_Controller
{
	
	


	function toExcel_depreciacion () {
	
	$this->load->view('form/reportes/exportar_depreciacion.php');
	}
}