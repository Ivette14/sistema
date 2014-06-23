<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_usuario extends CI_Model {


	function login( $values){
         $array = array(
            'nombre_usuario' => $values['nombre_usuario'],
            'clave'    => $values['clave']
			);

        /*$this->db->where($array);

        $query         = $this->db->get('usuarios');

        $num_rows_user = $query->num_rows();

        return $num_rows_user >= 1 ?  $query->result() : FALSE;*/


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





}
/* End of file model_usuario.php */
/* Location: ./application/models/model_usuario.php */