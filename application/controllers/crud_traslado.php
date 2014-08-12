<?php 
    class Crud_traslado extends CI_Controller
{
    public function __construct()
    {
        //Cargamos El Constructor
parent::__construct();
        @ session_start();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library(array('session','form_validation'));
        $this->load->model("crud_model_traslado");
        $this->load->helper(array('form'));
            $this->load->model("crud_model_menu");
        $this->load->library('form_validation');
    }
     
    public function index()
    {   $menus = $this->crud_model_menu->menu($usu);
        //creamos una variable usuarios para pasarle a la vista
     $data1['menus'] =   $menus;
        //obtenemos todos los empleado
        $traslados = $this->crud_model_traslado->tabla();       
        //creamos una variable empleados para pasarle a la vista
        $data['traslados'] = $traslados;
        //cargamos nuestra vista
        $this->load->view('header/header', $data1);
        $this->load->view('form/frmtraslado',$data);
        $this->load->view('footer');
    
    }

    public function agregar()
    {
        $datas['sucursal'] = $this->crud_model_traslado->sucur();
        $datas['empleado'] = $this->crud_model_traslado->empleado();
        $datos['activofijo'] = $this->crud_model_traslado->activo();
        //Si Existe Post y es igual a uno
        if($this->input->post('post') && $this->input->post('post')==1)
        {
            $this->form_validation->set_rules('codigo_traslado', 'Codigo de Traslado de Activo', 'required|trim|xss_clean');
            $this->form_validation->set_rules('id_activofijo', 'Codigo Activo', 'required|trim|xss_clean');
            $this->form_validation->set_rules('motivo_traslado', 'Motivo de Traslado', 'required|trim|xss_clean');
            $this->form_validation->set_rules('fecha_traslado', 'Fecha de Traslado', 'required|trim|xss_clean');
            $this->form_validation->set_rules('id_sucursal', 'Emisor de Traslado', 'required|trim|xss_clean');
            

            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
            if ($this->form_validation->run() == TRUE)
            {
                $codigo_traslado    = $this->input->post('codigo_traslado');
                $id_activofijo      = $this->input->post('id_activofijo');
                $motivo_traslado    = $this->input->post('motivo_traslado');
                $fecha_traslado     = $this->input->post('fecha_traslado');                
                $id_sucursal        = $this->input->post('id_sucursal');
                $id_empleado        = $this->input->post('id_empleado');
                
                $this->crud_model_traslado->agregar_traslado($codigo_traslado, $id_activofijo, $motivo_traslado, $fecha_traslado, $id_sucursal,$id_empleado);

                redirect('crud_traslado');               
            }
        }

         //cargamos nuestra vista
        $this->load->view('header/header',$datos);
        $this->load->view('form/a_traslado',$datas);
        $this->load->view('footer');
    

    }
     
    public function editar($id_traslado_activo=0)
    {
        //verificamos si existe el id
        $datas['sucursal'] = $this->crud_model_traslado->sucur();
        $datas['empleado'] = $this->crud_model_traslado->empleado();
        $datas['activofijo'] = $this->crud_model_traslado->activo();
        $respuesta = $this->crud_model_traslado->get_traslado($id_traslado_activo);        
        //si nos retorna FALSE le mostramos la pag 404
        if($respuesta==false)
        show_404();
        else
        {
            //Si existe el post para editar
            if($this->input->post('post') && $this->input->post('post')==1)
            {
            $this->form_validation->set_rules('codigo_traslado', 'Codigo de Traslado de Activo', 'required|trim|xss_clean');
            $this->form_validation->set_rules('id_activofijo', 'Codigo Activo', 'required|trim|xss_clean');
            $this->form_validation->set_rules('motivo_traslado', 'Motivo de Traslado', 'required|trim|xss_clean');
            $this->form_validation->set_rules('fecha_traslado', 'Fecha de Traslado', 'required|trim|xss_clean');
            $this->form_validation->set_rules('id_sucursal', 'Emisor de Traslado', 'required|trim|xss_clean');
            

            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
            if ($this->form_validation->run() == TRUE)
            {
                $codigo_traslado    = $this->input->post('codigo_traslado');
                $id_activofijo      = $this->input->post('id_activofijo');
                $motivo_traslado    = $this->input->post('motivo_traslado');
                $fecha_traslado     = $this->input->post('fecha_traslado');                
                $id_sucursal        = $this->input->post('id_sucursal');
                $id_empleado        = $this->input->post('id_empleado');
                
                $this->crud_model_traslado->actualizar_traslado($id_traslado_activo, $codigo_traslado, $id_activofijo, $motivo_traslado, $fecha_traslado, $id_sucursal,$id_empleado);

                redirect('crud_traslado');                
                }
            }
            //devolvemos los datos del usuario
            $data['dato'] = $respuesta;
            //cargamos la vista
            $this->load->view('header/header',$data);
            $this->load->view('form/editar_traslado',$datas);
            $this->load->view('footer');
        }
    }
     
