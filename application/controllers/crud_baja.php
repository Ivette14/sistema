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
           $this->load->model("crud_model_menu");
    }
     
    public function index()
    {
         if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
           $data['usuario']=$_SESSION['my_usuario'];
        //obtenemos todos los usuarios
        $activo = $this->crud_model_baja->get_bajas();
        //creamos una variable usuarios para pasarle a la vista
        $data['activo'] = $activo;
        //cargamos nuestra vista
        $this->load->view('header/header', $data);
        $this->load->view('form/frmbaja',$data);
        $this->load->view('footer');
    
    }
   
      


    public function editar($id_activofijo=0)
    {
        if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
          $data['usuario']=$_SESSION['my_usuario'];
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
            $this->form_validation->set_rules('activado', 'Activado', 'required|trim|xss_clean');
              $this->form_validation->set_rules('id_activofijo', 'Codigo activo fijo', 'required|trim|xss_clean'); 
          $this->form_validation->set_rules('motivo_baja', 'Activado', 'required|trim|xss_clean');  
             
                $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
                      $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
                if ($this->form_validation->run() == TRUE)
                {
                $id_activofijo = $this->input->post('id_activofijo');
                $activado = 2;
                $motivo_baja = $this->input->post('motivo_baja');
                $this->crud_model_baja->editar($id_activofijo,$activado,$motivo_baja);
                    //redireccionamos al controlador CRUD
                    redirect('crud_baja');               
                }
            }
            //devolvemos los datos del usuario
            $data['dato'] = $respuesta;
            //cargamos la vista
            $this->load->view('header/header', $data);
            $this->load->view('form/editar_baja',$data);
            $this->load->view('footer');
        }
    }

    public function pdfbaja()
    {        
        require('http://localhost:8080/JavaBridge/java/Java.inc');
        $dirInforme ='C:/xampp/htdocs/sistema/application/views/reportes'; 
        $Informe = "ReporteActivoBaja"; 
        $jrDirLib = "C:/Tomcat 7.0/webapps/JavaBridge/WEB-INF/lib"; 
 
        $handle = @opendir($jrDirLib); 
        try 
    { 
 
        $Conexion=new java("org.altic.jasperReports.JdbcConnection"); 
        //Driver MySql 
        $Conexion->setDriver("org.gjt.mm.mysql.Driver"); 
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
            header('Content-disposition:attachment;filename="'.$Informe.'"');
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