<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		@ session_start();
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->library(array('session','form_validation'));
		$this->load->model("model_usuario");
		$alarma=0;


	} /* END function Admin */
	function index()	{

		redirect( 'admin/login', 'refresh' ); /* Admin esta logueado? */
	}



	function login(){

		if ( isset($_SESSION['is_login'])  )
			redirect('admin/', 'refresh'); /* Admin esta logueado? */
			$this->load->view('usuario/view_login');
	} /* END function login */

	function validar_login(){
		//$nombre1=$this->input->post('usuario');
		//$clave1=$this->input->post('clave');

		$un_array=$this->input->post();

		$resp=$this->model_usuario->login($un_array);

		if($resp){
			
		$this->load->view('header/header');
		$this->load->view('form/inicio');
		$this->load->view('footer');
			
   		}
   		else
   		{
			$this->session->set_userdata('mensaje_error','');
			redirect('admin/login');

   		}

	}

	function salir(){ 
		unset($_SESSION['is_login']); 
		redirect( 'admin', 'refresh' ); 
	}
} /*END CLASS*/
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
