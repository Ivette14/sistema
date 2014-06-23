<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Insertar extends CI_Model {


  function insertar_cuenta($data)
   {
    $this->db->insert('cat_cuentas_contables', $data);
    	
    	return $this->db->insert_id();

   }

  function insertar_sucursal($data)
   {
    $this->db->insert('cat_sucursal', $data);
    	
    	return $this->db->insert_id();

   }

  function insertar_area($data)
   {
    $this->db->insert('cat_area', $data);
      
      return $this->db->insert_id();

   }

   function insertar_empleado($data)
   {
    $this->db->insert('cat_empleado', $data);
      
      return $this->db->insert_id();

   }

}
  

?>

