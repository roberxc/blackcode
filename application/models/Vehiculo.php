<?php 
class Vehiculo extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function create($datos){
        $datos = array(
            
            'patente' => $datos['patente'],
            'modelo' => $datos['modelo'],
            'marca' => $datos['marca'],
            'color' => $datos['color'],
            'ano' => $datos['ano'],
            'tipomotor' => $datos['tipomotor'],
            'gps' => $datos['gps'],
            
          
        );
        if(!$this->db->insert('a', $datos)){
            return false;
        }
        return true;
    }
    
}