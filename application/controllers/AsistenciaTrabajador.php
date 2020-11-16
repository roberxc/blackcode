<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AsistenciaTrabajador extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
		$this->load->model('OperacionesModel');
		
	 }


	public function index()
	{
		$data ['activo'] = 2;
		$data ['codigo'] = $_GET["codigo"];
		$data ['lista_personal'] = $this->OperacionesModel->ObtenerListaPersonal($data['codigo']);
		
		$this->load->view('Trabajador/Asistencia',$data);
		
	}

	public function ingresarAsistencia(){
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post(); //Datos que vienen por POST
			$res = $this->OperacionesModel->registrarAsistenciaPersonal($ajax_data);
			if($res){
				$data = array('response' => "success", 'message' => $res);
			}else{
				$data = array('response' => "success", 'message' => "Egreso registrado correctamente!");
			}
			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}
	}
}

?>
