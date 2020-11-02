<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ControladorAdmin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('CajaChicaModel');
		$this->load->helper(array('form', 'url'));
	}

	public function CajaEgreso()
	{
		
		$data ['activo'] = 1;
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Dashboard/Egreso');
		$this->load->view('layout/footer');
	}

	public function CajaIngreso()
	{
		
		$data ['activo'] = 1;
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Dashboard/Ingreso');
		$this->load->view('layout/footer');
	}
	public function MenuCaja()
	{
		$data ['activo'] = 5;
		$data ['totalcajachica'] = $this->CajaChicaModel->obtenerTotalCajaChica();
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Dashboard/CajaChica');
		$this->load->view('layout/footer');
	}
	public function vueltocaja()
	{
		$data ['activo'] = 5;
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Dashboard/Vuelto');
		$this->load->view('layout/footer');
	}
	public function registroTrabajador()
	{
		
		$data ['activo'] = 6;
		$data ['activomenu'] = 2;
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/Registro');
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

	public function obtenerIngresosCajaChica(){
		if ($this->input->is_ajax_request()) {
			$posts = $this->CajaChicaModel->obtenerIngresos();
			echo json_encode($posts);
		} else {
			echo "'No direct script access allowed'";
		}

	}



}

?>