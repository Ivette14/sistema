<?php 
    class Crud_cuenta extends CI_Controller
{
    public function __construct()
    {
        //Cargamos El Constructor
parent::__construct();
        @ session_start();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library(array('session','form_validation'));
        $this->load->model("crud_model_cuenta");
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
         $this->load->model("crud_model_menu");
    }
     
    public function index()
    {
         if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
           $data['usuario']=$_SESSION['my_usuario']; 
        //obtenemos todos los usuarios
        $cuenta = $this->crud_model_cuenta->get_cuentas();
        //creamos una variable usuarios para pasarle a la vista
        $data['cuenta'] = $cuenta;
        //cargamos nuestra vista
        $this->load->view('header/header', $data);
        $this->load->view('form/frmcuentas',$data);
        $this->load->view('footer');
    
    }

    public function agregar()
    {
         if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
           $data['usuario']=$_SESSION['my_usuario']; 
         if($this->input->post('post') && $this->input->post('post')==1)
         //Si Existe Post y es igual a uno
            {
            $this->form_validation->set_rules('nombre_cuenta', 'Nombre Cuenta', 'required|trim|xss_clean');
            $this->form_validation->set_rules('vida_util', 'Vida Util', 'required|numeric|trim|xss_clean');
             
            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
            if ($this->form_validation->run() == TRUE)
            {
                $id_cuentacontable = $this->input->post('id_cuentacontable');  
                $nombre_cuenta = $this->input->post('nombre_cuenta');
                $vida_util = $this->input->post('vida_util');
                $this->crud_model_cuenta->agregar_cuenta($id_cuentacontable,$nombre_cuenta,$vida_util);               
         redirect('crud_cuenta');               
            }
        }
           //cargamos nuestra vista
        $this->load->view('header/header', $data);
        $this->load->view('form/a_cuentas');
        $this->load->view('footer');
      }  

    public function editar($id_cuentacontable=0)
    {
         if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
           $data['usuario']=$_SESSION['my_usuario']; 
        //verificamos si existe el id
        $respuesta = $this->crud_model_cuenta->get_cuenta($id_cuentacontable);
        //si nos retorna FALSE le mostramos la pag 404
        if($respuesta==false)
        show_404();
        else
        {
            //Si existe el post para editar
            if($this->input->post('post') && $this->input->post('post')==1)
            {
            $this->form_validation->set_rules('nombre_cuenta', 'Nombre Cuenta', 'required|trim|xss_clean');
            $this->form_validation->set_rules('vida_util', 'Vida Util', 'required|numeric|trim|xss_clean');
            
             
            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
                if ($this->form_validation->run() == TRUE)
                {
                $nombre_cuenta = $this->input->post('nombre_cuenta');
                $vida_util = $this->input->post('vida_util');
                $this->crud_model_cuenta->actualizar_cuenta($id_cuentacontable,$nombre_cuenta,$vida_util);
                    //redireccionamos al controlador CRUD
                    redirect('crud_cuenta');               
                }
            }
            //devolvemos los datos del usuario
            $data['dato'] = $respuesta;
            //cargamos la vista
            $this->load->view('header/header', $data);
            $this->load->view('form/editar_cuenta',$data);
            $this->load->view('footer');
        }
    }
     
    public function eliminar($id_cuentacontable=0)
    {
         if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
           $data['usuario']=$_SESSION['my_usuario']; 
        //verificamos si existe el id
        $respuesta = $this->crud_model_cuenta->get_cuentas($id_cuentacontable);
        //si nos retorna FALSE mostramos la pag 404.
        if($respuesta==false)
        show_404();
        else
        {
            //si existe eliminamos el usuario
            $this->crud_model_cuenta->eliminar_cuenta($id_cuentacontable);
            //redireccionamos al controlador CRUD
            redirect('crud_cuenta'); 
        }
    }

    public function pdfcuentas()
    {        
        require('http://localhost:8080/JavaBridge/java/Java.inc');
        $dirInforme ='C:/xampp/htdocs/sistema/application/views/reportes'; 
        $Informe = "ReporteCuentas"; 
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