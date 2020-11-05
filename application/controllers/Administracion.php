<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Administracion extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('CajaChicaModel');
		$this->load->helper(array('form', 'url'));
		$this->load->model('Users');
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
		$this->load->view('layout/nav');
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/Ingreso');
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
			$posts = $this->CajaChicaModel->obtenerVueltos();
			echo json_encode($posts);
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
			$this->form_validation->set_rules('vuelto', 'Vuelto', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				
				if (!$this->CajaChicaModel->actualizarVuelto($ajax_data['vuelto'],$ajax_data['fecha'])) {
					$data = array('response' => "error", 'message' => "Falló el registro de vuelto");
				}else{
					$data = array('response' => "success", 'message' => "Vuelto ingresado correctamente!");
				}

			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

	}



}

?>