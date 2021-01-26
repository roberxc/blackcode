<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Proyecto_Estado extends CI_Model {

	function __construct(){
		parent::__construct();
    }
    
    

    //ESTE ES EL SELECT DE LA TABLA ESTADO PROYECTO

    var $tablaaa = array("proyectos");  
    var $select_columnaaa = array("id_proyectos", "nombre", "administrador", "fecha_inicio", "fecha_termino");  
    var $order_columnaaa = array("id_proyectos", "nombre", "administrador", "fecha_inicio", "fecha_termino");  
    //var $whereee = "material.ID_TipoBodega = tipobodega.ID_TipoBodega AND material.ID_TipoMaterial = tipomaterial.ID_TipoMaterial";

    function make_query_estado()  
    {  
         $this->db->select($this->select_columnaaa);  
         $this->db->from($this->tablaaa);  
         //$this->db->where($this->whereee);
         if(isset($_POST["search"]["value"]) && $_POST["search"]["value"] != '')  
         {  
              $this->db->like("Nombre", $_POST["search"]["value"]);  
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_columnaaa[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('id_proyectos', 'ASC');    

         }  
    }  
    function make_datatables_estado(){  
     $this->make_query_estado();  
     if ($_POST["length"] != -1) {
      $this->db->limit($_POST['length'], $_POST['start']);
     } 
     $query = $this->db->get();  
     return $query->result(); 
      
     }  
     function get_filtered_data_estado(){  
     $this->make_query_estado();  
     $query = $this->db->get();  
     return $query->num_rows();  
     }       
     function get_all_data_estado()
     {  
     $this->db->select($this->select_columnaaa);  
     $this->db->from($this->tablaaa);  
    // $this->db->where("material.ID_TipoBodega = tipobodega.ID_TipoBodega AND material.ID_TipoMaterial = tipomaterial.ID_TipoMaterial");
     return $this->db->count_all_results();  
     }  
  


}
?>