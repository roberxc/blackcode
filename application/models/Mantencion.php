<?php 
class Mantencion extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function create($datos){
        
        $datos = array(
            
            'fecha' => $datos['fecha'],
            'id_vehiculo' => $datos['id_vehiculo'],
            'kilometraje' => $datos['kilometraje'],
            'servicio' => $datos['servicio'],
            'id_personal' => $datos['id_personal'],
            'mecanico' => $datos['mecanico'],
            'taller' => $datos['taller'],
            'detalle' => $datos['detalle'],
            'doc_adj' => $datos['doc_adj'],
            'total_m' => $datos['total_m'],
          
        );
        if(!$this->db->insert('mantencion', $datos)){
            return false;
        }
        return true;
    }

    public function ObtenerTotalVehiculos(){
        $query = $this->db
                ->select("COUNT(id_mantencion) as total") # También puedes poner * si quieres seleccionar todo
                ->from("mantencion")
                ->get();
        
        return $query->result_array();
    }
    
}