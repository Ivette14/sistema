<?php
class Sucursal extends CI_Controller {
	
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
		       

  	public function index(){
        // Cargar vista de formulario
  	    $this->load->view('header/header');
        $this->load->view('form/frmsucursal');
        $this->load->view('footer');
    }
	function insertar_sucursal() {

		  // Reglas de validacion
        $this->form_validation->set_rules(
            'nombre_sucursal',
            'telefono_sucursal',
            'direccion_sucursal',
            'departamento',
            'required|min_length[1]|max_length[12]'
        );
	 if ($this->form_validation->run() == FALSE){
            // Retornar errores de validacion
            echo validation_errors();
        }else{

            $data = array(
            'id_sucursal' => $this->input->post('id_sucursal', TRUE), 
            'nombre_sucursal' => $this->input->post('nombre_sucursal', TRUE),
			'telefono_sucursal' => $this->input->post('telefono_sucursal', TRUE),
			'direccion_sucursal' => $this->input->post('direccion_sucursal', TRUE),
			'departamento' => $this->input->post('departamento', TRUE),

		);
		
		$this->insertar->insertar_sucursal($data);
		redirect('sucursal/index');
		}        
		
	
	
	}


}

?>