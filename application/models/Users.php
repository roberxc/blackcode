<?php 
class Users extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function create($datos){

        $password_cifrado = password_hash($datos['password'], PASSWORD_DEFAULT, array("cost"=>12));

        $datos = array(
            'nombre_completo' => $datos['name'],
            'Rut' => $datos['rut'],
            'Telefono' => $datos['telefono'],
            'correo' => $datos['email'],
            'contrasena' => $password_cifrado,
            'id_tipousuario' => $datos['tipo'],
            
        );
        if(!$this->db->insert('usuario', $datos)){
            return false;
        }
        return true;
    }
    
}


