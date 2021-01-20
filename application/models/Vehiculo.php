<?php 
class Vehiculo extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function create($datos){

        $datos_detalle = array(
            
            
          
            'tipo' => $datos['tipo'],
            'modelo' => $datos['modelo'],
            'marca' => $datos['marca'],
            'color' => $datos['color'],
            'tipomotor' => $datos['tipomotor'],
            
          
        );

        $this->db->insert('detalle_vehiculo', $datos_detalle);
		$id_detalle = $this->db->insert_id();

        $datos = array(
            
            
            'patente' => $datos['patente'],
            'ano' => $datos['ano'],
            'id_detalle_vehiculo' => $id_detalle,
           
            'gps' => $datos['gps'],
            
          
        );
        if(!$this->db->insert('vehiculo', $datos)){
            return false;
        }
        return true;
    }
    
}