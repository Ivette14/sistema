<?php 
 	class Crud_model_cuenta extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //vamos a cargar todos los usuarios
    public function get_cuentas()
    {
        $sql = $this->db->get('cat_cuentas_contables');
        return $sql->result();
    }
    //agregamos un usuario
    public function agregar_cuenta($id_cuentacontable,$nombre_cuenta,$vida_util)
    {
        $this->db->insert('cat_cuentas_contables',array(
            'id_cuentacontable'      => $id_cuentacontable,
            'nombre_cuenta'    => $nombre_cuenta,
            'vida_util'   => $vida_util,
            
        ));
    }
    //actualizamos los datos de un usuario por id
    public function actualizar_cuenta($id_cuentacontable,$nombre_cuenta,$vida_util)
    {
        $this->db->where('id_cuentacontable', $id_cuentacontable);
        $this->db->update('cat_cuentas_contables',array(
            'id_cuentacontable'=> $id_cuentacontable,
            'nombre_cuenta' => $nombre_cuenta,
            'vida_util' => $vida_util
        ));
    }
    //eliminamos un usuario por id
    public function eliminar_cuenta($id_cuentacontable)
    {
        $this->db->delete('cat_cuentas_contables', array('id_cuentacontable' => $id_cuentacontable));
    }
    //Obtenemos los datos de un usuario por id
    public function get_cuenta($id_cuentacontable)
    {
        $sql = $this->db->get_where('cat_cuentas_contables',array('id_cuentacontable'=>$id_cuentacontable));
        if($sql->num_rows()==1)
        return $sql->row_array();
        else
        return false;
    }
}

?>