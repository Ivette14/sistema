<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Model_rol extends CI_Model { 
 
     public function get_opcion()
    {
        $this->db->order_by('opcion','asc');
        $opcion = $this->db->get('gu_opcion');
        if($opcion->num_rows()>0)
        {
            return $opcion->result();
        }
         
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
        else
        return false;
    }
 
	function traer_rol( $id_rol=0 ){ 
		if( $id_rol!=0 )$this->db->where('id_rol', $id_rol); 
		$query=$this->db->get('gu_rol'); 
		return($query->num_rows()>0)?$query->result_array():false; 

	} 
 
 
	function save_rol( $rol ){ 
  
        $this->db->insert('gu_rol',array(
            'rol'        => $rol            
            
            
        ));
    }

  public function actualizar_rol($id_rol, $id)
    {
        
      $this->db->insert('gu_rol_menu',array(
            'id_rol'        => $id_rol,
            'id_opcion'     => $id     
            
            
        ));;
    }
 
 
	function delete_( $id_rol ){ 
		$this->db->where('id_rol', $id_rol); 
		$this->db->delete('gu_rol'); 
		return($this->db->affected_rows()>0)?true:false; 
	}


}