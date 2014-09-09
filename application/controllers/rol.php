<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class rol extends CI_Controller { 
 
 
	public function __construct(){ 
		parent::__construct(); 
		session_start(); 
		$this->load->model('model_rol'); 
			$this->load->model('crud_model_menu'); 
	} 
 
 
public function index(){	 
		if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' );
	
           $data['usuario']=$_SESSION['my_usuario'];
        //creamos una variable usuarios para pasarle a la vista

        $data['opcion'] = $this->model_rol->get_opcion();
		$data['usuario']=$_SESSION['my_usuario']; 
		$data['page']   ='form/roles'; 
		$this->load->view('templante', $data);
 
   }
	function traer_lista(){ 
		$data=array(); 
		$data['lista']=$this->model_rol->traer_rol(); 
		if( $data['lista']==false ){ 
			$data['type']   =false; 
			$data['message']='No hay Roles.'; 
		}else{ 
			$data['type']=true; 
		} 
		$this->output->set_content_type('application/json')->set_output( json_encode( $data ) ); 
	} 
 
 
 
	function traer_rol(){ 
		$data=array(); 
		$id_rol=(int)$this->input->post('id_rol'); 
		if( $id_ro==0 ){ 
			$data['type']   =false; 
			$data['message']='El parámetro id Rol falló.'; 
		}else{ 
			$data['rol']=$this->model_rol->traer_rol( $id_rol ); 
			if( $data['rol']==false ){ 
				$data['type']   =false; 
				$data['message']='No se encontró el Rol.'; 
			}else{ 
				$data['type']=true; 
			} 
			$this->output->set_content_type('application/json')->set_output( json_encode( $data ) ); 
		} 
	} 
 
 
 
	function save_form(){ 
		$fecha = time();
		$data=array(); 
		$this->form_validation->set_rules('rol', 'rol', 'trim|required|xss_clean'); 
		$id_rol=(int)$_POST['id_rol'];  
		unset($_POST['id_rol']); 
 	$this->form_validation->set_message('required', 'campo %s requerido'); 

		if( $this->form_validation->run() === FALSE ){ 
			$data['type']   =false; 
			$data['message']=validation_errors(); 
		}else{ 
			if( $id_rol==0 ){ 
				$hecho=$this->model_rol->save_rol( $_POST ); 
			}else{ 
				$hecho=$this->model_rol->edit_usuario( $id_rol, $_POST ); 
			} 
			if( $hecho==false ){ 
				$data['type']   =false; 
				$data['message']='No se pudo guardar el rol.'; 
			}else{ 
				$data['type']      =true; 
				$data['message']   ='El rol ha sido guardado.'; 
				$data['id_rol']=($id_rol==0)?$hecho:$id_rol; 


			} 
		} 

 if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
           $data['usuario']=$_SESSION['my_usuario'];


       $opcion = $this->model_rol->get_opcion();
        //creamos una variable usuarios para pasarle a la vista
        $data['opcion'] = $opcion;
        //cargamos nuestra vista
        $this->load->view('header/header', $data);
        $this->load->view('form/asignar_menu',$data);
        $this->load->view('footer');

		$this->output->set_content_type('application/json')->set_output( json_encode( $data ) ); 
	} 
 
 
	function delete_(){ 
		$data=array(); 
		$id_rol=(int)$this->input->post('id_rol'); 
		if( $id_rol==0 ){ 
			$data['type']   =false; 
			$data['message']='El parámetro id ro falló.'; 
		}else{ 
			$hecho=$this->model_rol->delete_( $id_rol ); 
			if( $hecho==false ){ 
				$data['type']   =false; 
				$data['message']='No se pudo eliminar.'; 
			}else{ 
				$data['type']   =true; 
				$data['message']='Rol eliminado.'; 
			} 
		} 
		$this->output->set_content_type('application/json')->set_output( json_encode( $data ) ); 
	} 

 function index_opcion(){

 if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
           $data['usuario']=$_SESSION['my_usuario'];


       $opcion = $this->model_rol->get_opcion();
        //creamos una variable usuarios para pasarle a la vista
        $data['opcion'] = $opcion;
        //cargamos nuestra vista
        $this->load->view('header/header', $data);
        $this->load->view('form/asignar_menu',$data);
        $this->load->view('footer');




 }
 	function edit_rol(){
if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
		$data['usuario']=$_SESSION['my_usuario']; 
//obtenemos todos los usuarios
        $menu = $this->model_rol->get_menu();

        $data['opcion'] = $this->model_rol->get_opcion();
        //creamos una variable usuarios para pasarle a la vista
        $data['menu'] = $menu;
        //cargamos nuestra vista
$data['page']   ='edit_rol'; 
		$this->load->view('plantilla', $data); 

        }
 



 
}