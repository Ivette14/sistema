<?php 
    class Crud_model_baja extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //vamos a cargar todos los usuarios
    public function get_bajas()
    {
       $query = $this->db->query('SELECT * FROM `cat_activo_fijo` WHERE `activado` = 1;');
       return $query->result();

    }


    public function editar($id_activofijo,$activado,$motivo_baja)
    {
        $this->db->where('id_activofijo', $id_activofijo);
        $this->db->update('cat_activo_fijo',array(
            'id_activofijo'=> $id_activofijo,
            'activado' => $activado,
        ));
       
       $this->db->insert('cat_baja',array(
        'motivo_baja' => $motivo_baja,
        'id_activofijo' => $id_activofijo
        ));

    }

    public function baja_activo($data){
    $this->db->insert('cat_baja', $data);
    return $this->db->insert_id();

   }

    public function get_act($id_activofijo)
    {
        $sql = $this->db->get_where('cat_activo_fijo',array('id_activofijo'=>$id_activofijo));
        if($sql->num_rows()==1)
        return $sql->row_array();
        else
        return false;
    }
      
}

?>