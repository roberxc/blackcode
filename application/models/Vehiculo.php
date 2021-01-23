<?php 
class Vehiculo extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function create($datos){

        $datos_detalle = array(
            
            
          
            'tipo' => $datos['tipo'],
            'modelo' => $datos['modelo'],
            'marca' => $datos['marca'],
            'color' => $datos['color'],
            'tipomotor' => $datos['tipomotor'],
            
          
        );

        $this->db->insert('detalle_vehiculo', $datos_detalle);
		$id_detalle = $this->db->insert_id();

        $datos = array(
            
            
            'patente' => $datos['patente'],
            'ano' => $datos['ano'],
            'id_detalle_vehiculo' => $id_detalle,
           
            'gps' => $datos['gps'],
            
          
        );
        if(!$this->db->insert('vehiculo', $datos)){
            return false;
        }
        return true;
    }
    













    /////////////////////////////////////////////////





    //ESTE ES EL SELECT DE LA TABLA GARAGE VEHICULOS

   
    var $select_column = array("vehiculo.id_vehiculo", "vehiculo.patente","detalle_vehiculo.marca","detalle_vehiculo.modelo","detalle_vehiculo.color","detalle_vehiculo.tipomotor");  
    var $table = array("detalle_vehiculo","vehiculo");  
    var $wheree = "vehiculo.id_detalle_vehiculo = detalle_vehiculo.id_detalle_vehiculo";
    var $order_column = array("vehiculo.id_vehiculo", "vehiculo.patente","detalle_vehiculo.marca","detalle_vehiculo.modelo","detalle_vehiculo.color","detalle_vehiculo.tipomotor");  

  
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
            $this->db->order_by('id_vehiculo', 'ASC');    

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
       $this->db->where("vehiculo.id_detalle_vehiculo = detalle_vehiculo.id_detalle_vehiculo");
       return $this->db->count_all_results();  
  }  
}