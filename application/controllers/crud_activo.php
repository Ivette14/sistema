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
        $this->load->model("crud_model_menu");
      
    }

public function index_nuevo()
{      
 if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 

 $activos= $this->crud_model_activo->get_activar_activos();

        //creamos una variable usuarios para pasarle a la vista
  $data['usuario']=$_SESSION['my_usuario']; 
        $data['activo'] =   $activos;
        //creamos una variable usuarios para pasarle a la vista

        //cargamos nuestra vista
        $this->load->view('header/header',$data);
        $this->load->view('form/a_activofijo');
        $this->load->view('footer');
        
}
public  $prueva;
public function agregar_a()
    {

        if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
  $data['usuario']=$_SESSION['my_usuario']; 
  $data['cuenta'] = $this->crud_model_activo->cuenta();
  $data['proveedor'] = $this->crud_model_activo->proveedor();
  $data['sucursal'] = $this->crud_model_activo->sucursal();

           if($this->input->post('post') && $this->input->post('post')==1)
        {
            $this->form_validation->set_rules('id_activofijo', 'Campo Activo fijo',           'required|trim|xss_clean');
            $this->form_validation->set_rules('id_cuentacontable', 'Campo Cuenta',   'required|trim|xss_clean');  
            $this->form_validation->set_rules('vida_util', 'Campo vida_util',   'required|trim|xss_clean');  
            $this->form_validation->set_rules('id_sucursal', 'Campo Sucursal',              'required|trim|xss_clean');
            $this->form_validation->set_rules('id_proveedor', 'Campo Proveedor',             'required|trim|xss_clean');
            $this->form_validation->set_rules('nombre_activo_fijo', ' Campo Nombre activo fijo', 'required|trim|xss_clean');
            $this->form_validation->set_rules('valor_original', ' Campo valor  original',           'numeric|trim|xss_clean');
            $this->form_validation->set_rules('fecha_compra', 'Campo fecha compra',             'required|trim|xss_clean');
            $this->form_validation->set_rules('fecha_ingreso', 'Campo fecha ingreso',           'required|trim|xss_clean');
            $this->form_validation->set_rules('descripcion', 'Campo descripcion',              'required|trim|xss_clean');   
           
            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('numeric','El Campo <b>%s</b> Solo Acepta Números');
            if ($this->form_validation->run() == TRUE)
            {
                $prueva = $this->input->post('id_activofijo');
                 $prueva = $this->input->post('vida_util');
                 $prueva = $this->input->post('id_cuentacontable');
                $prueva = $this->input->post('id_sucursal');
                 $prueva = $this->input->post('id_empleado');
                 $prueva= $this->input->post('id_proveedor');
                $prueva = $this->input->post('nombre_activo_fijo');               
                 $prueva = $this->input->post('valor_original');
                 $prueva = $this->input->post('fecha_compra');
                 $prueva = $this->input->post('fecha_ingreso');        
                 $prueva = $this->input->post('descripcion');
               
               $this->agregar_b_($prueva);
 return $prueva;
                }


                }
if($this->input->post('post') && $this->input->post('post')==2)
        {
           
            $this->form_validation->set_rules('vida_util', 'Campo vida_util',   'required|trim|xss_clean');  
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
            $this->form_validation->set_rules('parte1', 'Campo parte1',                         'required|trim|xss_clean'); 
            $this->form_validation->set_rules('vida_util', 'Campo vida_util',                    'required|trim|xss_clean');
            $this->form_validation->set_rules('varlor_residual', 'Campo varlor residual',        'numeric|trim|xss_clean');
            $this->form_validation->set_rules('cuota_anual', 'Campo cuota anual',                          'numeric|trim|xss_clean');
            $this->form_validation->set_rules('cuota_mensual', 'Campo cuota mensual',             'required|trim|xss_clean');   
           
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
                $parte1 = $this->input->post('parte1');
                $vida_util = $this->input->post('vida_util');
                $valor_residual = $this->input->post('valor_residual');
            
               
                $cuota_anual = $this->input->post('cuota_anual');
                $cuota_mensual = $this->input->post('cuota_mensual');
                $activado = 0;
                $this->crud_model_activo->agregar_activo($id_activofijo,$id_cuentacontable, 
                     $id_sucursal, $id_empleado, $id_proveedor,$nombre_activo_fijo,$valor_original,
                    $fecha_compra, $fecha_ingreso,$descripcion,$importe_depreciable, $parte1, $vida_util,
                    $valor_residual, $cuota_anual,$cuota_mensual, $activado);


                redirect('Crud_activo');               
            
                }


                }
        $this->load->view('header/header', $data);
        $this->load->view('form/a_activo',$data);
        $this->load->view('footer');
    }

public function agregar_b($dato)
    {
        
        //cargamos nuestra vista
          
                
    }

