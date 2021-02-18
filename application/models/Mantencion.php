<?php 
class Mantencion extends CI_Model{
    function __construct(){
        $this->load->database();
    }

    public function create($datos,$datadoc){
        
        $datos = array(
            
            'fecha' => $datos['fecha'],
            'id_vehiculo' => $datos['id_vehiculo'],
            'kilometraje' => $datos['kilometraje'],
            'servicio' => $datos['servicio'],
            'id_personal' => $datos['id_personal'],
            'mecanico' => $datos['mecanico'],
            'taller' => $datos['taller'],
            'detalle' => $datos['detalle'],
            'doc_adj' => $datadoc['upload_data']['file_name'],
            'total_m' => $datos['total_m'],
          
        );
        if(!$this->db->insert('mantencion', $datos)){
            return false;
        }
        return true;
    }

      /////////////////////////////////////////////
    //ESTE ES EL SELECT DE LA TABLA MANTENCIONES//

    var $select_column = array("mantencion.id_mantencion", "vehiculo.patente", "mantencion.fecha", "personal.nombrecompleto", "mantencion.taller", "mantencion.mecanico", "mantencion.total_m", "mantencion.detalle");  
    var $table = array("mantencion","personal","vehiculo");  
    var $wheree = "mantencion.id_personal =  personal.id_personal AND mantencion.id_vehiculo = vehiculo.id_vehiculo";
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
       $this->db->where("mantencion.id_personal =  personal.id_personal AND mantencion.id_vehiculo = vehiculo.id_vehiculo");
       return $this->db->count_all_results();  
  }  
//ESTE ES EL SELECT COUNT PARA TENER LOS TOTALES DE LOS ID Y SABER CUANTOS REGISTROS HAY//
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
public function ObtenerListaMantenciones(){
     $query = $this->db
             ->select("COUNT(id_mantencion) as total") # También puedes poner * si quieres seleccionar todo
             ->from("mantencion")
             ->get();
     
     return $query->result_array();
 }
//Este es para obtener el archivo que se descargara de la bd osea se obtiene el nombre mas que nada
//El archivo de libro de mantenciones
 function getRows($params = array()){
     $this->db->select('doc_adj');
     $this->db->from('mantencion');
     if(!empty($params['id'])){
         $this->db->where('id_mantencion',$params['id']);
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
    