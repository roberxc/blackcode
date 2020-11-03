<?php 
class Users extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function create($datos){
        $datos = array(
            'nombre_usuario' => $datos['nombre_usuario'],
            'correo' => $datos['correo'],
            'contrasena' => $datos['contrasena'],
            'id_tipousuario' => 1,
            
        );
        if(!$this->db->insert('usuario', $datos)){
            return false;
        }
        return true;
    }
    
}


