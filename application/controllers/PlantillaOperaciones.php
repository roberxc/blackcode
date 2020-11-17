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
		$data ['tipos_combustible'] = $this->OperacionesModel->ObtenerTiposCombustibles();
		$data ['tipos_viaticos'] = $this->OperacionesModel->ObtenerTiposViaticos($data['codigo']);
		$data ['gasto_total'] = $this->OperacionesModel->ObtenerGastoTotal($data['codigo']);
		$data ['suma_asignada'] = $this->OperacionesModel->ObtenerSumaAsignada($data['codigo']);
		$this->load->view('Trabajador/planilla',$data);
		
	}

	public function registroGastosCombustible(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('gasto_combustible', 'Gasto combustible', 'numeric');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				$res = $this->OperacionesModel->registrarGastosCombustible($ajax_data);
				
				if ($res) {
					$data = array('response' => "success", 'message' => "Combustible agregado correctamente!");
				}else{
					$data = array('response' => "error", 'message' => $res);
				}

			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

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
					$data = array('response' => "success", 'message' => "Viaticos agregado correctamente!");
				}else{
					$data = array('response' => "error", 'message' => $res);
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
			$res = $this->OperacionesModel->registrarMaterialesDurante($ajax_data);
			if ($res) {
				$data = array('response' => "success", 'message' => "Guardado exitosamente!");
			}else{
				$data = array('response' => "error", 'message' => $res);
			}
			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}
	}

	//Registro de gastos varios
	public function registroGastosVarios(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('gasto_peaje', 'Peaje', 'numeric|greater_than[0]');
			$this->form_validation->set_rules('gasto_estacionamiento', 'Estacionamiento', 'numeric|greater_than[0]');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if ($this->form_validation->run() == FALSE) {
				
				$errores = validation_errors();
				$data = array('response' => "error", 'message' => $errores);
			} else {
				$ajax_data = $this->input->post();	
				if ($this->OperacionesModel->registrarGastosVarios($ajax_data)) {
					$data = array('response' => "success", 'message' => 'Gastos varios ingresado correctamente');
				}else{
					$data = array('response' => "error", 'message' => 'Error en el registro');
				}

				
			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

	}

}

?>
