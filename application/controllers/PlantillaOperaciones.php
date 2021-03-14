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
		if(isset($estadoplanilla)){
			foreach($estadoplanilla as $row){
				$data ['asistencia_estado'] = $row->asistencia;
				$data ['materialdurante_estado'] = $row->materialesdurante;	
				$data ['materialantes_estado'] = $row->materialesantes;	
				$data ['materialbodega_estado'] = $row->materialesbodega;	
				$data ['gastocombustible_estado'] = $row->combustible;	
				$data ['gastosvarios_estado'] = $row->gastosvarios;
				$data ['gastosviaticos_estado'] = $row->gastosviaticos;
				$data ['archivos_estado'] = $row->subirarchivos;	
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
		$data ['materiales_antes'] = $this->OperacionesModel->ObtenerMaterialesAntes($codigo);
		//Materiales bodega
		$data ['materiales_bodega'] = $this->OperacionesModel->ObtenerMaterialesBodega($codigo);

		//Archivos subidos
		$data ['archivos_subidos'] = $this->OperacionesModel->ObtenerArchivosSubidos($codigo);

		$this->load->view('Trabajador/planilla',$data);
	}

	public function ModificacionPlanilla($codigo){
		$data ['activo'] = 2;
		$data ['codigo'] = $codigo;
		//$data ['detalle_planilla'] = $this->OperacionesModel->ObtenerDetallePlanilla($data['codigo']);

		$data ['total_viaticos'] = $this->OperacionesModel->ObtenerTotalViaticos($codigo);
		$data ['tipos_combustible'] = $this->OperacionesModel->ObtenerTiposCombustibles();
		$data ['tipos_viaticos'] = $this->OperacionesModel->ObtenerTiposViaticos($codigo);
		$data ['gasto_total'] = $this->OperacionesModel->ObtenerGastoTotal($codigo);
		$data ['suma_asignada'] = $this->OperacionesModel->ObtenerSumaAsignada($codigo);

		//Viaticos registrados
		$data ['viaticos_registrados'] = $this->OperacionesModel->ObtenerViaticos($codigo);
		//Gastos varios registrados
		$data ['gastosvarios_registrados'] = $this->OperacionesModel->ObtenerGastosVarios($codigo);

		//Documentos de materiales comprados durante
		$data ['doc_materialesdurante'] = $this->OperacionesModel->ObtenerMaterialesDurante($codigo);

		//Materiales comprados
		$data ['materiales_antes'] = $this->OperacionesModel->ObtenerMaterialesAntes($codigo);
		//Materiales bodega
		$data ['materiales_bodega'] = $this->OperacionesModel->ObtenerMaterialesBodega($codigo);

		//Archivos subidos
		$data ['archivos_subidos'] = $this->OperacionesModel->ObtenerArchivosSubidos($codigo);

		//Detalle trabajo
		$data ['detalle_trabajo'] = $this->OperacionesModel->ObtenerDetalleTrabajo($codigo);

		$this->load->view('Trabajador/planilla_modificacion',$data);
	}

	public function ModificacionPlanillaInicio(){
		$data ['activo'] = 2;
		$set_data = $this->session->all_userdata();
		
		$data ['trabajos_realizados'] = $this->OperacionesModel->ObtenerPlanillaPorTrabajador($set_data['ID_Usuario']);

		$this->load->view('Trabajador/planilla_modificacion_inicio',$data);
	}

	//Validar codigo de servicio para modificar la planilla
	public function validarCodigoServicio(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('codigo_servicio', 'Codigo servicio', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				$res = $this->OperacionesModel->validarCodigoServicio($ajax_data['codigo_servicio']);
				
				if (count($res)==1) {
					$data = array('response' => "success", 'message' => "Codigo correcto!");
				}else{
					$data = array('response' => "error", 'message' => "Codigo incorrecto!");
				}

			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

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
			$res = $this->OperacionesModel->registrarGastoMaterialesAntes($ajax_data);
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
			$res = $this->OperacionesModel->registrarGastoMaterialesDurante($ajax_data);
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

	public function registroMaterialesBodega(){
		
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post();
			$res = $this->OperacionesModel->registrarMaterialesBodega($ajax_data);
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
	public function actualizarMaterialesCompradosDurante(){
		
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post();
			$res = $this->OperacionesModel->updateGastoMaterialesDurante($ajax_data);
			if ($res) {
				$data = array('response' => "success", 'message' => "Actualizado exitosamente!");
			}else{
				$data = array('response' => "error", 'message' => $res);
			}
			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}
	}

	public function actualizarMaterialesCompradosAntes(){
		
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post();
			$res = $this->OperacionesModel->updateGastoMaterialesAntes($ajax_data);
			if ($res) {
				$data = array('response' => "success", 'message' => "Actualizado exitosamente!");
			}else{
				$data = array('response' => "error", 'message' => $res);
			}
			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}
	}

	public function actualizarMaterialesBodega(){
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post();
			$res = $this->OperacionesModel->updateGastoMaterialesBodega($ajax_data);
			if ($res) {
				$data = array('response' => "success", 'message' => "Actualizado exitosamente!");
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

	public function eliminarArchivoSubido(){
		
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post();
			$res = $this->OperacionesModel->deleteArchivoSubido($ajax_data);
			if ($res) {
				$data = array('response' => "success", 'message' => "Eliminado exitosamente!");
			}else{
				$data = array('response' => "error", 'message' => $res);
			}
			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}
	}

	//Metodo para eliminar el documento de compra de materiales durante
	public function deleteDocumentoCompraMaterialDurante(){
		
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post();
			$res = $this->OperacionesModel->deleteDocCompraMaterialDurante($ajax_data);
			if ($res) {
				$data = array('response' => "success", 'message' => "Eliminado exitosamente!");
			}else{
				$data = array('response' => "error", 'message' => $res);
			}
			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}
	}

}

?>
