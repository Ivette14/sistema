<?php 
    class Crud_baja extends CI_Controller
{
    public function __construct()
    {
        //Cargamos El Constructor
parent::__construct();
        @ session_start();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library(array('session','form_validation'));
        $this->load->model("crud_model_baja");
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
    }
     
    public function index()
    {
        //obtenemos todos los usuarios
        $activo = $this->crud_model_baja->get_bajas();
        //creamos una variable usuarios para pasarle a la vista
        $data['activo'] = $activo;
        //cargamos nuestra vista
        $this->load->view('header/header');
        $this->load->view('form/frmbaja',$data);
        $this->load->view('footer');
    
    }
   
      


    public function editar($id_activofijo=0)
    {
        //verificamos si existe el id
        $respuesta = $this->crud_model_baja->get_act($id_activofijo);

        //si nos retorna FALSE le mostramos la pag 404
        if($respuesta==false)
        show_404();
        else
        {
            //Si existe el post para editar
            if($this->input->post('post') && $this->input->post('post')==1)
            {
            $this->form_validation->set_rules('activado', 'Activado', 'required|numeric|trim|xss_clean');
            
             
                $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
                if ($this->form_validation->run() == TRUE)
                {
                $id_activofijo = $this->input->post('id_activofijo');
                $activado = $this->input->post('activado');
                $motivo_baja = $this->input->post('motivo_baja');
                $this->crud_model_baja->editar($id_activofijo,$activado,$motivo_baja);
                    //redireccionamos al controlador CRUD
                    redirect('crud_baja');               
                }
            }
            //devolvemos los datos del usuario
            $data['dato'] = $respuesta;
            //cargamos la vista
            $this->load->view('header/header');
            $this->load->view('form/editar_baja',$data);
            $this->load->view('footer');
        }
    }

    
}

?>