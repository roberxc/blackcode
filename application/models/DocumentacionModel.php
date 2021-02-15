<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class DocumentacionModel extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public function ObtenerDocumentosPermamentes(){
		$query = $this->db
		        ->select("d.id_documentos as iddocumentacion, d.nombre as nombre, d.fecha as fechasubida, d.ubicacion as ubicacion") # También puedes poner * si quieres seleccionar todo
				->from("documentacion_empresa d")
				->where('d.tipo', 0)
				->get();
    	return $query->result();
	}

	public function ObtenerDocumentosActualizables(){
		$query = $this->db
		        ->select("d.id_documentos as iddocumentacion, d.nombre as nombre, d.fecha as fechasubida, d.ubicacion as ubicacion,d.fechalimite as fechalimite") # También puedes poner * si quieres seleccionar todo
				->from("documentacion_empresa d")
				->where('d.tipo', 1)
				->get();
    	return $query->result();
	}

	public function FiltroDocumentacionPermamente($nombre,$fecha){
		if(empty($nombre)){
			
			$query = $this->db
				->select("d.id_documentos as iddocumentacion, d.nombre as nombre, d.fecha as fechasubida, d.ubicacion as ubicacion") # También puedes poner * si quieres seleccionar todo
				->from("documentacion_empresa d")
				->where('d.tipo', 0)
				->like("d.fecha",$fecha,"both")
				->get();

		}else if(empty($fecha)){
			
			$query = $this->db
				->select("d.id_documentos as iddocumentacion, d.nombre as nombre, d.fecha as fechasubida, d.ubicacion as ubicacion") # También puedes poner * si quieres seleccionar todo
				->from("documentacion_empresa d")
				->where('d.tipo', 0)
				->like("d.nombre", $nombre,"both")
				->get();
		}else{
			
			$query = $this->db
				->select("d.id_documentos as iddocumentacion, d.nombre as nombre, d.fecha as fechasubida, d.ubicacion as ubicacion") # También puedes poner * si quieres seleccionar todo
				->from("documentacion_empresa d")
				->where('d.tipo', 0)
				->group_start()
				->like("d.nombre", $nombre,"both")
				->or_like("d.fecha",$fecha,"both")
				->group_end()
				->get();
		}
		
		
		return $query->result();
	}

	public function FiltroDocumentacionActualizable($nombre,$fecha){
		if(empty($nombre)){
			
			$query = $this->db
				->select("d.id_documentos as iddocumentacion, d.nombre as nombre, d.fecha as fechasubida, d.ubicacion as ubicacion,d.fechalimite as fechalimite") # También puedes poner * si quieres seleccionar todo
				->from("documentacion_empresa d")
				->where('d.tipo', 1)
				->like("d.fecha",$fecha,"both")
				->get();

		}else if(empty($fecha)){
			
			$query = $this->db
				->select("d.id_documentos as iddocumentacion, d.nombre as nombre, d.fecha as fechasubida, d.ubicacion as ubicacion,d.fechalimite as fechalimite") # También puedes poner * si quieres seleccionar todo
				->from("documentacion_empresa d")
				->where('d.tipo', 1)
				->like("d.nombre", $nombre,"both")
				->get();
		}else{
			
			$query = $this->db
				->select("d.id_documentos as iddocumentacion, d.nombre as nombre, d.fecha as fechasubida, d.ubicacion as ubicacion,d.fechalimite as fechalimite") # También puedes poner * si quieres seleccionar todo
				->from("documentacion_empresa d")
				->where('d.tipo', 1)
				->group_start()
				->like("d.nombre", $nombre,"both")
				->or_like("d.fecha",$fecha,"both")
				->group_end()
				->get();
		}
		
		
		return $query->result();
	}

	//Tabla de documentacion permamente
	function make_datatables_documentacion($tipo){
        $this->make_query_documentacion($tipo);
        if ($_POST["length"] != - 1){
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();

    }

    var $tabladocpermamente = array(
		"documentacion_empresa",
    );
    var $select_columna_docpermamente = array(
		"id_documentos as id",
		"fecha",
		"fechalimite",
		"nombre",
    );

    var $order_columna_docpermamente = array(
        "id_documentos",
		"fecha",
		"fechalimite",
		"nombre",
    );

    var $where_docpermamente = "tipo = 0";

    function make_query_documentacion($tipo){
        $this->db->select($this->select_columna_docpermamente);
        $this->db->from($this->tabladocpermamente);
        $this->db->where("tipo",$tipo);

        if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ''){
            $this->db->group_start();
            $this->db->like("nombre", $_POST["search"]["value"]);
            $this->db->group_end();
        }
        if (isset($_POST["order"])){
            $this->db->order_by($this->order_columna_docpermamente[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        
        }else{
            $this->db->order_by('id_orden', 'ASC');
        }
    }

    function get_all_data_documentacion($tipo){
        $this->db->select($this->select_columna_docpermamente);
        $this->db->from($this->tabladocpermamente);


        return $this->db->count_all_results();
    }

    function get_filtered_data_documentacion($tipo){
        $this->make_query_documentacion($tipo);
        $query = $this->db->get();

        return $query->num_rows();
	}
	
	//Obtener informacion para descargar documentacion
	function getRows($params = array()){
        $this->db->select('ubicacion');
        $this->db->from('documentacion_empresa');
        if(!empty($params['id'])){
            $this->db->where('id_documentos',$params['id']);
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
	
	public function ObtenerDetalleDocActualizable($iddoc){
		$query = $this->db
				->select("id_documentos, nombre, fechalimite, ubicacion") # También puedes poner * si quieres seleccionar todo
				->from("documentacion_empresa")
				->where("id_documentos",$iddoc)
				->where("tipo",1)
				->get();
        // if (count($query->result()) > 0) {
        return $query->result();
        // }
    }


	public function ObtenerFechaDocActualizable(){
		$query = $this->db
				->select("fechalimite") # También puedes poner * si quieres seleccionar todo
				->from("documentacion_empresa")
				->where("tipo",1)
				->get();
        // if (count($query->result()) > 0) {
        return $query->result();
        // }
    }

	public function ObtenerNroDocActualizable($fechalimite){
		$query = $this->db
				->select("id_documentos") # También puedes poner * si quieres seleccionar todo
				->from("documentacion_empresa")
				->where("tipo",1)
				->where("fechalimite",$fechalimite)
				->get();
        // if (count($query->result()) > 0) {
        return $query->result();
        // }
    }

}

?>