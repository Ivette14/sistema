<?php 
    class Crud_activo extends CI_Controller
{
    public function __construct()
    {
        //Cargamos El Constructor
parent::__construct();
        @ session_start();
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('pagination');
        $this->load->library(array('session','form_validation'));
        $this->load->model("crud_model_activo");
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
      
    }
  
public function index_nuevo()
{       

        $this->load->view('header/header');
        $this->load->view('form/a_activofijo');
        $this->load->view('footer');;
        
}
public function activar()
{
 
   $activos= $this->crud_model_activo->get_activar_activos();
        //creamos una variable usuarios para pasarle a la vista
        $data['activo'] =   $activos;
        //creamos una variable usuarios para pasarle a la vista

        //cargamos nuestra vista
        $this->load->view('header/header');
       // $this->load->view('form/prueva');    
        $this->load->view('form/frmactivofijo_activar',$data);
       $this->load->view('footer');
    
    }

  
    public function index()
    {
        //obtenemos todos los activos
                
                        //obtenemos todos los usuarios
        $activos= $this->crud_model_activo->get_activos();
        //creamos una variable usuarios para pasarle a la vista
        $data['activo'] =   $activos;
        //creamos una variable usuarios para pasarle a la vista

        //cargamos nuestra vista
        $this->load->view('header/header');
       // $this->load->view('form/prueva');    
        $this->load->view('form/frmactivofijo',$data);
       $this->load->view('footer');
    
    }



    public function nuevo()
    {

 $this->load->view('header/header');
        $this->load->view('form/a_activo');
        $this->load->view('footer');
    
    }
         public function agregar()
 
    { 

  $datas['cuenta'] = $this->crud_model_activo->cuenta();
  $datas['proveedor'] = $this->crud_model_activo->proveedor();
   $datas['sucursal'] = $this->crud_model_activo->sucursal();
  $datas['area'] = $this->crud_model_activo->area();
     $datas['empleado'] = $this->crud_model_activo->empleado();
 if($this->input->post('post') && $this->input->post('post')==1)
        {
            $this->form_validation->set_rules('id_activofijo', 'Campo Activo fijo',           'required|trim|xss_clean');
            $this->form_validation->set_rules('id_cuentacontable', 'Campo Cuenta',   'required|trim|xss_clean');  
            $this->form_validation->set_rules('id_sucursal', 'Campo Sucursal',              'required|trim|xss_clean');
            $this->form_validation->set_rules('id_proveedor', 'Campo Proveedor',             'required|trim|xss_clean');
            $this->form_validation->set_rules('nombre_activo_fijo', ' Campo Nombre activo fijo', 'required|trim|xss_clean');
            $this->form_validation->set_rules('valor_original', ' Campo valor  original',           'numeric|trim|xss_clean');
            $this->form_validation->set_rules('fecha_compra', 'Campo fecha compra',             'required|trim|xss_clean');
            $this->form_validation->set_rules('fecha_ingreso', 'Campo fecha ingreso',           'required|trim|xss_clean');
            $this->form_validation->set_rules('descripcion', 'Campo descripcion',               'required|trim|xss_clean');
            $this->form_validation->set_rules('importe_depreciable', 'Campo importe_depreciable','required|trim|xss_clean'); 
            $this->form_validation->set_rules('vida_util', 'Campo vida_util',                    'required|trim|xss_clean');
            $this->form_validation->set_rules('varlor_residual', 'Campo varlor residual',        'numeric|trim|xss_clean');
            $this->form_validation->set_rules('tipo_valor', 'Campo tipo valor',                            'required|trim|xss_clean');
            $this->form_validation->set_rules('cuota_anual', 'Campo cuota anual',                          'numeric|trim|xss_clean');
            $this->form_validation->set_rules('cuota_mensual', 'Campo cuota mensual',                      'numeric|trim|xss_clean');
             


            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
            if ($this->form_validation->run() == TRUE)
            {



                $id_activofijo = $this->input->post('id_activofijo');
                $id_cuentacontable = $this->input->post('id_cuentacontable');
          
         
                $id_sucursal = $this->input->post('id_sucursal');
                $id_empleado = $this->input->post('id_empleado');
                $id_proveedor= $this->input->post('id_proveedor');
                $nombre_activo_fijo = $this->input->post('nombre_activo_fijo');
               
                $valor_original = $this->input->post('valor_original');
                $fecha_compra = $this->input->post('fecha_compra');
                $fecha_ingreso = $this->input->post('fecha_ingreso');
         
                $descripcion = $this->input->post('descripcion');
                $importe_depreciable = $this->input->post('importe_depreciable');
                $vida_util = $this->input->post('vida_util');
                $valor_residual = $this->input->post('valor_residual');
            
                $tipo_valor = $this->input->post('tipo_valor');
                $cuota_anual = $this->input->post('cuota_anual');
                $cuota_mensual = $this->input->post('cuota_mensual');
                $activado = 0;
                $this->crud_model_activo->agregar_activo($id_activofijo,$id_cuentacontable, 
                    $id_area, $id_sucursal, $id_empleado, $id_proveedor,$nombre_activo_fijo,$valor_original,
                    $fecha_compra, $fecha_ingreso,$descripcion,$importe_depreciable, $vida_util,
                    $valor_residual, $tipo_valor,$cuota_anual,$cuota_mensual, $activado);


                redirect('Crud_activo');               
            
            
            }
        }
        $this->load->view('header/header');
        $this->load->view('form/a_activofijo', $datas);
        $this->load->view('footer');
    }

          

