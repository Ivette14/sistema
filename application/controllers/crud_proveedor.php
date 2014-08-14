<?php 
    class Crud_proveedor extends CI_Controller
{
    public function __construct()
    {
        //Cargamos El Constructor
parent::__construct();
        @ session_start();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library(array('session','form_validation'));
        $this->load->model("crud_model_proveedor");
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
    }
     
    public function index()
    {
        //obtenemos todos los usuarios
        $proveedor = $this->crud_model_proveedor->get_proveedores();
        //creamos una variable usuarios para pasarle a la vista
        $data['proveedor'] = $proveedor;
        //cargamos nuestra vista
        $this->load->view('header/header');
        $this->load->view('form/frmproveedor',$data);
        $this->load->view('footer');
    
    }
    public function nuevo()
    {

 $this->load->view('header/header');
        $this->load->view('form/a_proveedor');
        $this->load->view('footer');
    
    }

    public function agregar()
    {
         
        $data = array( 
            'nombre_provee' => $this->input->post('nombre_provee', TRUE),
            'direccion_provee' => $this->input->post('direccion_provee', TRUE),
            'telefono_provee' => $this->input->post('telefono_provee', TRUE),
            'email_provee' => $this->input->post('email_provee', TRUE),
            'nit' => $this->input->post('nit', TRUE),

        );
        
        $this->crud_model_proveedor->agregar_proveedor($data);
             $data['type']      =true; 
                $data['message']   ='Se registro un Nuevo Poveedor.'; 
        redirect('crud_proveedor'); 
            }


         //cargamos nuestra vista
    
     
    public function editar($id_proveedor=0)
    {
         //verificamos si existe el id
        $respuesta = $this->crud_model_proveedor->get_proveedor($id_proveedor);
        //si nos retorna FALSE le mostramos la pag 404
        if($respuesta==false)
        show_404();
        else
        {
            //Si existe el post para editar
            if($this->input->post('post') && $this->input->post('post')==1)
            {
            $this->form_validation->set_rules('nombre_provee', 'Nombre proveedor', 'required|trim|xss_clean');
            $this->form_validation->set_rules('direccion_provee', 'Direccion proveedor', 'required|trim|xss_clean');
            $this->form_validation->set_rules('telefono_provee', 'Telefono Poveedor', 'required|trim|xss_clean');
            $this->form_validation->set_rules('email_provee', 'Email proveedor', 'required|trim|xss_clean');
            $this->form_validation->set_rules('nit', 'Nit Proveedor', 'required|trim|xss_clean');
             
            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
                if ($this->form_validation->run() == TRUE)
                {
                $nombre_provee = $this->input->post('nombre_provee');
                $direccion_provee= $this->input->post('direccion_provee');
                $telefono_provee= $this->input->post('telefono_provee');
                $email_provee= $this->input->post('email_provee');
                $nit= $this->input->post('nit');
                $this->crud_model_proveedor->actualizar_proveedor($id_proveedor,$nombre_provee,$direccion_provee,$telefono_provee,$email_provee,$nit);
                    //redireccionamos al controlador CRUD
                    redirect('crud_proveedor');               
                }
            }
            //devolvemos los datos del usuario
            $data['dato'] = $respuesta;
            //cargamos la vista
            $this->load->view('header/header');
            $this->load->view('form/editar_proveedor',$data);
            $this->load->view('footer');
        }
    }
   
     
    public function eliminar($id_proveedor=0)
    {
        //verificamos si existe el id
        $respuesta = $this->crud_model_proveedor->get_proveedor($id_proveedor);
        //si nos retorna FALSE mostramos la pag 404.
        if($respuesta==false)
        show_404();
        else
        {     //si existe eliminamos el usuario
            $this->crud_model_proveedor->eliminar_proveedor($id_proveedor);
            //redireccionamos al controlador CRUD
            redirect('crud_proveedor'); 
        }
    }

    public function pdfproveedor()
    {        
        require('http://localhost:8080/JavaBridge/java/Java.inc');
        $dirInforme ='C:/xampp/htdocs/sistema/application/views/reportes'; 
        $Informe = "ReporteProveedor"; 
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
