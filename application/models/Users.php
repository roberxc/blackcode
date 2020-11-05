<?php 
class Users extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function create($datos){
        $datos = array(
            'nombre_completo' => $datos['name'],
            'Rut' => $datos['rut'],
            'Telefono' => $datos['telefono'],
            'correo' => $datos['email'],
            'contrasena' => $datos['password'],
            'id_tipousuario' => $datos['tipo'],
            
        );
        if(!$this->db->insert('usuario', $datos)){
            return false;
        }
        return true;
    }
    
}


