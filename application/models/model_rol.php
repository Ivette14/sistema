<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Model_rol extends CI_Model { 
 
     public function get_opcion($id_rol)
    {
       
$query = $this->db->query("SELECT gu_opcion.id_opcion, gu_opcion.opcion
FROM gu_opcion
WHERE gu_opcion.id_opcion NOT 
IN (

SELECT gu_rol_menu.id_opcion
FROM gu_rol_menu
inner join gu_rol on gu_rol.id_rol=gu_rol_menu.id_rol
inner join gu_opcion on gu_opcion.id_opcion=gu_rol_menu.id_opcion
and gu_rol_menu.id_rol = '$id_rol' )");
return $query->result();
         
    }

     public function get_rol()
    {
 $sql = $this->db->get('gu_rol');
        return $sql->result();
 }
 public function get_rol_($id_rol)
    {



$sql = $this->db->get_where('gu_rol',array('id_rol'=>$id_rol));
        if($sql->num_rows()==1)
        return $sql->row_array();
    }
 
 public function get_opcion_($id_rol)
 {
$query = $this->db->query("SELECT
gu_opcion.id_opcion, 
gu_opcion.opcion
FROM gu_opcion
INNER join gu_rol_menu ON gu_rol_menu.id_opcion = gu_opcion.id_opcion
INNER Join gu_rol ON gu_rol.id_rol = gu_rol_menu.id_rol
WHERE gu_rol_menu.id_rol= '$id_rol' ");

        return $query->result();

 }
	function traer_rol( $id_rol=0 ){ 
		if( $id_rol!=0 )$this->db->where('id_rol', $id_rol); 
		$query=$this->db->get('gu_rol'); 
		return($query->num_rows()>0)?$query->result_array():false; 

	} 
 
 
	function save_rol( $rol, $id ){ 
  
        $this->db->insert('gu_rol',array(
            'rol'        => $rol            
            
            
        ));
        
    }
public function existencia($id_rol)
{
$query = $this->db->query('SELECT count(*) FROM `gu_rol_menu` 
WHERE id_rol="$id_rol"');

return $query->result();


}


public function insert_opcion($id_rol, $id)
    {
       
      $this->db->insert('gu_rol_menu',array(
            'id_rol'        => $id_rol,
            'id_opcion'     => $id  
  
        ));;

 }

  public function actualizar_rol($id_rol, $id)
    {
       
 $this->db->where('id_rol', $id_rol);
 $this->db->update('gu_rol_menu',array(
            'id_rol'            => $id_rol,
            'id_opcion'         => $id
           
        ));


    }
 
 
	function delete_( $id_rol ){ 
		$this->db->where('id_rol', $id_rol); 
		$this->db->delete('gu_rol'); 
		return($this->db->affected_rows()>0)?true:false; 
	}


}