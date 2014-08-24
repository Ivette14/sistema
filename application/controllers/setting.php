<?php 
    class Setting extends CI_Controller
{
    public function __construct()
    {
        //Cargamos El Constructor
    parent::__construct();
        @ session_start();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->model("crud_model_menu");
    }

    function backup()
    {
        $this->load->dbutil();
        $fecha_hora = date("Y-m-d_H-i-s");

        $prefer = array(
            'tables'    => array(),
            'ignore'    => array(),
            'format'    => 'zip',
            'filename'  => 'backup_'.$fecha_hora.'.sql',
            'add_drop'  => TRUE,
            'add_insert'=> TRUE,
            'newline'   => TRUE,
            );

        $bu = $this->dbutil->backup($prefer);

        $this->load->helper('file');
        write_file('path/to/backup_'.$fecha_hora.'.zip', $bu);

        $this->load->helper('download');
        force_download('backup_'.$fecha_hora.'.zip', $bu);
    }
}