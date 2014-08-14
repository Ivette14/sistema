<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class model_usuario extends CI_Model { 


	function login( $values){
         $array = array(
            'nombre_usuario' => $values['nombre_usuario'],
            'clave'    => $values['clave']
			);


         $sql="SELECT id_usuario,nombre_usuario,clave FROM usuarios  WHERE nombre_usuario='".$array['nombre_usuario']."'
        AND clave='".$array['clave']."'";

        $query=$this->db->query($sql);

        if($query->num_rows() == 1)
        {
            return 1;
        }
        else
        {
            return false;
        }


	}
        public function rol()
    {
        $this->db->order_by('rol','asc');
        $rol = $this->db->get('gu_rol');
        if($rol->num_rows()>0)
        {
            return $rol->result();
        }
    }
    function traer_usuarios( $id_usuario=0 ){ 
        if( $id_usuario!=0 )$this->db->where('id_usuario', $id_usuario); 
        $query=$this->db->get('usuarios'); 
        return($query->num_rows()>0)?$query->result_array():false; 
    } 
 
 
    function save_usuario($id_usuario, $post ){ 
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
/* End of file model_usuario.php */
/* Location: ./application/models/model_usuario.php */