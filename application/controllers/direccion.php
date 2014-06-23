<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Direccion extends CI_Controller {

	function __construct(){
		parent::__construct();
		@ session_start();
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->library(array('session','form_validation'));
		$this->load->model("model_usuario");
		$alarma=0;


	}
	 /* END function Admin */

function index(){

	$this->load->view('header/header');
$this->load->view('form/inicio');
$this->load->view('footer');
}
function hrefini(){

$this->load->view('header/header');
$this->load->view('form/inicio');
$this->load->view('footer');

}
function hrefaf(){

$this->load->view('header/header');
$this->load->view('form/frmactivofijo');
$this->load->view('footer');

}

function hrefa_activo(){

$this->load->view('header/header');
$this->load->view('form/a_activofijo');
$this->load->view('footer');

}

function hrefbaja(){
$this->load->view('header/header');
$this->load->view('form/frmbaja');
$this->load->view('footer');

}

function hrefemplea(){
$this->load->view('header/header');
$this->load->view('form/frmempleado');
$this->load->view('footer');

}

function hrefa_emplea(){
$this->load->view('header/header');
$this->load->view('form/a_empleado');
$this->load->view('footer');

}

function hrefprove(){
$this->load->view('header/header');
$this->load->view('form/frmproveedor');
$this->load->view('footer');

}

function hrefa_prove(){
$this->load->view('header/header');
$this->load->view('form/a_proveedor');
$this->load->view('footer');

}

function hrefdepre(){
$this->load->view('header/header');
$this->load->view('form/frmdepreciacion');
$this->load->view('footer');

}

function hrefcuenta(){
$this->load->view('header/header');
$this->load->view('form/frmcuentas');
$this->load->view('footer');

}

function hrefa_cuenta(){
$this->load->view('header/header');
$this->load->view('form/a_cuentas');
$this->load->view('footer');

}

function hrefarea(){

$this->load->view('header/header');
$this->load->view('form/frmarea');
$this->load->view('footer');

}

function hrefa_area(){

$this->load->view('header/header');
$this->load->view('form/a_area');
$this->load->view('footer');

}

function hreftras(){

$this->load->view('header/header');
$this->load->view('form/frmtraslado');
$this->load->view('footer');

}



function hrefsucur(){

$this->load->view('header/header');
$this->load->view('form/frmsucursal');
$this->load->view('footer');

}
function hrefa_sucur(){

$this->load->view('header/header');
$this->load->view('form/a_sucursal');
$this->load->view('footer');

}

function hreftrasla(){

$this->load->view('header/header');
$this->load->view('form/frmtraslado');
$this->load->view('footer');

}

function hrefa_trasla(){

$this->load->view('header/header');
$this->load->view('form/a_traslado');
$this->load->view('footer');

}

} /*END CLASS*/
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
