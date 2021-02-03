<?php 
class Combustible extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function create($datos){
        $datos = array(
            
          'id_vehiculo' => $datos['id_vehiculo'],
          'fecha' => $datos['fecha'],
            'conductor' => $datos['conductor'],
            'estacion' => $datos['estacion'],
            'litros' => $datos['litros'],
            'valor' => $datos['valor'],
            'doc_ad' => $datos['doc_ad'],
         
          
        );
        if(!$this->db->insert('combustible', $datos)){
            return false;
        }
        return true;
    }



    var $select_column = array("combustible.id_combustible", "combustible.fecha", "vehiculo.patente", "combustible.conductor", "combustible.estacion", "combustible.litros", "combustible.valor");  
    var $table = array("combustible", "vehiculo");  
    var $wheree = "combustible.id_vehiculo = vehiculo.id_vehiculo";
    var $order_column = array("combustible.id_combustible", "combustible.fecha", "vehiculo.patente", "combustible.conductor", "combustible.estacion", "combustible.litros", "combustible.valor");  
 

  
    function make_query_cvehiculo()  
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
            $this->db->order_by('id_combustible', 'ASC');    

       }  
  }  
  function make_datatables_cvehiculo(){  
       $this->make_query_cvehiculo();  
       if ($_POST["length"] != -1) {
        $this->db->limit($_POST['length'], $_POST['start']);
    } 
       $query = $this->db->get();  
       return $query->result(); 
        
  }  
  function get_filtered_data_cvehiculo(){  
       $this->make_query_cvehiculo();  
       $query = $this->db->get();  
       return $query->num_rows();  
  }       
  function get_all_data_cvehiculo()  
  {  
       $this->db->select($this->select_column);  
       $this->db->from($this->table);  
       $this->db->where("combustible.id_vehiculo = vehiculo.id_vehiculo");
       return $this->db->count_all_results();  
  }  


  ///////////////////////////////////////////////
  public function Obtener_BoletasC(){
     $query = $this->db
             ->select("COUNT(id_combustible) as total") # También puedes poner * si quieres seleccionar todo
             ->from("combustible")
             ->get();
     
     return $query->result_array();
 }

}

    