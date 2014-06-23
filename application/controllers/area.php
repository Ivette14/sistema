<?php
class Area extends CI_Controller {
	
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

	
function hrefa_area()
{

$this->load->view('form/a_area');

}			       
     ///Insercciones

  public function index(){
        // Cargar vista de formulario
  	    $this->load->view('header/header');
        $this->load->view('form/a_area');
        $this->load->view('footer');
    }
	function insertar_area() {

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
            'id_area' => $this->input->post('id_area', TRUE), 
            'id_sucursal' => $this->input->post('id_sucursal', TRUE),
			'nombre_area' => $this->input->post('nombre_area', TRUE),
			'nombre_sucursal' => $this->input->post('nombre_sucursal', TRUE),			
		);
		
		$this->insertar->insertar_area($data);
		redirect('area/index');
		}        
		
	
	
	}


}

?>