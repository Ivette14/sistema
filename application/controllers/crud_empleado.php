<?php 
    class Crud_empleado extends CI_Controller
{
    public function __construct()
    {
        //Cargamos El Constructor
parent::__construct();
        @ session_start();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library(array('session','form_validation'));
        $this->load->model("crud_model_empleado");
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
    }
     
    public function index()
    {
        //obtenemos todos los empleado
        $empleados = $this->crud_model_empleado->tabla();        
        //creamos una variable empleados para pasarle a la vista
        $data['empleados'] = $empleados;
        //cargamos nuestra vista
        $this->load->view('header/header');
        $this->load->view('form/frmempleado',$data);
        $this->load->view('footer');
    
    }

    public function agregar()
    {        
         //Si Existe Post y es igual a uno
        if($this->input->post('post') && $this->input->post('post')==1)
        {
            $this->form_validation->set_rules('codigo_empleado', 'Codigo de Empleado', 'required|trim|xss_clean');           
            $this->form_validation->set_rules('nombre_empleado', '  Nombre de Empleado', 'required|trim|xss_clean'); 
            $this->form_validation->set_rules('direccion_empleado', 'Direccion', 'required|trim|xss_clean');
            $this->form_validation->set_rules('telefono_empleado', 'Telefono', 'required|trim|xss_clean');          
            $this->form_validation->set_rules('email_empleado', 'Email', 'required|valid_email');             

            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
            $this->form_validation->set_message('valid_email','El Campo <b>%s</b> Solo acepta formato de correo');
            $this->form_validation->set_message('alpha','El Campo <b>%s</b> Solo Acepta caracteres alfabeticos');
            if ($this->form_validation->run() == TRUE)
            {
                $codigo_empleado    = $this->input->post('codigo_empleado');             
                $nombre_empleado    = $this->input->post('nombre_empleado');
                $direccion_empleado = $this->input->post('direccion_empleado');
                $telefono_empleado  = $this->input->post('telefono_empleado');                               
                $email_empleado     = $this->input->post('email_empleado');
                $this->crud_model_empleado->agregar_empleado($id_empleado,$codigo_empleado, $nombre_empleado, $direccion_empleado, $telefono_empleado, $email_empleado);

                redirect('crud_empleado');               
            }
        }

         //cargamos nuestra vista
        $this->load->view('header/header');
        $this->load->view('form/a_empleado');
        $this->load->view('footer');
    

    }
     
    public function editar($id_empleado=0)
    {
        //verificamos si existe el id
        $respuesta = $this->crud_model_empleado->get_empleado($id_empleado);        
        //si nos retorna FALSE le mostramos la pag 404
        if($respuesta==false)
        show_404();
        else
        {
            //Si existe el post para editar
            if($this->input->post('post') && $this->input->post('post')==1)
            {
            $this->form_validation->set_rules('codigo_empleado', 'Codigo de Empleado', 'required|trim|xss_clean');           
            $this->form_validation->set_rules('nombre_empleado', '  Nombre de Empleado', 'required|trim|xss_clean');           
            $this->form_validation->set_rules('direccion_empleado', 'Direccion', 'required|trim|xss_clean');
            $this->form_validation->set_rules('telefono_empleado', 'Telefono', 'required|trim|xss_clean');
             
            $this->form_validation->set_rules('email_empleado', 'Email', 'required|valid_email');
             
            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
            $this->form_validation->set_message('valid_email','El Campo <b>%s</b> Solo acepta formato de correo');
            $this->form_validation->set_message('alpha','El Campo <b>%s</b> Solo Acepta caracteres alfabeticos');
            if ($this->form_validation->run() == TRUE)
            {
                $codigo_empleado    = $this->input->post('codigo_empleado');
                $nombre_empleado    = $this->input->post('nombre_empleado');
                $direccion_empleado = $this->input->post('direccion_empleado');
                $telefono_empleado  = $this->input->post('telefono_empleado');                               
                $email_empleado     = $this->input->post('email_empleado');
                $this->crud_model_empleado->actualizar_empleado($id_empleado, $codigo_empleado, $nombre_empleado, $direccion_empleado, $telefono_empleado, $email_empleado);
 
                redirect('crud_empleado');               
            }

            }
            //devolvemos los datos del usuario
            $data['dato'] = $respuesta;
            //cargamos la vista
            $this->load->view('header/header');
            $this->load->view('form/editar_empleado',$data);
            $this->load->view('footer');
        }
    }
     
    public function eliminar($id_empleado=0)
    {
        //verificamos si existe el id
        $respuesta = $this->crud_model_empleado->get_empleado($id_empleado);
        //si nos retorna FALSE mostramos la pag 404.
        if($respuesta==false)
        show_404();
        else
        {
            //si existe eliminamos el usuario
            $this->crud_model_empleado->eliminar_empleado($id_empleado);
            //redireccionamos al controlador CRUD
            redirect('crud_empleado'); 
        }
    }

        public function pdfempleado()
    {        
        require('http://localhost:8080/JavaBridge/java/Java.inc');
        $dirInforme ='C:/xampp/htdocs/sistema/application/views/reportes'; 
        $Informe = "ReporteEmpleado"; 
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