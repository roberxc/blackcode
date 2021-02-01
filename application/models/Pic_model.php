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

	public function getIDProveedor($rut){
		return $this->ProveedoresModel->getIDProveedor($rut);

	}

	function subirFactura($data,$fecha,$nroorden,$nrofactura){
		$idordenquery = $this->getIdOrden($nroorden);
		$data = array(
			"fecha" => $fecha,
			"nrofactura" => $nrofactura,
			"ubicaciondocumento" => $data['upload_data']['file_name'],
			"id_orden" => $idordenquery[0]['id_orden'],
		);
		return $this->db->insert("facturas", $data);
	}

	function subirComprobante($data,$fecha,$detalle,$nrodocumento,$nrofactura){
		$data = array(
			"nrodocumento" => $nrodocumento,
			"fecha" => $fecha,
			"detalle" => $detalle,
			"ubicaciondocumento" => $data['upload_data']['file_name'],
			"id_factura" => $nrofactura,
		);
		return $this->db->insert("documento_pago", $data);
	}

	//Obtener id de orden
	public function getIdOrden($nroorden){
		$query = $this->db->select("id_orden") # También puedes poner * si quieres seleccionar todo
				->from("ordenes")
				->where('nroorden', $nroorden);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	/*function store_pic_data($data){
		$insert_data['pic_title'] = $data['pic_title'];
		$insert_data['pic_desc'] = $data['pic_desc'];
		$insert_data['pic_file'] = $data['pic_file'];

		$query = $this->db->insert('pictures', $insert_data);
	}*/
}