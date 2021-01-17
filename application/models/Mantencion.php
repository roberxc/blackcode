<?php 
class Mantencion extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function create($datos){
        $datos = array(
            
            'fecha' => $datos['fecha'],
            
            
          
        );
        if(!$this->db->insert('b', $datos)){
            return false;
        }
        return true;
    }
    
}