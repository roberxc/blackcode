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

}

?>