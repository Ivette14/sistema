<?php 
 	class Crud_model_empleado extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //vamos a cargar todos los empleado
    public function get_empleados()
    {
        $sql = $this->db->get('cat_empleado');
        return $sql->result();
    }
    //agregamos un empleado
    public function agregar_empleado($codigo_empleado,  $nombre_empleado, $direccion_empleado, $telefono_empleado, $email_empleado)
    //public function agregar_empleado($codigo_empleado, $id_sucursal, $nombre_empleado, $direccion_empleado, $telefono_empleado, $email_empleado)
    
    {
        $this->db->insert('cat_empleado',array(
            'codigo_empleado'    => $codigo_empleado,
//            'id_sucursal'        => $id_sucursal,
            'nombre_empleado'    => $nombre_empleado,
            'direccion_empleado' => $direccion_empleado,
            'telefono_empleado'  => $telefono_empleado,
            'email_empleado'     => $email_empleado
        ));
    }
    //actualizamos los datos de un empleado por id
    public function actualizar_empleado($id_empleado, $codigo_empleado, $nombre_empleado, $direccion_empleado, $telefono_empleado, $email_empleado)
//    public function actualizar_empleado($id_empleado, $codigo_empleado, $id_sucursal, $nombre_empleado, $direccion_empleado, $telefono_empleado, $email_empleado)

    {
        $this->db->where('id_empleado', $id_empleado);
        $this->db->update('cat_empleado',array(
            'codigo_empleado'    => $codigo_empleado,
  //          'id_sucursal'        => $id_sucursal,
            'nombre_empleado'    => $nombre_empleado,
            'direccion_empleado' => $direccion_empleado,
            'telefono_empleado'  => $telefono_empleado,
            'email_empleado'     => $email_empleado
        ));
    }
    //eliminamos un empleado por id
    public function eliminar_empleado($id_empleado)
    {
        $this->db->delete('cat_empleado', array('id_empleado' => $id_empleado));
    }
    //Obtenemos los datos de un empleado por id
    public function get_empleado($id_empleado)
    {
        $sql = $this->db->get_where('cat_empleado',array('id_empleado'=>$id_empleado));
        if($sql->num_rows()==1)
        return $sql->row_array();
        else
        return false;
    }

     public function sucur()
    {
        $this->db->order_by('nombre_sucursal','asc');
        $sucursal = $this->db->get('cat_sucursal');
        if($sucursal->num_rows()>0)
        {
            return $sucursal->result();
        }
    }

     public function tabla()
    {        
       $query = $this->db->query('SELECT cat_sucursal.nombre_sucursal, cat_empleado.codigo_empleado, cat_empleado.nombre_empleado,
                                            cat_empleado.direccion_empleado, cat_empleado.telefono_empleado, cat_empleado.email_empleado, cat_empleado.id_empleado
                                    FROM cat_empleado 
                                     INNER JOIN cat_sucursal ON cat_sucursal.id_sucursal = cat_empleado.id_sucursal');
       return $query->result();    
    }

     
}

?>