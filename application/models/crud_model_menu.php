<?php 
 	class Crud_model_menu extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function menu()
    {

  $query = $this->db->query('SELECT usuarios.id_usuario, 
usuarios.nombre_usuario, 
gu_opcion.id_opcion, 
gu_opcion.opcion, 
gu_opcion.url, 
gu_opcion.tipo
FROM gu_rol_menu, gu_opcion, gu_rol, usuarios
where usuarios.id_rol = gu_rol.id_rol
and gu_rol_menu.id_opcion = gu_opcion.id_opcion 
and gu_rol_menu.id_rol = gu_rol.id_rol
and usuarios.id_usuario=2;
');
        return $query->result();

    }

}
