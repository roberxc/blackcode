<?php 

class Pic_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	public function getIDTrabajoDiario($codigoservicio){
		$query = $this->db
				->select("tb.ID_TrabajoDiario AS ID")
				->from("CodigoServicio c")
				->join("TrabajoDiario tb", "tb.ID_Codigo = c.ID_Codigo")
				->where("c.CodigoServicio",$codigoservicio)
				->get();
		return $query->result_array();

	}
	
	//fetch all pictures from db
	function get_all_pics(){
		$all_pics = $this->db->get('detalletrabajodiario');
		return $all_pics->result();
	}

	//save picture data to db
	function registro($data,$codigoservicio){
		echo'Codigo S: '.$codigoservicio;
		$idtrabajodiario = $this->getIDTrabajoDiario($codigoservicio);
		$data = array(
			'Imagen' => $data['pic_file'],
			'ID_TrabajoDiario' => $idtrabajodiario[0]['ID'],
		);
	
		return $this->db->insert("detalletrabajodiario", $data);
	}
	
	/*function store_pic_data($data){
		$insert_data['pic_title'] = $data['pic_title'];
		$insert_data['pic_desc'] = $data['pic_desc'];
		$insert_data['pic_file'] = $data['pic_file'];

		$query = $this->db->insert('pictures', $insert_data);
	}*/
}