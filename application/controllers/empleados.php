<?php

class Empleados extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		@ session_start();
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->library(array('session','form_validation'));
		$this->load->model('insertar');
		$this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->database('default');
	}

	
function hrefe()
{

$this->load->view('form/empleados');

}			       
     ///Insercciones

  public function index(){
        
        // Cargar vista de formulario
     
        $this->load->view('header/header');
		$this->load->view('form/frmempleado');
		$this->load->view('footer');
		
    }
	function insertar_empleado() {

		  // Reglas de validacion
        $this->form_validation->set_rules(
            'id_empleado',
            'nombre_empleado',
            'direccion_empleado',
            'telefono_empleado',
            'email_empleado',
            'required|min_length[1]|max_length[12]'
        );
 if ($this->form_validation->run() == FALSE){
            // Retornar errores de validacion
            echo validation_errors();
        }else{

            $data = array( 
            'id_empleado' => $this->input->post('id_empleado', TRUE),
			'nombre_empleado' => $this->input->post('nombre_empleado', TRUE),
			'direccion_empleado' => $this->input->post('direccion_empleado', TRUE),
			'telefono_empleado' => $this->input->post('telefono_empleado', TRUE),
			'email_empleado' => $this->input->post('email_empleado', TRUE),
			);
		
		$this->insertar->insertar_empleado($data);
		redirect('Empleados/index');
        }        
		
	
	
	}


}