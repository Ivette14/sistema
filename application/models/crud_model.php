<?php 
 	class Crud_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //vamos a cargar todos los usuarios
    public function get_sucursales()
    {
        $sql = $this->db->get('cat_sucursal');
        return $sql->result();
    }
    //agregamos un usuario
    public function agregar_sucursal($nombre_sucursal,$telefono_sucursal,$direccion_sucursal,$departamento)
    {
        $this->db->insert('cat_sucursal',array(
            'nombre_sucursal'   => $nombre_sucursal,
            'telefono_sucursal' => $telefono_sucursal,
            'direccion_sucursal'=> $direccion_sucursal,
            'departamento'      => $departamento
        ));
    }
    //actualizamos los datos de un usuario por id
    public function actualizar_sucursal($id_sucursal,$nombre_sucursal,$telefono_sucursal,$direccion_sucursal,$departamento)
    {
        $this->db->where('id_sucursal', $id_sucursal);
        $this->db->update('cat_sucursal',array(
            'nombre_sucursal'   => $nombre_sucursal,
            'telefono_sucursal' => $telefono_sucursal,
            'direccion_sucursal'=> $direccion_sucursal,
            'departamento'      => $departamento
        ));
    }
    //eliminamos un usuario por id
    public function eliminar_sucursal($id_sucursal)
    {
        $this->db->delete('cat_sucursal', array('id_sucursal' => $id_sucursal));
    }
    //Obtenemos los datos de un usuario por id
    public function get_sucursal($id_sucursal)
    {
        $sql = $this->db->get_where('cat_sucursal',array('id_sucursal'=>$id_sucursal));
        if($sql->num_rows()==1)
        return $sql->row_array();
        else
        return false;
    }
}

?>