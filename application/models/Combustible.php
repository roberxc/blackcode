<?php 
class Combustible extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function create($datos){
        $datos = array(
            
            'fecha' => $datos['fecha'],
            'patente' => $datos['patente'],
            'conductor' => $datos['conductor'],
            'estacion' => $datos['estacion'],
            'litros' => $datos['litros'],
            'valor' => $datos['valor'],
            'doc_ad' => $datos['doc_ad'],
         
          
        );
        if(!$this->db->insert('com', $datos)){
            return false;
        }
        return true;
    }
    
}