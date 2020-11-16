<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imagenes_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	
	public function getIDTrabajoDiario(){
		$query = $this->db
				->select("*")
				->from("detalletrabajodiario dt")
				->join("TrabajoDiario tb", "dt.ID_DetalleTrabajo = tb.ID_TrabajoDiario")
				->get();
		return $query->result_array();

	}

	public function registroDetalle(string $datos){
		$data = array(
			'Imagen' => $datos,
			'ID_TrabajoDiario' => $insert_id
		);
	
		return $this->db->insert('detalletrabajodiario', $data);

	}
	public function guardar($datos)
	{
		return $this->db->insert("Imagen", $datos);
	}
}