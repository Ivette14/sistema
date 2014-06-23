
﻿<?php 
    class Crud_saldo extends CI_Controller
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
        $this->load->model("crud_model_saldo");
        $this->load->model("crud_model");
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
    }
 

      function dias_transcurridos($fecha_i,$fecha_f)
{
    $dias   = (strtotime($fecha_i)-strtotime($fecha_f))/86400;
    $dias   = abs($dias); $dias = floor($dias);     
    return $dias;
}


    public function index()
    {

    if($this->input->post('post') && $this->input->post('post')==1)
      { 
               $id_cuentacontable = $this->input->post('id_cuentacontable');
               $fecha_actual = $this->input->post('fecha_actual');
        $this->form_validation->set_message('required','El Campo <b>%s</b> Es Obligatorio');
                   
                   if ($this->form_validation->run() == TRUE)
            {

                $this->crud_model_saldo->get_saldos($id_cuentacontable, $fecha_actual);
//$sql='SELECT * 
// FROM  cat_activo_fijo where id_cuentacontable = "$id_cuentacontable"  and activado = "1";';
//$rec=mysql_query($sql);      
// while ($row=mysql_fetch_array($rec))
// {
 //     $id_activofijo = $row['id_activofijo'];       
//$depreciacion_mensual = $row['depreciacion_mensual'];
//$fecha_inicio_uso = $row['fecha_inicio_uso'];
//$importe_depreciable = $row['importe_depreciable'];
//$valor_residual = $row['valor_residual'];
//}
  //      $timestamp          = now();
    //    $timezone           = 'UM8';
      //  $daylight_saving    = FALSE;

//        $now        = gmt_to_local($timestamp, $timezone, $daylight_saving);
//        $datestring = "%Y-%m-%d %h:%i:%s";
//        $mes_actual = $this->now = mdate($datestring, $now);

//$parte1 = $importe_depreciable - $valor_residual;
//$dias_transcurridos = $this->dias_transcurridos($mes_actual, $fecha_inicio_uso); 

 //$depreciacion_acumulada = $depreciacion_mensual * $dias_transcurridos;
 
//$this->crud_model_saldo->get_saldos($id_activofijo, $id_cuentacontable, $mes_actual,$depreciacion_acumulada);


  }
}
        $this->load->view('header/header');
        $this->load->view('form/saldo');
        $this->load->view('footer');
    
    }


    
     
    public function depreciacion($id_activofijo=0)
    {
     
    } 
     //echo dias_transcurridos('2012-07-01','2012-07-18');  
}
?>