<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Model_usuarios extends CI_Model { 
 
 
	function traer_usuarios( $id_usuario=0 ){ 
		if( $id_usuario!=0 )$this->db->where('id_usuario', $id_usuario); 
		$query=$this->db->get('usuarios'); 
		return($query->num_rows()>0)?$query->result_array():false; 
	} 
 
 
	function save_usuario( $post ){ 
		$this->db->insert('usuarios', $post); 
		return($this->db->affected_rows()>0)?$this->db->insert_id():false; 
	} 
 
 
	function edit_usuario( $id_usuario, $post ){ 
		$this->db->where('id_usuario', $id_usuario); 
		return $this->db->update('usuarios', $post); 
	} 
 
 
	function delete_( $id_usuario ){ 
		$this->db->where('id_usuario', $id_usuario); 
		$this->db->delete('usuarios'); 
		return($this->db->affected_rows()>0)?true:false; 
	} 
 
}