<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Model_rol extends CI_Model { 
 
 
	function traer_rol( $id_rol=0 ){ 
		if( $id_rol!=0 )$this->db->where('id_rol', $id_rol); 
		$query=$this->db->get('gu_rol'); 
		return($query->num_rows()>0)?$query->result_array():false; 
	} 
 
 
	function save_rol( $post ){ 
		$this->db->insert('gu_rol', $post); 
		return($this->db->affected_rows()>0)?$this->db->insert_id():false; 
	} 
 
 
	function edit_usuario( $id_usuario, $post ){ 
		$this->db->where('id_usuario', $id_usuario); 
		return $this->db->update('usuarios', $post); 
	} 
 
 
	function delete_( $id_rol ){ 
		$this->db->where('id_rol', $id_rol); 
		$this->db->delete('gu_rol'); 
		return($this->db->affected_rows()>0)?true:false; 
	} 
 
}