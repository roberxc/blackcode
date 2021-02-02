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


    var $select_column = array("mantencion.id_mantencion",  "vehiculo.patente", "mantencion.fecha", "personaltrabajo.nombrecompleto", "mantencion.taller", "mantencion.mecanico", "mantencion.total_m", "mantencion.detalle");  
    var $table = array("mantencion","personaltrabajo", "vehiculo");  
    var $wheree = "mantencion.id_personal =  personaltrabajo.id_personaltrabajo AND mantencion.id_vehiculo = vehiculo.id_vehiculo";
    var $order_column = array("mantencion.id_mantencion",  "vehiculo.patente", "mantencion.fecha", "mantencion.nombrecompleto", "mantencion.taller", "mantencion.mecanico", "mantencion.total_m", "mantencion.detalle");  
 

  
    function make_query_mvehiculo()  
  {  
       $this->db->select($this->select_column);  
       $this->db->from($this->table);  
       $this->db->where($this->wheree);
       if(isset($_POST["search"]["value"]) && $_POST["search"]["value"] != '')  
       {  
            $this->db->like("patente", $_POST["search"]["value"]);  
       }  
       if(isset($_POST["order"]))  
       {  
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
       }  
       else  
       {  
            $this->db->order_by('id_mantencion', 'ASC');    

       }  
  }  
  function make_datatables_mvehiculo(){  
       $this->make_query_mvehiculo();  
       if ($_POST["length"] != -1) {
        $this->db->limit($_POST['length'], $_POST['start']);
    } 
       $query = $this->db->get();  
       return $query->result(); 
        
  }  
  function get_filtered_data_mvehiculo(){  
       $this->make_query_mvehiculo();  
       $query = $this->db->get();  
       return $query->num_rows();  
  }       
  function get_all_data_mvehiculo()  
  {  
       $this->db->select($this->select_column);  
       $this->db->from($this->table);  
       $this->db->where("mantencion.id_personal =  personaltrabajo.id_personaltrabajo AND mantencion.id_vehiculo = vehiculo.id_vehiculo");
       return $this->db->count_all_results();  
  }  
//////////////////////////////////
  public function ObtenerVehiculos(){
    $query = $this->db
            ->select("id_vehiculo,patente") # También puedes poner * si quieres seleccionar todo
            ->from("vehiculo")
            ->get();
    
    return $query->result();
}
public function ObtenerTotalVehiculos(){
    $query = $this->db
            ->select("COUNT(id_vehiculo) as total") # También puedes poner * si quieres seleccionar todo
            ->from("vehiculo")
            ->get();
    
    return $query->result_array();
}
}
    
