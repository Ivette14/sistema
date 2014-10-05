<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class rol extends CI_Controller { 
 
 
	public function __construct(){ 
		parent::__construct(); 
		session_start(); 
         $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('pagination');
        $this->load->library(array('session','form_validation'));
           $this->load->helper(array('form'));
        $this->load->library('form_validation');
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
          

   if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
        $data['usuario']=$_SESSION['my_usuario']; 

        $data['opcion'] = $this->model_rol->get_opcion($id_rol);

        $data['opcionn']= $this->model_rol->get_opcion_($id_rol);

        $respuesta = $this->model_rol->get_rol_($id_rol);
        //si nos retorna FALSE le mostramos la pag 404
        if($respuesta==false)

        show_404();
        else
        {
            //Si existe el post para editar
            if($this->input->post('post') && $this->input->post('post')==1)
            {
             
            $existencia = $this->model_rol->existencia($id_rol);

                $exis = 1;

                if ($existencia == 0 ) {


                $id_opcion       = $this->input->post('id_opcion');
                foreach ($id_opcion as $id)  

                  $this->model_rol->actualizar_rol($id_rol, $id);
              redirect('crud'); 
                        
                    
                }
                else
                {
                      $id_opcion       = $this->input->post('id_opcion');
                foreach ($id_opcion as $id)  

                 $this->model_rol->insert_opcion($id_rol, $id);
                redirect('rol'); 
                        
                }
            
                              
            }
            }
            //devolvemos los datos del usuario
          
    
            $data['dato'] = $respuesta;
            //cargamos la vista
            $this->load->view('header/header',$data);
            $this->load->view('form/edit_rol_',$data);
            $this->load->view('footer');
        }


        //si nos retorna FALSE le mostramos la pag 40 
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