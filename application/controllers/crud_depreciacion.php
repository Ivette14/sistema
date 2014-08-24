
﻿<?php 
    class Crud_depreciacion extends CI_Controller
{
    public function __construct()
    {
        //Cargamos El Constructor
parent::__construct();
        @ session_start();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library(array('session','form_validation'));
        $this->load->model("crud_model_depreciacion");
        $this->load->model("crud_model");
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
         $this->load->model("crud_model_menu");
    }
     
    public function index()
    {
   if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
           $data['usuario']=$_SESSION['my_usuario']; 
        //obtenemos todos los activos
        $activo = $this->crud_model_depreciacion->get_activos();
        //creamos una variable activos para pasarle a la vista
        if($query=$this->db->query("CALL procedimiento2"))
     {
         $data['saldo'] = $activo;
        
        $this->load->view('header/header', $data);
        $this->load->view('form/frmdepreciacion', $data);
         $this->load->view('footer');
     }
      else
      {
        show_error('error!');
      }
       
    
    }

        public function versaldo()
    {
   if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
           $data['usuario']=$_SESSION['my_usuario']; 
        //obtenemos todos los activos
        $activo = $this->crud_model_depreciacion->get_activos();
        //creamos una variable activos para pasarle a la vista
        if($query=$this->db->query("CALL procedimiento2"))
     {
         $data['saldo'] = $activo;
        
        $this->load->view('header/header', $data);
        $this->load->view('form/frmversaldo', $data);
         $this->load->view('footer');
     }
      else
      {
        show_error('error!');
      }
       
    
    }


    
     
    public function depreciacion($id_activofijo=0)
    {
           if ( !isset($_SESSION['my_usuario']) )redirect( 'acceso', 'refresh' ); 
           $data['usuario']=$_SESSION['my_usuario']; 
        //verificamos si existe el id
        $respuesta = $this->crud_model_depreciacion->get_activo($id_activofijo);
          if($respuesta==false)
        show_404();
        else
        {
           $data['dato'] = $respuesta;
            //cargamos la vista
            $this->load->view('header/header', $data);
            $this->load->view('form/depreciacion',$data);
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

            function toExcel_saldo()
    {
        //obtenemos todos los activos
        $activo = $this->crud_model_depreciacion->get_activos();
        //creamos una variable activos para pasarle a la vista
        if($query=$this->db->query("CALL procedimiento2"))
        {
         $data['reporte_saldo'] = $activo;
         $this->load->view('reportes/reporte_saldo', $data);
        }
         else
        {
        show_error('error!');
        }
    }

}
?>