public function code_act()
    {
        @mysql_connect("localhost", "root", "123456*");
        mysql_select_db("sys_activofijo");
        $id_activofijo = mysql_real_escape_string(@$_POST['id_activofijo']);
        $check = mysql_query("SELECT id_activofijo FROM cat_activo_fijo WHERE id_activofijo = '$id_activofijo' ");
        $check_num_rows = mysql_num_rows($check);
        if ($id_activofijo==NULL)
            echo "";
        else if(strlen($id_activofijo)<=2)
            echo "Demaciado Corto";
        else
        {
            if($check_num_rows==0)
                echo "Disponible";
            else if ($check_num_rows==1) {
                echo "No Disponible";
            }
        }
    }

public function agregar_b_($prueva)
    {
        if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
        
             $data['usuario']=$_SESSION['my_usuario']; 
        //cargamos nuestra vista 
        $this->load->view('header/header', $data);
        $this->load->view('form/b_activo',$prueva);
        $this->load->view('footer');
                
    }

public function activar()
{
 if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
    $activos= $this->crud_model_activo->get_activar_activos();
        //creamos una variable usuarios para pasarle a la vista
          $data['usuario']=$_SESSION['my_usuario']; 
        $data['activo'] =   $activos;

        $this->load->view('header/header', $data);
       // $this->load->view('form/prueva');    
        $this->load->view('form/frmactivofijo_activar', $data);
       $this->load->view('footer');
    
    }

public function descanso()
{
 if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
    $activos= $this->crud_model_activo->get_activos();
        //creamos una variable usuarios para pasarle a la vista
            $data['usuario']=$_SESSION['my_usuario']; 
            $data['activo'] =   $activos;

        $this->load->view('header/header', $data);
        // $this->load->view('form/prueva');    
        $this->load->view('form/frmactivo_descanso', $data);
        $this->load->view('footer');
    
    }

