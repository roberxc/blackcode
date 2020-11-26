<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operacion extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
		$this->load->library('Mobile_Detect');
		$this->load->model('OperacionesModel');
		
	 }

	public function index()
	{
		$detect = new CI_Mobile_Detect();

		$data ['dispositivo'] = 'Mobil';
		$data ['tipos_trabajos'] = $this->OperacionesModel->ObtenerTipostrabajos();
		
		$this->load->view('Trabajador/index',$data);

				/*
		if ($detect->isMobile()) {
			// Detecta si es un móvil
			$data ['dispositivo'] = 'Mobil';
			$this->load->view('Trabajador/index');
		}else{
			$data ['activo'] = 8;
			$data ['activomenu'] = 1;
			$data ['dispositivo'] = 'PC';
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_trabajador',$data);
			$this->load->view('Trabajador/OperacionPC',$data);
			$this->load->view('layout/footer');
		}*/
	}

	public function ModificarPlanilla(){
		$data ['tipos_trabajos'] = $this->OperacionesModel->ObtenerTipostrabajos();
		$this->load->view('Trabajador/planilla_modificacion',$data);
	}

	public function trabajoDiario()
	{
		$set_data = $this->session->all_userdata();
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activo'] = 3;
			//Lista de trabajos realizados
			$data ['trabajos_realizados'] = $this->OperacionesModel->ObtenerTrabajosRealizados();
			
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('TrabajoDiario/TrabajoDiario',$data);
			$this->load->view('layout/footer');

		}
	}

	public function stockBodega()
	{
		$set_data = $this->session->all_userdata();
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 2) {
			$data ['activo'] = 9;
			$data ['activomenu'] = 2;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_trabajador',$data);
			$this->load->view('Trabajador/StockBodega');
			$this->load->view('layout/footer');

		}

		else if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activo'] = 9;
			$data ['activomenu'] = 1;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('Trabajador/StockBodega');
			$this->load->view('layout/footer');

		}
	}

	public function trabajosRealizados()
	{
		$set_data = $this->session->all_userdata();
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 2) {
			$data ['activo'] = 10;
			$data ['activomenu'] = 1;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_trabajador',$data);
			$this->load->view('Trabajador/TrabajosRealizados');
			$this->load->view('layout/footer');

		}
	}

	//Metodos con base de datos
	public function obtenerCodigoServicio(){
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post(); //Datos que vienen por POST
			$res = $this->OperacionesModel->consultarCodigoServicio($ajax_data['codigo_servicio']);

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

	public function ingresarTrabajoDiario(){
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post(); //Datos que vienen por POST
			$res = $this->OperacionesModel->registrarTrabajoDiario($ajax_data);
			if($res){
				$data = array('response' => "success", 'message' => $res);
			}else{
				$data = array('response' => "success", 'message' => "Fallo el egreso!");
			}
			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}
	}


	//Registro de gastos varios
	public function validarTrabajoDiario(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			
			$this->form_validation->set_rules('fecha_trabajo', '"Fecha trabajo"', 'required');
			$this->form_validation->set_rules('nombre_proyecto', '"Nombre proyecto"', 'required');
			$this->form_validation->set_rules('persona_cargo', '"Persona a cargo"', 'required');
			$this->form_validation->set_rules('suma_asignada', '"Suma asignada"', 'numeric|greater_than[0]|required');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			if ($this->form_validation->run() == FALSE) {
				$errores = validation_errors();
				$data = array('response' => "error", 'message' => $errores);
			} else {
				$data = array('response' => "success", 'message' => 'Ingreso correcto!');
				
			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

	}
}
