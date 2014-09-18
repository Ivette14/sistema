<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class rol extends CI_Controller { 
 
 
	public function __construct(){ 
		parent::__construct(); 
		session_start(); 
		$this->load->model('model_rol'); 
			$this->load->model('crud_model_menu'); 
	} 
 
 
public function index()
{	 
		if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' );
	
           $data['usuario']=$_SESSION['my_usuario'];
        //creamos una variable usuarios para pasarle a la vist
         
        $data['roles']  =  $this->model_rol->get_rol(); 
		$data['usuario']= $_SESSION['my_usuario']; 
		$data['page']   ='form/roles'; 
		$this->load->view('templante', $data);
 
   }
	 public function editar($id_rol=0)
    {

         
        //verificamos si existe el id
        $respuesta = $this->model_rol->get_rol_($id_rol);
        
        
        //si nos retorna FALSE le mostramos la pag 404
        if($respuesta==false)
        show_404();
        else
        {
            //Si existe el post para editar
            if($this->input->post('post') && $this->input->post('post')==1)
            {
             $this->form_validation->set_rules('rol', 'Nombre de Rol', 'required|trim|xss_clean');
              $this->form_validation->set_rules('id_opcion', 'Id Opcion', 'required|trim|xss_clean');
           
         
             
            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
            $this->form_validation->set_message('alpha','El Campo <b>%s</b> Solo Acepta caracteres alfabeticos');
            if ($this->form_validation->run() == TRUE)
            {
                $rol       = $this->input->post('rol');
                $id_opcion       = $this->input->post('id_opcion');

                foreach ($id_opcion as $id) 
                	$this->model_rol->actualizar_rol($id_rol, $rol, $id);

                redirect('rol'); 
                	# code...
                

               
                              
            }
            }
            //devolvemos los datos del usuario
              if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
           $data['usuario']=$_SESSION['my_usuario']; 
           $data['opcion'] = $this->model_rol->get_opcion();
            $data['dato'] = $respuesta;
            //cargamos la vista
            $this->load->view('header/header',$data);
            $this->load->view('form/edit_rol_');
            $this->load->view('footer');
        }
    }


 
 public function agregar()
    {
       
           if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
           $data['usuario']=$_SESSION['my_usuario']; 
                 //Si Existe Post y es igual a uno
        if($this->input->post('post') && $this->input->post('post')==1)
        {
            $this->form_validation->set_rules('rol', 'Rol', 'required|trim|xss_clean');
             
             
            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
        
            $this->form_validation->set_message('alpha','El Campo <b>%s</b> Solo Acepta caracteres alfabeticos');
            if ($this->form_validation->run() == TRUE)
            {                
                $rol    = $this->input->post('rol');
                               

                $this->model_rol->save_rol($rol);

                redirect('rol');               
            }
        }

         //cargamos nuestra vista
        $this->load->view('header/header', $data);
        $this->load->view('form/a_rol');
        $this->load->view('footer');
    

    }
     


 



 
}