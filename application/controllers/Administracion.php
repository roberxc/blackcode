<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Administracion extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('CajaChicaModel');
		$this->load->model('OperacionesModel');
		$this->load->helper(array('form', 'url'));
		$this->load->model('Users');
	}

	public function informeEgresos(){
		
		$data ['activo'] = 10;
		$this->load->view('layout/nav');
     	$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/InformeEgresos');
		$this->load->view('layout/footer');
	}

	public function OrdenesCompra(){
		
		$data ['activo'] = 15;
		$this->load->view('layout/nav');
     	$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/Ordenes');
		$this->load->view('layout/footer');
	}

	public function CajaEgreso()
	{
		
		$data ['activo'] = 5;
		$this->load->view('layout/nav');
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/Egreso');
		$this->load->view('layout/footer');
	}

	public function CajaIngreso()
	{
		
		$data ['activo'] = 5;
		$data['include_css'] = array("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css");
		$this->load->view('layout/nav');
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/Ingreso',$data);
		$this->load->view('layout/footer');
	}
	public function MenuCaja()
	{
		$data ['activo'] = 5;
		$data ['totalcajachica'] = $this->CajaChicaModel->obtenerTotalCajaChica();
		$this->load->view('layout/nav');
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/CajaChica');
		$this->load->view('layout/footer');
	}
	public function vueltocaja()
	{
		$data ['activo'] = 5;
		$this->load->view('layout/nav');
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/Vuelto');
		$this->load->view('layout/footer');
	}
	public function registroTrabajador(){
		$data ['activo'] = 6;
		$data ['activomenu'] = 2;
		$this->load->view('layout/nav');
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/GestionCuentas');
		$this->load->view('layout/footer');
	}

	//Metodos para registro con base de datos
	public function ingresoCajaChica(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('montoingreso', 'Monto', 'required');
			$this->form_validation->set_rules('fechaingreso', 'Fecha', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();

				if ($this->CajaChicaModel->registroIngreso($ajax_data['fechaingreso'],$ajax_data['montoingreso'])) {
					$data = array('response' => "success", 'message' => "Monto ingresado correctamente!");
				} else {
					$data = array('response' => "error", 'message' => "Falló el ingreso");
				}
			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

	}

	public function egresoCajaChica(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('montoegreso', 'Monto', 'required|numeric|greater_than[0]');
			$this->form_validation->set_rules('fechaegreso', 'Fecha', 'required');
			$this->form_validation->set_rules('destinatario', 'Destinatario', 'required');
			$total = $this->CajaChicaModel->obtenerTotalCajaChica();
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				if($ajax_data['montoegreso']<=$total[0]->Balance){
					if ($this->CajaChicaModel->registroEgreso($ajax_data['fechaegreso'],abs($ajax_data['montoegreso']),
						$ajax_data['destinatario'],$ajax_data['detalle'])) {
					$data = array('response' => "success", 'message' => "Egreso registrado correctamente!");
					} else {
						$data = array('response' => "error", 'message' => "Falló el ingreso");
					}
				}else{
					$data = array('response' => "error", 'message' => "El monto ingresado es mayor al total de la caja chica");
				}
			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

	}

	public function obtenerIngresosCajaChica(){
		if ($this->input->is_ajax_request()) {
			$posts = $this->CajaChicaModel->obtenerIngresos();
			echo json_encode($posts);
		} else {
			echo "'No direct script access allowed'";
		}

	}

	public function obtenerEgresosCajaChica(){
		if ($this->input->is_ajax_request()) {
			$posts = $this->CajaChicaModel->obtenerEgresos();
			echo json_encode($posts);
		} else {
			echo "'No direct script access allowed'";
		}
	}

	public function obtenerVueltosCajaChica(){
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post();
			$res = $this->CajaChicaModel->obtenerVueltos($ajax_data['fecha_vuelto']);
			echo json_encode($res);
		} else {
			echo "'No direct script access allowed'";
		}
	}

	//Metodos para la gestion de cuentas, registro de cuentas
	public function registroCuentas(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('name', 'Nombre completo', 'required');
			$this->form_validation->set_rules('rut', 'Rut', 'required');
			$this->form_validation->set_rules('telefono', 'Telefono', 'required');
			$this->form_validation->set_rules('email', 'Correo', 'required|valid_email');
			$this->form_validation->set_rules('tipo', 'Tipo', 'required');
			$this->form_validation->set_rules('password', 'Contraseña', 'required');
			$this->form_validation->set_rules('password_confirm', 'Confirmar contraseña', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				
				if (!$this->Users->create($ajax_data)) {
					$data = array('response' => "error", 'message' => "Falló el registro");
				}else{
					$data = array('response' => "success", 'message' => "Cuenta creada correctamente!");
				}

			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

	}

	public function registroVuelto(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('vuelto', 'Vuelto', 'required|numeric');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				if($ajax_data['vuelto_asignado']==$ajax_data['monto_asignado']){
					$data = array('response' => "error", 'message' => "Falló el registro de vuelto");

				}else if($ajax_data['vuelto']<=$ajax_data['monto_asignado'] && $ajax_data['vuelto_asignado']==0){
					
					if (!$this->CajaChicaModel->actualizarVuelto($ajax_data['vuelto'],$ajax_data['fecha'],false,0)) {
						$data = array('response' => "error", 'message' => "Falló el registro de vuelto");
					}else{
						$data = array('response' => "success", 'message' => "Vuelto ingresado correctamente!");
					}


				}else if($ajax_data['vuelto_asignado']>0){

					$res = $ajax_data['vuelto_asignado'] + $ajax_data['vuelto'];
					
					if (!$this->CajaChicaModel->actualizarVuelto($res,$ajax_data['fecha'],true,$ajax_data['vuelto'])) {
						$data = array('response' => "error", 'message' => "Falló el registro de vuelto");
					}else{
						$data = array('response' => "success", 'message' => "Vuelto ingresado correctamente!");
					}


				}else{
					$data = array('response' => "error", 'message' => "El vuelto ingresado es mayor al monto asignado");
				}


			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

	}

	public function obtenerEstadisticasEgresos(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('fecha_inicial', 'Fecha', 'required');
			$this->form_validation->set_rules('fecha_termino', 'Fecha', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
				echo json_encode($data);
			} else {
				$ajax_data = $this->input->post();
				$fechainicio = $ajax_data['fecha_inicial'];
				$fechatermino = $ajax_data['fecha_termino'];
				$this->CajaChicaModel->generarEstadisticasEgresos($fechainicio,$fechatermino);
			}
		} else {
			echo "'No direct script access allowed'";
		}

	}


	public function obtenerTrabajosRealizadosPorCodigo(){
		$texto = $this->input->post('texto');
		$resultado = $this->OperacionesModel->ObtenerPlanillasRealizadas($texto);
		echo json_encode($resultado);
	}
}

?>