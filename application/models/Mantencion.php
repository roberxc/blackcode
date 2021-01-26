<?php 
class Mantencion extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function create($datos){
        $datos = array(
            
            'fecha' => $datos['fecha'],
            'patente' => $datos['patente'],
            'kilometraje' => $datos['kilometraje'],
            'servicio' => $datos['servicio'],
            'nencargado' => $datos['nencargado'],
            'nmecanico' => $datos['nmecanico'],
            'taller' => $datos['taller'],
            'detalle' => $datos['detalle'],
            'doc_adj' => $datos['doc_adj'],
            'total_m' => $datos['total_m'],
          
        );
        if(!$this->db->insert('b', $datos)){
            return false;
        }
        return true;
    }
    
}