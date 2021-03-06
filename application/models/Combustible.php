<?php 
class Combustible extends CI_Model{
    function __construct(){
        $this->load->database();
    }
    public function create($datos,$datadoc){
        $datos = array(       
          'id_vehiculo' => $datos['id_vehiculo'],
          'fecha' => $datos['fecha'],
          'conductor' => $datos['conductor'],
          'estacion' => $datos['estacion'],
          'litros' => $datos['litros'],
          'valor' => $datos['valor'],
          'doc_adj' => $datadoc['upload_data']['file_name'],
        );

        if(!$this->db->insert('combustible', $datos)){
            return false;
        }
        return true;
    }
     ///////////////////////////////////////////////////////////
    //ESTE ES EL SELECT DE LA TABLA REGISTRO GASTO COMBUSTIBLE//

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


//ESTE ES EL SELECT COUNT PARA TENER LOS TOTALES DE LOS ID Y SABER CUANTOS REGISTROS HAY//
  public function Obtener_BoletasC(){
     $query = $this->db
             ->select("COUNT(id_combustible) as total") # También puedes poner * si quieres seleccionar todo
             ->from("combustible")
             ->get();
     
     return $query->result_array();
 }

 //Este es para obtener el archivo que se descargara de la bd osea se obtiene el nombre mas que nada
//El archivo de libro de combustible
function getRows($params = array()){
     $this->db->select('doc_adj');
     $this->db->from('combustible');
     if(!empty($params['id'])){
         $this->db->where('id_combustible',$params['id']);
         //get records
         $query = $this->db->get();
         $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
     }else{
         //set start and limit
         if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
             $this->db->limit($params['limit'],$params['start']);
         }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
             $this->db->limit($params['limit']);
         }
         //get records
         $query = $this->db->get();
         $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
     }
     //return fetched data
     return $result;
  }

}

    