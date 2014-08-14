<?php 
 	class Model_roles extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
   public function get_roles()
    {
        $sql = $this->db->get('gu_rol');
        return $sql->result();
    }
  public function get_rol($id_rol)
    {
      $query = $this->db->query('SELECT 
gu_opcion.id_opcion, 
gu_opcion.opcion
FROM  gu_opcion, gu_rol, gu_rol_menu
where gu_rol_menu.id_opcion = gu_opcion.id_opcion 
and gu_rol_menu.id_rol = gu_rol.id_rol
and gu_rol.id_rol= $id_rol;');
        return $query->result();
    }
    }

