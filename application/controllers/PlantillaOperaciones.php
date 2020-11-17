<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlantillaOperaciones extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('OperacionesModel');
	}


	public function index()
	{
		$data ['activo'] = 2;

		$data ['codigo'] = $_GET["codigo"];
		$data ['total_viaticos'] = $this->OperacionesModel->ObtenerTotalViaticos($data['codigo']);
		$this->load->view('Trabajador/planilla',$data);
		
	}

	public function registroGastoViaticos(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('vcena', 'Cena', 'numeric');
			$this->form_validation->set_rules('valmuerzo', 'Almuerzo', 'numeric');
			$this->form_validation->set_rules('vdesayuno', 'Desayuno', 'numeric');
			$this->form_validation->set_rules('vagua', 'Agua', 'numeric');
			$this->form_validation->set_rules('valojamiento', 'Alojamiento', 'numeric');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				$res = $this->OperacionesModel->ingresarGastosViaticos($ajax_data);
				
				if ($res) {
					$data = array('response' => "error", 'message' => "Viatico agregado correctamente!");
				}else{
					$data = array('response' => "success", 'message' => $res);
				}

			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

	}

	//Metodo para el registro de materiales durante el trabajo
	public function registroMaterialesCompradosDurante(){
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post();
			$res = $this->OperacionesModel->ingresarGastosViaticos($ajax_data);

			if ($res) {
				$data = array('response' => "error", 'message' => "Guardado exitosamente!");
			}else{
				$data = array('response' => "success", 'message' => $res);
			}
			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}
	}


}

?>
