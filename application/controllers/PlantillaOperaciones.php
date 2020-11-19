<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlantillaOperaciones extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('OperacionesModel');
	}

	public function Inicio($codigo){
		$data ['activo'] = 2;
		$data ['codigo'] = $codigo;
		$estadoplanilla = $this->OperacionesModel->ObtenerEstadoPlantilla($data['codigo']);
		//print_r($data['accion']);
		if(isset($estadoplanilla)){
			foreach($estadoplanilla as $row){
				$data ['asistencia_estado'] = $row->Asistencia;
				$data ['materialdurante_estado'] = $row->MaterialesDurante;	
				$data ['materialantes_estado'] = $row->MaterialesAntes;	
				$data ['materialbodega_estado'] = $row->MaterialesBodega;	
				$data ['gastocombustible_estado'] = $row->Combustible;	
				$data ['gastosvarios_estado'] = $row->GastosVarios;
				$data ['gastosviaticos_estado'] = $row->GastosViaticos;
				$data ['archivos_estado'] = $row->SubirArchivos;	
			}
		}
		
		$data ['total_viaticos'] = $this->OperacionesModel->ObtenerTotalViaticos($data['codigo']);
		$data ['tipos_combustible'] = $this->OperacionesModel->ObtenerTiposCombustibles();
		$data ['tipos_viaticos'] = $this->OperacionesModel->ObtenerTiposViaticos($data['codigo']);
		$data ['gasto_total'] = $this->OperacionesModel->ObtenerGastoTotal($data['codigo']);
		$data ['suma_asignada'] = $this->OperacionesModel->ObtenerSumaAsignada($data['codigo']);

		//Viaticos registrados
		$data ['viaticos_registrados'] = $this->OperacionesModel->ObtenerViaticos($data['codigo']);
		//Gastos varios registrados
		$data ['gastosvarios_registrados'] = $this->OperacionesModel->ObtenerGastosVarios($data['codigo']);

		//Materiales comprados
		$data ['materiales_registrado'] = $this->OperacionesModel->ObtenerViaticos($data['codigo']);

		$this->load->view('Trabajador/planilla',$data);
	}

	public function test(){
		redirect('/PlantillaOperaciones/test/', 'refresh');
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

	public function actualizarGastosCombustible(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('gasto_combustible', 'Gasto combustible', 'numeric');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				$res = $this->OperacionesModel->actualizarGastosCombustible($ajax_data);
				
				if ($res) {
					$data = array('response' => "success", 'message' => "Gasto de combustible modificado correctamente!");
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

	public function actualizarGastosViaticos(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
				$ajax_data = $this->input->post();
				
				if ($this->OperacionesModel->updateGastosViaticos($ajax_data)) {
					$data = array('response' => "success", 'message' => "Viaticos actualizados correctamente!");
				}else{
					$data = array('response' => "error", 'message' => "Error al actualizar viaticos");
				}


			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

	}

	public function actualizarGastosVarios(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
				$ajax_data = $this->input->post();
				
				if ($this->OperacionesModel->updateGastosVarios($ajax_data)) {
					$data = array('response' => "success", 'message' => "Gastos varios actualizados correctamente!");
				}else{
					$data = array('response' => "error", 'message' => "Error al actualizar viaticos");
				}


			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

	}

	//Metodo para el registro de materiales durante y antes el trabajo
	public function registroMaterialesCompradosAntes(){
		
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post();
			$res = $this->OperacionesModel->registrarGastoMateriales($ajax_data,1);
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

	//Metodo para el registro de materiales durante y antes el trabajo
	public function registroMaterialesCompradosDurante(){
		
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post();
			$res = $this->OperacionesModel->registrarGastoMateriales($ajax_data,0);
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
	//Metodo para actualizar compra de materiales durante y antes el trabajo
	public function actualizarMaterialesComprados(){
		
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post();
			$res = $this->OperacionesModel->registrarGastoMateriales($ajax_data,0);
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
