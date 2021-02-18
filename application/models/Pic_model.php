<?php 

class Pic_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->model('ProveedoresModel');
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

	function subirArchivoBD($data,$codigoservicio){
		$idtrabajodiario = $this->getIDTrabajoDiario($codigoservicio);
		$data = array(
			"ID_TrabajoDiario" => $idtrabajodiario[0]['ID'],
			"Imagen" => $data['upload_data']['file_name'],
		);
		return $this->db->insert("detalletrabajodiario", $data);
	}

	function subirDocumentacionPermamente($data,$namedocumento){
		$data = array(
			"nombre" => $namedocumento,
			"fecha" => date("d/m/Y"),
			"ubicacion" => $data['upload_data']['file_name'],
			"fechalimite" => 'No aplica',
			"tipo" => 0,
		);
		return $this->db->insert("documentacion_empresa", $data);
	}

	function subirDocumentacionActualizable($data,$namedocumento,$fechalimite){
		$data = array(
			"nombre" => $namedocumento,
			"fecha" => date("d/m/Y"),
			"ubicacion" => $data['upload_data']['file_name'],
			"fechalimite" => $fechalimite,
			"tipo" => 1,
		);
		return $this->db->insert("documentacion_empresa", $data);
	}

	function updateDocumentacionActualizable($data,$namedocumento,$fechalimite,$iddoc){
		$data = array(
			"nombre" => $namedocumento,
			"fecha" => date("d/m/Y"),
			"ubicacion" => $data['upload_data']['file_name'],
			"fechalimite" => $fechalimite,
			"tipo" => 1,
		);
        $this->db->where('id_documentos', $iddoc);
		return $this->db->update('documentacion_empresa',$data);
	}

	public function getIDProveedor($rut){
		return $this->ProveedoresModel->getIDProveedor($rut);

	}


	
}