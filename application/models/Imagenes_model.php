<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imagenes_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	public function getIDTrabajoDiario($codigoservicio){
		$query = $this->db
				->select("tb.ID_TrabajoDiario AS ID")
				->from("CodigoServicio c")
				->join("TrabajoDiario tb", "dt.ID_Codigo = c.ID_Codigo")
				->where("c.CodigoServicio",$codigoservicio)
				->get();
		return $query->result_array();

	}

	public function registroDetalle($datos)
	{
		$idtrabajodiario = $this->getIDTrabajoDiario($datos['codigo_servicio']);
		$data = array(
			'Imagen' => $datos['name'],
			'ID_TrabajoDiario' => $idtrabajodiario[0]['ID'],
		);
	
		return $this->db->insert("detalletrabajodiario", $data);

	}
	
}