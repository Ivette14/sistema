<?php

class Cuentas extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		@ session_start();
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->library(array('session','form_validation'));
		$this->load->model("insertar");
		$this->load->helper(array('form'));
        $this->load->library('form_validation');
	}

	
function hrefc()
{

$this->load->view('usuario/cuentas_contables');

}			       
     ///Insercciones

  public function index(){
        // Cargar vista de formulario
        $this->load->view('usuario/cuentas_contables');
    }
	function insertar_cuenta() {

		  // Reglas de validacion
        $this->form_validation->set_rules(
            'nombre_cuenta',
            'vida_util',
            'required|min_length[1]|max_length[12]'
        );
 if ($this->form_validation->run() == FALSE){
            // Retornar errores de validacion
            echo validation_errors();
        }else{

            $data = array( 
            'id_cuentacontable' => $this->input->post('id_cuentacontable', TRUE),
			'nombre_cuenta' => $this->input->post('nombre_cuenta', TRUE),
			'vida_util' => $this->input->post('vida_util', TRUE),

		);
		
		$this->insertar->insertar_cuenta($data);
		redirect('Cuentas/index');
        }        
		
	
	
	}


}

?>