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

  public function ObtenerNombrePersonal($idpersonal){
    $query = $this->db
            ->select("nombrecompleto,rut") # También puedes poner * si quieres seleccionar todo
            ->from("personal")
            ->where("id_personal",$idpersonal)
            ->get();
    
    return $query->result_array();
  }
}