public function reactivar()
{
 if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
    $activos= $this->crud_model_activo->reactivar_activos();
        //creamos una variable usuarios para pasarle a la vista
            $data['usuario']=$_SESSION['my_usuario']; 
            $data['activo'] =   $activos;

        $this->load->view('header/header', $data);
        // $this->load->view('form/prueva');    
        $this->load->view('form/frmactivo_reactivar', $data);
        $this->load->view('footer');
    
    }

  public function advertencia()
{
 if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
   
        //creamos una variable usuarios para pasarle a la vista
  $data['usuario']=$_SESSION['my_usuario']; 
        //cargamos nuestra vista
        $this->load->view('header/header', $data);
       // $this->load->view('form/prueva');    
        $this->load->view('form/frmadvertencia');
       $this->load->view('footer');
    
    }

    public function index()
    {
        //obtenemos todos los activos
                    
if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
     
                        //obtenemos todos los usuarios
        $activos= $this->crud_model_activo->get_activos();
        //creamos una variable usuarios para pasarle a la vista
           $data['usuario']=$_SESSION['my_usuario']; 
        $data['activo'] =   $activos;
        //creamos una variable usuarios para pasarle a la vista

        //cargamos nuestra vista
        $this->load->view('header/header',$data);
       // $this->load->view('form/prueva');    
        $this->load->view('form/frmactivofijo',$data);
       $this->load->view('footer');
    
    }



    public function nuevo()
    {
if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
  $data['usuario']=$_SESSION['my_usuario']; 
 $this->load->view('header/header',$data);
        $this->load->view('form/a_activo');
        $this->load->view('footer');
    
    }
         public function agregar()
 
    { 
if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
  $data['usuario']=$_SESSION['my_usuario']; 
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
            $this->form_validation->set_rules('parte1', 'Campo parte1',                         'required|trim|xss_clean'); 
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
                $parte1 = $this->input->post('parte1');
                $vida_util = $this->input->post('vida_util');
                $valor_residual = $this->input->post('valor_residual');
            
                $tipo_valor = $this->input->post('tipo_valor');
                $cuota_anual = $this->input->post('cuota_anual');
                $cuota_mensual = $this->input->post('cuota_mensual');
                $activado = 0;
                $this->crud_model_activo->agregar_activo($id_activofijo,$id_cuentacontable, 
                    $id_area, $id_sucursal, $id_empleado, $id_proveedor,$nombre_activo_fijo,$valor_original,
                    $fecha_compra, $fecha_ingreso,$descripcion,$importe_depreciable, $parte1, $vida_util,
                    $valor_residual, $tipo_valor,$cuota_anual,$cuota_mensual, $activado);


                redirect('Crud_activo');               
            
            
            }
        }
        $this->load->view('header/header',$data);
        $this->load->view('form/a_activofijo', $datas);
        $this->load->view('footer');
    }

    public function editar($id_activofijo=0)
    {
         if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
           $data['usuario']=$_SESSION['my_usuario'];
                   $data['area'] = $this->crud_model_activo->area();
        //verificamos si existe el id
        $respuesta = $this->crud_model_activo->get_activo($id_activofijo);
        //si nos retorna FALSE le mostramos la pag 404
        if($respuesta==false)
        show_404();
        else
        {
            //Si existe el post para editar
            if($this->input->post('post') && $this->input->post('post')==1)
            {
         $this->form_validation->set_rules('nombre_activo_fijo', 'Nombre Activo', 'required|trim|xss_clean');
            $this->form_validation->set_rules('id_area', 'Area','required|trim|xss_clean');
            $this->form_validation->set_rules('descripcion', 'Descripcion', 'required|trim|xss_clean');
             
            $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
            $this->form_validation->set_message('alpha','El Campo <b>%s</b> Solo Acepta caracteres alfabeticos');
                if ($this->form_validation->run() == TRUE)
                {
                $nombre_activo_fijo    = $this->input->post('nombre_activo_fijo');
                $id_area  = $this->input->post('id_area');
                $descripcion = $this->input->post('descripcion');
         
                $this->crud_model_activo->actualizar_activo($id_activofijo,$nombre_activo_fijo,$id_area,$descripcion);
                    //redireccionamos al controlador CRUD
                    redirect('crud_activo');               
                }
            }
            //devolvemos los datos del usuario
            $data['dato'] = $respuesta;
            //cargamos la vista
            $this->load->view('header/header', $data);
            $this->load->view('form/editar_activo',$data);
            $this->load->view('footer');
        }
    }
   
          

    public function activar_activo($id_activofijo=0)
    {
if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
  $data['usuario']=$_SESSION['my_usuario']; 
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
                $cuota_mensual     = $this->input->post('cuota_mensual');
                $parte1            = $this->input->post('parte1');
                $depreciacion_acumulada =  0;
                $saldo_restante =          $this->input->post('parte1');;
               
        $timestamp = now();
        $timezone = 'UM8';
        $daylight_saving = FALSE;

        $now = gmt_to_local($timestamp, $timezone, $daylight_saving);
        $datestring = "%Y-%m-%d %h:%i:%s";
        $fecha_inicio_uso = $this->now = mdate($datestring, $now);
        $activado = 1;

        $this->crud_model_activo->alta_activo($id_activofijo,$id_area,$id_empleado,$fecha_inicio_uso,$activado,$id_cuentacontable,$cuota_mensual,$parte1,$depreciacion_acumulada,$saldo_restante);
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
        if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
         $data['usuario']=$_SESSION['my_usuario']; 
        $activo= $this->crud_model_activo->ficha_activo($id_activofijo);
         if($activo==false)
        show_404();
        else {  
        $data['dato'] = $activo;
        
            //cargamos la vista
            $this->load->view('header/header', $data);
            $this->load->view('form/veractivo',$data);
            $this->load->view('footer');
}
    }


    public function descanso_activo($id_activofijo=0)

    {
        if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
           $data['usuario']=$_SESSION['my_usuario'];
        //verificamos si existe el id
        $respuesta = $this->crud_model_activo->get_activos($id_activosfijo);
        //si nos retorna FALSE mostramos la pag 404.
        if($respuesta==false)
        show_404();
        else
        {


        $activado = 3;
            //si existe eliminamos el usuario
            $this->crud_model_activo->estado_activo($id_activofijo,$activado);
            //redireccionamos al controlador CRUD
            redirect('crud_activo/descanso'); 
        }
    }

        public function reactivar_activo($id_activofijo=0)

    {
        if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
           $data['usuario']=$_SESSION['my_usuario'];
        //verificamos si existe el id
        $respuesta = $this->crud_model_activo->get_activos($id_activosfijo);
        //si nos retorna FALSE mostramos la pag 404.
        if($respuesta==false)
        show_404();
        else
        {


        $activado = 1;
            //si existe eliminamos el usuario
            $this->crud_model_activo->estado_activo($id_activofijo,$activado);
            //redireccionamos al controlador CRUD
            redirect('crud_activo/reactivar'); 
        }
    }


 public function procedimiento1()
    {
        if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
         $data['usuario']=$_SESSION['my_usuario'];

 $timestamp = now();
        $timezone = 'UM8';
        $daylight_saving = FALSE;

        $now = gmt_to_local($timestamp, $timezone, $daylight_saving);
        $datestring = "%Y-%m";
        $fecha_depreciacion = $this->now = mdate($datestring, $now);

$fecha = $this->crud_model_activo->get_fecha($fecha_depreciacion);


if ($fecha != 0)
{
 $fecha_activos = $this->crud_model_activo->get_sin_depreciar($fecha_depreciacion);
  if($fecha_activos != 0 )
{
if($query=$this->db->query("CALL procedimiento3"))
             redirect('crud_depreciacion/');


}
else
{
    redirect('crud_depreciacion/');
}

}

else
{
if($query=$this->db->query("CALL procedimiento1"))
     {
        
        redirect('crud_depreciacion/');

 }
      else
      {
        show_error('error!');
      }

  
}



       // $this->crud_model_depreciacion->procedimiento1;
            //cargamos la vista
            
    }

    public function pdfactivos_sin_usar()
    {        
        require('http://localhost:8080/JavaBridge/java/Java.inc');
        $dirInforme ='C:/xampp/htdocs/sistema/application/views/reportes'; 
        $Informe = "ReporteActivoSinUsar"; 
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

    public function pdfactivos_en_uso()
    {        
        require('http://localhost:8080/JavaBridge/java/Java.inc');
        $dirInforme ='C:/xampp/htdocs/sistema/application/views/reportes'; 
        $Informe = "ReporteActivo_en_Uso"; 
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