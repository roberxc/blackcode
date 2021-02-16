<?php 
class Personal extends CI_Model{
    function __construct(){
        $this->load->database();
    }

  public function ObtenerListaPersonal(){
    $query = $this->db
            ->select("*") # También puedes poner * si quieres seleccionar todo
            ->from("personaltrabajo")
            ->get();
    
    return $query->result();
}
}