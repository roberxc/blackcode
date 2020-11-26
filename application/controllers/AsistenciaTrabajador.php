<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AsistenciaTrabajador extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
		$this->load->model('OperacionesModel');
		
	 }

	public function Inicio($codigo,$tipo){
		$data ['activo'] = 2;
		$data ['codigo'] = $codigo;
		$data ['lista_personal'] = $this->OperacionesModel->ObtenerListaPersonal($data['codigo']);
		
		if($tipo == '0'){
			$this->load->view('Trabajador/Asistencia',$data);
		}else if($tipo == '1'){
			$data ['update'] = '1';
			$this->load->view('Trabajador/Asistencia',$data);
		}
	}

	public function ingresarAsistencia(){
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post(); //Datos que vienen por POST
			$res = $this->OperacionesModel->registrarAsistenciaPersonal($ajax_data);
			if($res){
				$data = array('response' => "success", 'message' => $res, 'estado' => "1");
			}else{
				$data = array('response' => "success", 'message' => "Egreso registrado correctamente!");
			}
			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}
	}

	public function actualizarAsistencia(){
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post(); //Datos que vienen por POST
			$res = $this->OperacionesModel->updateAsistenciaPersonal($ajax_data);
			if($res){
				$data = array('response' => "success", 'message' => $res, 'estado' => "1");
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
