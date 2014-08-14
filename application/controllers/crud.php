<?php 
    class Crud extends CI_Controller
{
    public function __construct()
    {
        //Cargamos El Constructor
parent::__construct();
        @ session_start();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library(array('session','form_validation'));
        $this->load->model("crud_model");
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
    }
     
    public function index()
    {
        //obtenemos todos los usuarios
        $sucursales = $this->crud_model->get_sucursales();
        //creamos una variable usuarios para pasarle a la vista
        $data['sucursales'] = $sucursales;
        //cargamos nuestra vista
        $this->load->view('header/header');
        $this->load->view('form/frmsucursal',$data);
        $this->load->view('footer');
    
    }

    public function agregar()
    {
         //Si Existe Post y es igual a uno
        if($this->input->post('post') && $this->input->post('post')==1)
        {
            $this->form_validation->set_rules('nombre_sucursal', 'Nombre Sucursal', 'required|alpha|trim|xss_clean');
            $this->form_validation->set_rules('telefono_sucursal', 'Telefono', 'required|numeric|trim|xss_clean');
            $this->form_validation->set_rules('direccion_sucursal', 'Direccion', 'required|trim|xss_clean');
            $this->form_validation->set_rules('departamento', 'Departamento', 'required|trim|xss_clean');
             
            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
            $this->form_validation->set_message('alpha','El Campo <b>%s</b> Solo Acepta caracteres alfabeticos');
            if ($this->form_validation->run() == TRUE)
            {
                $nombre_sucursal = $this->input->post('nombre_sucursal');
                $telefono_sucursal = $this->input->post('telefono_sucursal');
                $direccion_sucursal = $this->input->post('direccion_sucursal');
                $departamento = $this->input->post('departamento');
                $this->crud_model->agregar_sucursal($nombre_sucursal,$telefono_sucursal,$direccion_sucursal,$departamento);


                redirect('crud');               
            }
        }

         //cargamos nuestra vista
        $this->load->view('header/header');
        $this->load->view('form/a_sucursal');
        $this->load->view('footer');
    

    }
     
    public function editar($id_sucursal=0)
    {
        //verificamos si existe el id
        $respuesta = $this->crud_model->get_sucursal($id_sucursal);
        //si nos retorna FALSE le mostramos la pag 404
        if($respuesta==false)
        show_404();
        else
        {
            //Si existe el post para editar
            if($this->input->post('post') && $this->input->post('post')==1)
            {
            $this->form_validation->set_rules('nombre_sucursal', 'Nombre_sucursal', 'required|alpha|trim|xss_clean');
            $this->form_validation->set_rules('telefono_sucursal', 'Telefono_sucursal', 'required|alpha|numeric|trim|xss_clean');
            $this->form_validation->set_rules('direccion_sucursal', 'Direccion_sucursal', 'required|trim|xss_clean');
            $this->form_validation->set_rules('departamento', 'Departamento', 'required|trim|xss_clean');
             
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
     
    public function eliminar($id_sucursal=0)
    {
        //verificamos si existe el id
        $respuesta = $this->crud_model->get_sucursal($id_sucursal);
        //si nos retorna FALSE mostramos la pag 404.
        if($respuesta==false)
        show_404();
        else
        {
            //si existe eliminamos el usuario
            $this->crud_model->eliminar_sucursal($id_sucursal);
            //redireccionamos al controlador CRUD
            redirect('crud'); 
        }
    }

        public function pdfsucursal()
    {        
        require('http://localhost:8080/JavaBridge/java/Java.inc');
        $dirInforme ='C:/xampp/htdocs/sistema/application/views/reportes'; 
        $Informe = "ReporteSucursal"; 
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