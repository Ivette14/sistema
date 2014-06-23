<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Examples extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
	 session_start();
		$this->load->library('pagination');
		$this->load->library(array('session','form_validation'));
		$this->load->model("model_usuario");
		$alarma=0;
		$this->load->model('model_usuarios'); 
		$this->load->database();
		$this->load->helper('url');

		$this->load->library('Grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('example.php',$output);
	}

	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function offices_management()
	{
		
	
		try{
			$crud = new grocery_CRUD();
				
            $crud->set_theme('datatables');
			$crud->set_table('cat_activo_fijo');
			$crud->set_subject('activo');
			$crud->required_fields('id_activofijo');
			$crud->columns('id_activofijo','id_cuentacontable','nombre_activo_fijo', 'valor_original', 'id_proveedor', 'fecha_compra', 'fecha_ingreso', 'descripcion', 'estado', 'valor_original', 'id_sucursal', 'id_area', 'id_empleado', 'fecha_inicio_uso', 'importe_depreciable', 'valor_residual', 'vida_util', 'cuota_anual', 'cuota_mensual' );

			$output = $crud->render();
 $this->load->view('template');  
        $this->_example_output($output);
  
		}
			
 
            
		catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}