    public function eliminar($id_traslado_activo=0)
    {
        //verificamos si existe el id
        $respuesta = $this->crud_model_traslado->get_traslado($id_traslado_activo);
        //si nos retorna FALSE mostramos la pag 404.
        if($respuesta==false)
        show_404();
        else
        {
            //si existe eliminamos el usuario
            $this->crud_model_traslado->eliminar_traslado($id_traslado_activo);
            //redireccionamos al controlador CRUD
            redirect('crud_traslado'); 
        }
    }

    public function pdftraslado()
    {        
        require('http://localhost:8080/JavaBridge/java/Java.inc');
        $dirInforme ='C:/xampp/htdocs/sistema/application/views/reportes'; 
        $Informe = "ReporteTraslados" ; 
        $jrDirLib = "C:/Tomcat 7.0/webapps/JavaBridge/WEB-INF/lib"; 
 
        $handle = @opendir($jrDirLib); 
        try 
    { 
 
        $Conexion=new java("org.altic.jasperReports.JdbcConnection"); 
        //Driver MySql 
        $Conexion->setDriver("com.mysql.jdbc.Driver"); 
        //Conexion a la Base de Datos 
        $Conexion->setConnectString("jdbc:mysql://localhost/sys_activofijo"); 
        //Usuario 
        $Conexion->setUser("root"); 
        //Password 
        $Conexion->setPassword(""); 
        //Compilacion del Reporte 
        $JspCompil=new JavaClass('net.sf.jasperreports.engine.JasperCompileManager'); 
        $Reporte=$JspCompil->compileReport($dirInforme.'\\'.$Informe.".jrxml"); 
 
        $JspCompil=new JavaClass('net.sf.jasperreports.engine.JasperFillManager'); 
        $Imprime=$JspCompil->fillReport($Reporte, new java('java.util.HashMap'),   
        $Conexion->getConnection() 
        ); 
 
        //Exportacion del reporte
  
        $JspExport=new JavaClass('net.sf.jasperreports.engine.JasperExportManager');
        $JspExport->exportReportToPdfFile($Imprime,$dirInforme.$Informe.".pdf");
        if (file_exists($dirInforme.$Informe.".pdf"))
        {
            header('Content-disposition:attachment;filename="'.$Informe.'pdf"');
            header('Content-Type:application/pdf');
            header('Content-Transfer-Enconding:binary');
            header('Content-Length:'.@filesize($dirInforme.$Informe.".pdf"));
            header('Pragma:no-cache');
            header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
            header('Expires:0');set_time_limit(0);@readfile($dirInforme.$Informe.".pdf") or die("Ocurrio un Problema");
        }   
    }

        catch (JavaException $ex)
        {
            $trace = new Java('java.io.ByteArrayOutputStream');
            $ex->printStackTrace(new Java('java.io.PrintStream', $trace));
            print nl2br("java stack trace: $trace\n");return false;
        }
    }

}
?>