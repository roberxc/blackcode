<?php 
class Vehiculo extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function create($datos){
        $datos = array(
            
            'patente' => $datos['patente'],
            'modelo' => $datos['modelo'],
          
        );
        if(!$this->db->insert('a', $datos)){
            return false;
        }
        return true;
    }
    
}