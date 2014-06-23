<?php
class Sucursales extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //cargamos nuestro modelo usuarios
        $this->load->model('crud_model');
    }
     
    public function index()
    {
        //vamos a listar los usuarios:
        $sucursales = $this->crud_model->get_sucursales();
        if(isset($sucursales)){ 
        foreach($sucursales as $sucursal)
        {
            echo 'nombre_sucursal:      '.$sucursal->nombre_sucursal.'<br>';
            echo 'telefono_sucursal:    '.$sucursal->telefono_sucursal.'<br>';
            echo 'direccion_sucursal:   '.$sucursal->direccion_sucursal.'<br>';
            echo 'departamento:         '.$sucursal->departamento.'<br>';
        }

        }
    }
}
?>