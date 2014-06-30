<?php 
 	class Crud_model_depreciacion extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
  public function get_activos()
    {    $query = $this->db->query('SELECT cat_activo_fijo.id_activofijo,
cat_activo_fijo.nombre_activo_fijo,
cat_cuentas_contables.nombre_cuenta,
cat_activo_fijo.cuota_mensual,
cat_depreciacion_activo.depreciacion_acumulada,
cat_depreciacion_activo.saldo_restante 
FROM cat_activo_fijo
INNER JOIN cat_cuentas_contables ON cat_cuentas_contables.id_cuentacontable = cat_activo_fijo.id_cuentacontable
INNER JOIN cat_depreciacion_activo ON cat_depreciacion_activo.id_activofijo = cat_activo_fijo.id_activofijo
 WHERE `activado` = 1;');
       return $query->result();
    }
    //agregamos una sucursal
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
   
    //Obtenemos los datos de un usuario por id
  public function get_activo($id_activofijo)
    {
        $sql = $this->db->get_where('cat_activo_fijo',array('id_activofijo'=>$id_activofijo));
        if($sql->num_rows()==1)
        return $sql->row_array();
        else
        return false;
    }


}

?>