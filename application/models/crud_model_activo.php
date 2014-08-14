<?php 
 	class Crud_model_activo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //vamos a cargar todos los datos de activo fijo 
    public function get_activos()
    {    
        $query = $this->db->query('SELECT  
        cat_activo_fijo.id_activofijo,        
        cat_activo_fijo.nombre_activo_fijo,
        cat_activo_fijo.fecha_ingreso,
        cat_cuentas_contables.nombre_cuenta,
        cat_sucursal.nombre_sucursal,
        cat_area.nombre_area,
        cat_empleado.nombre_empleado,
        cat_proveedor.nombre_provee,
        cat_activo_fijo.cuota_mensual,
        cat_activo_fijo.parte1
        FROM
        cat_activo_fijo
        INNER JOIN cat_cuentas_contables ON cat_cuentas_contables.id_cuentacontable = cat_activo_fijo.id_cuentacontable
        INNER JOIN cat_sucursal ON cat_sucursal.id_sucursal = cat_activo_fijo.id_sucursal
        INNER JOIN cat_area ON cat_area.id_area = cat_activo_fijo.id_area
        INNER JOIN cat_empleado ON cat_empleado.id_empleado = cat_activo_fijo.id_empleado
        INNER JOIN cat_proveedor ON cat_proveedor.id_proveedor = cat_activo_fijo.id_proveedor
        WHERE
         cat_activo_fijo.activado  = 1;');
        return $query->result();
    }
     public function get_activar_activos()
    {    
        $query = $this->db->query('SELECT  
        cat_activo_fijo.id_activofijo,        
        cat_activo_fijo.nombre_activo_fijo,
        cat_activo_fijo.fecha_ingreso,
        cat_activo_fijo.cuota_mensual,
        cat_activo_fijo.parte1,
        cat_cuentas_contables.nombre_cuenta,
        cat_sucursal.nombre_sucursal,
        cat_proveedor.nombre_provee

        FROM
        cat_activo_fijo
        INNER JOIN cat_cuentas_contables ON cat_cuentas_contables.id_cuentacontable = cat_activo_fijo.id_cuentacontable
        INNER JOIN cat_sucursal ON cat_sucursal.id_sucursal = cat_activo_fijo.id_sucursal
        INNER JOIN cat_proveedor ON cat_proveedor.id_proveedor = cat_activo_fijo.id_proveedor
        WHERE
         cat_activo_fijo.activado  = "0";');
        return $query->result();
    }
     public function alta_activo($id_activofijo,$id_area,$id_empleado,$fecha_inicio_uso,$activado,$id_cuentacontable,$cuota_mensual,$parte1,$depreciacion_acumulada,$saldo_restante)
    {
        $this->db->where('id_activofijo', $id_activofijo);
        $this->db->update('cat_activo_fijo',array(
            'id_area'           => $id_area,
            'id_empleado'       => $id_empleado,
            'fecha_inicio_uso'  => $fecha_inicio_uso,
            'activado'          => $activado
        ));


        $this->db->insert('cat_depreciacion_activo', array(
        'id_activofijo'               =>$id_activofijo,
        'id_cuentacontable'           =>$id_cuentacontable,
        'año_mes'                     =>$fecha_inicio_uso,
        'cuota_mensual'               =>$cuota_mensual,
        'parte1'                      =>$parte1,
        'depreciacion_acumulada' => $depreciacion_acumulada,
        'saldo_restante'    =>  $saldo_restante

    ));
    }
     //vamos a cargar todos los datos para Combobox

    //agregamos un activo
    public function agregar_activo($id_activofijo, $id_cuentacontable,$id_area, $id_sucursal, $id_empleado, $id_proveedor,$nombre_activo_fijo,$valor_original,
    $fecha_compra,$fecha_ingreso,$descripcion,
     $importe_depreciable,$parte1,$vida_util,$valor_residual,$tipo_valor,$cuota_anual,$cuota_mensual,$activado) 
    {
        $this->db->insert('cat_activo_fijo',array(
            'id_activofijo'                =>  $id_activofijo,
            'id_cuentacontable'            =>  $id_cuentacontable,
    
            'id_sucursal'                  =>  $id_sucursal,
            'id_empleado'                  =>  $id_empleado,
            'id_proveedor'                 =>  $id_proveedor,
            'nombre_activo_fijo'           =>  $nombre_activo_fijo,
            'descripcion'                  =>  $descripcion,
            'valor_original'               =>  $valor_original,            
             'tipo_valor'                  =>  $tipo_valor,
            'fecha_compra'                 =>  $fecha_compra,
            'fecha_ingreso'                =>  $fecha_ingreso,
          
            'importe_depreciable'          =>  $importe_depreciable,
            'parte1'                       =>  $parte1,
            'vida_util'                    =>  $vida_util,
            'valor_residual'               =>  $valor_residual,
            'cuota_anual'                  =>  $cuota_anual,
            'cuota_mensual'                =>  $cuota_mensual,
             'activado'                    =>  $activado
           
             
        ));


    }
    //actualizamos los datos de un usuario por id
   
    public function cuenta()
    {
        $this->db->order_by('nombre_cuenta','asc');
        $cuenta = $this->db->get('cat_cuentas_contables');
        if($cuenta->num_rows()>0)
        {
            return $cuenta->result();
        }
    }
        public function proveedor()
    {
        $this->db->order_by('nombre_provee','asc');
        $proveedor = $this->db->get('cat_proveedor');
        if($proveedor->num_rows()>0)
        {
            return $proveedor->result();
        }
    }

    public function sucursal()
    {
        $this->db->order_by('nombre_sucursal','asc');
        $sucursal = $this->db->get('cat_sucursal');
        if($sucursal->num_rows()>0)
        {
            return $sucursal->result();
        }
    }
        public function empleado()
    {
        $this->db->order_by('nombre_empleado','asc');
        $empleado = $this->db->get('cat_empleado');
        if($empleado->num_rows()>0)
        {
            return $empleado->result();
        }
    }
       public function area()
    {
        $this->db->order_by('nombre_area','asc');
        $area = $this->db->get('cat_area');
        if($area->num_rows()>0)
        {
            return $area->result();
        }
    }
      public function get_activo($id_activofijo)
    {
        $sql = $this->db->get_where('cat_activo_fijo',array('id_activofijo'=>$id_activofijo));
        if($sql->num_rows()==1)
        return $sql->row_array();
        else
        return false;
    }

        public function pdfactivo_sin_usar()
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