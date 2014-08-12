<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class model_acceso extends CI_Model { 
 
	function comprobar( $post ){ 
		$query=$this->db->get_where('usuarios', array('nombre_usuario'=>$post['nombre_usuario'], 'clave'=>$post['clave'])); 
		return($query->num_rows()>0)?$query->row_array():false;		


		$sql = $this->db->get_where('usuarios',array('nombre_usuario'=>$post['nombre_usuario']));
        if($sql->num_rows()==1)
        return $sql->row_array();
        else
        return false; 
	} 
 
}