<?php 
 	class Crud_model_saldo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
  public function get_saldos($id_cuentacontable,$fecha_actual)
    {    $query = $this->db->query('SELECT * 
 FROM  cat_activo_fijo where id_cuentacontable = 3 and activado = 1;');
       return $query->result();
    }
}

?>