<?php 
 	class Crud_model_traslado extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //vamos a cargar todos los empleado
    public function get_traslados()
    {
        $sql = $this->db->get('cat_trasladoaf');
        return $sql->result();
    }
    //agregamos un empleado
    public function agregar_traslado( $codigo_traslado, $id_activofijo, $motivo_traslado, $fecha_traslado, $id_sucursal,$id_empleado)
    {
        $this->db->insert('cat_trasladoaf',array(
            'codigo_traslado'       => $codigo_traslado,
            'id_activofijo'         => $id_activofijo,
            'motivo_traslado'       => $motivo_traslado,
            'fecha_traslado'        => $fecha_traslado,            
            'id_sucursal'           => $id_sucursal,
            'id_empleado'           => $id_empleado
            
        ));

        $this->db->where('id_activofijo', $id_activofijo);
        $this->db->update('cat_activo_fijo',array(            
            'id_empleado'           => $id_empleado,                      
            'id_sucursal'           => $id_sucursal
        ));
    }
    //actualizamos los datos de un empleado por id
    public function actualizar_traslado($id_traslado_activo,$codigo_traslado, $id_activofijo, $motivo_traslado, $fecha_traslado, $id_sucursal,$id_empleado)
    {
        $this->db->where('id_traslado_activo', $id_traslado_activo);
        $this->db->update('cat_trasladoaf',array(
            'codigo_traslado'       => $codigo_traslado,
            'id_activofijo'         => $id_activofijo,
            'motivo_traslado'       => $motivo_traslado,
            'fecha_traslado'        => $fecha_traslado,            
            'id_sucursal'           => $id_sucursal,
            'id_empleado'           => $id_empleado
        ));

        $this->db->where('id_activofijo', $id_activofijo);
        $this->db->update('cat_activo_fijo',array(            
            'id_empleado'           => $id_empleado,                      
            'id_sucursal'           => $id_sucursal
        ));
    }
    //eliminamos un empleado por id
    public function eliminar_traslado($id_traslado_activo)
    {
        $this->db->delete('cat_trasladoaf', array('id_traslado_activo' => $id_traslado_activo));
    }
    //Obtenemos los datos de un empleado por id
    public function get_traslado($id_traslado_activo)
    {
        $sql = $this->db->get_where('cat_trasladoaf',array('id_traslado_activo'=>$id_traslado_activo));
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

     public function empleado()
    {
        $this->db->order_by('nombre_empleado','asc');
        $sucursal = $this->db->get('cat_empleado');
        if($sucursal->num_rows()>0)
        {
            return $sucursal->result();
        }
    }

        public function activo()
    {
        $this->db->order_by('id_activofijo','asc');
        $activofijo = $this->db->get('cat_activo_fijo');
        if($activofijo->num_rows()>0)
        {
            return $activofijo->result();
        }
    }

    public function tabla()
    {        
       $query = $this->db->query('SELECT    cat_sucursal.nombre_sucursal, 
                                            cat_trasladoaf.id_traslado_activo, 
                                            cat_trasladoaf.codigo_traslado, 
                                            cat_trasladoaf.motivo_traslado, 
                                            cat_trasladoaf.fecha_traslado,                                           
                                            cat_empleado.nombre_empleado, 
                                            cat_activo_fijo.id_activofijo,
                                            cat_activo_fijo.nombre_activo_fijo
                                    FROM cat_trasladoaf
                                    INNER JOIN cat_sucursal ON cat_sucursal.id_sucursal = cat_trasladoaf.id_sucursal
                                    INNER JOIN cat_empleado ON cat_empleado.id_empleado = cat_trasladoaf.id_empleado
                                    INNER JOIN cat_activo_fijo ON cat_activo_fijo.id_activofijo = cat_trasladoaf.id_activofijo');
       return $query->result();    
    }
}

?>