    public function activar_activo($id_activofijo=0)
    {

         //verificamos si existe el id
        $datas['area'] = $this->crud_model_activo->area();
        $datas['empleado'] = $this->crud_model_activo->empleado();
        $respuesta = $this->crud_model_activo->get_activo($id_activofijo);
        //si nos retorna FALSE le mostramos la pag 404
        if($respuesta==false)
        show_404();
        else
        {
            //Si existe el post para editar
            if($this->input->post('post') && $this->input->post('post')==1)
            {

            $this->form_validation->set_rules('id_area', 'Nombre Area', 'required|trim|xss_clean');
            $this->form_validation->set_rules('id_empleado', 'Nombre Empleado', 'required|trim|xss_clean');
             
            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
                if ($this->form_validation->run() == TRUE)
                {
                $id_activofijo     = $this->input->post('id_activofijo');
                $id_area           = $this->input->post('id_area');
                $id_empleado       = $this->input->post('id_empleado');
                $id_cuentacontable = $this->input->post('id_cuentacontable');
       
        $timestamp = now();
        $timezone = 'UM8';
        $daylight_saving = FALSE;

        $now = gmt_to_local($timestamp, $timezone, $daylight_saving);
        $datestring = "%Y-%m-%d %h:%i:%s";
        $fecha_inicio_uso = $this->now = mdate($datestring, $now);
        $activado = 1;
        $this->crud_model_activo->alta_activo($id_activofijo,$id_area,$id_empleado,$fecha_inicio_uso,$activado,$id_cuentacontable);
                    //redireccionamos al controlador CRUD
                    redirect('crud_activo/activar');               
                }
            }
            //devolvemos los datos del usuario
            $data['dato'] = $respuesta;
            //cargamos la vista
            $this->load->view('header/header',$data);
            $this->load->view('form/alta_activo',$datas);
            $this->load->view('footer');
        }
    }


     public function ver_activo($id_activofijo=0)
    {
        $activo=$this->crud_model_activo->get_activo($id_activofijo);
        $data['dato'] = $activo;
    

        
            //cargamos la vista
            $this->load->view('header/header');
            $this->load->view('form/veractivo',$data);
            $this->load->view('footer');
    }


}