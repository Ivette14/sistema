<?php 
    class Crud_roles extends CI_Controller
{
    public function __construct()
    {
        //Cargamos El Constructor
parent::__construct();
        @ session_start();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library(array('session','form_validation'));
        $this->load->model("model_roles");
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
    }
      

public function index()
    {
        //obtenemos todos los usuarios
        $roles = $this->model_roles->get_roles();
        //creamos una variable usuarios para pasarle a la vista
        $data['roles'] = $roles;
        //cargamos nuestra vista
        $this->load->view('header/header');
        $this->load->view('form/gestor_roles',$data);
        $this->load->view('footer');
    
    }


      public function editar($id_rol=0)
    {
        //verificamos si existe el id
        $respuesta = $this->model_roles->get_rol($id_rol);
        //si nos retorna FALSE le mostramos la pag 404
        if($respuesta==false)
        show_404();
        else
        {
            //Si existe el post para editar
            if($this->input->post('post') && $this->input->post('post')==1)
            {
            $this->form_validation->set_rules('id_opcion', 'Codigo Opcion', 'required|trim|xss_clean');
            $this->form_validation->set_rules('opcion', 'Opcion', 'required|trim|trim|xss_clean');
             
            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
            $this->form_validation->set_message('alpha','El Campo <b>%s</b> Solo Acepta caracteres alfabeticos');
                if ($this->form_validation->run() == TRUE)
                {
                $nombre_sucursal    = $this->input->post('nombre_sucursal');
                $telefono_sucursal  = $this->input->post('telefono_sucursal');
                $direccion_sucursal = $this->input->post('direccion_sucursal');
                $departamento       = $this->input->post('departamento');
                $this->crud_model->actualizar_sucursal($id_sucursal,$nombre_sucursal,$telefono_sucursal,$direccion_sucursal,$departamento);
                    //redireccionamos al controlador CRUD
                    redirect('crud');               
                }
            }
            //devolvemos los datos del usuario
            $data['dato'] = $respuesta;
            //cargamos la vista
            $this->load->view('header/header');
            $this->load->view('form/editar_sucursal',$data);
            $this->load->view('footer');
        }
    }
     

    }