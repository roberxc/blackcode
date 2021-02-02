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



    var $select_column = array( "id","patente");  
    var $table = array("com");  
    var $wheree = "id = patente";
    var $order_column = array("id","patente");  
 

  
    function make_query_vehiculo()  
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
            $this->db->order_by('id', 'ASC');    

       }  
  }  
  function make_datatables_vehiculo(){  
       $this->make_query_vehiculo();  
       if ($_POST["length"] != -1) {
        $this->db->limit($_POST['length'], $_POST['start']);
    } 
       $query = $this->db->get();  
       return $query->result(); 
        
  }  
  function get_filtered_data_vehiculo(){  
       $this->make_query_vehiculo();  
       $query = $this->db->get();  
       return $query->num_rows();  
  }       
  function get_all_data_vehiculo()  
  {  
       $this->db->select($this->select_column);  
       $this->db->from($this->table);  
       $this->db->where("id = detalle_vehiculo.patente");
       return $this->db->count_all_results();  
  }  

  public function ObtenerTotalCombustible(){
     $query = $this->db
             ->select("COUNT(id_vehiculo) as total") # También puedes poner * si quieres seleccionar todo
             ->from("vehiculo")
             ->get();
     
     return $query->result_array();
 }
}

    


