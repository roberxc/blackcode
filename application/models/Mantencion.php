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
            'encargado' => $datos['encargado'],
            'nombremecanico' => $datos['nombremecanico'],
            'taller' => $datos['taller'],
            'detalle' => $datos['detalle'],
            'totalmantencion' => $datos['totalmantencion'],

          
        );
        if(!$this->db->insert('b', $datos)){
            return false;
        }
        return true;
    }
    
}