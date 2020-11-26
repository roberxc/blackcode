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

	public function obtenerPlanillaRealizada(){
		$ajax_data = $this->input->post(); //Datos que vienen por POST
		//Gastos varios registrados
		$gastosvarios_registrados = $this->OperacionesModel->ObtenerGastosVarios($ajax_data['codigo_servicio']);
		$materiales_durante = $this->OperacionesModel->ObtenerMaterialesDurante($ajax_data['codigo_servicio']);
		$materiales_antes = $this->OperacionesModel->ObtenerMaterialesAntes($ajax_data['codigo_servicio']);
		$viaticos_registrados = $this->OperacionesModel->ObtenerViaticos($ajax_data['codigo_servicio']);

		$detalle_trabajo = $this->OperacionesModel->ObtenerDetalleTrabajo($ajax_data['codigo_servicio']);

		$materiales_bodega = $this->OperacionesModel->ObtenerMaterialesBodega($ajax_data['codigo_servicio']);

		$response = "<div class='card card-default'>";
		$response .= "<div class='modal-body'>";
		$response .= "<div class='form-group'>";
		$response .= "<label for='exampleInputEmail1'>Detalle del Trabajo realizado</label>";
		foreach($detalle_trabajo as $row){
			$response .= "<textarea class='form-control' rows='6' disabled>".$row->Detalle."</textarea>";
		}
		$response .= "</div>";
		$response .= "<div class='form-group'>";
		$response .= "<label for='exampleInputEmail1'>Suma asignada</label>";
		foreach($detalle_trabajo as $row){
			$response .= "<input type='text' class='form-control' value=".$row->ValorAsignado." disabled>";
		}
		$response .= "</div>";
		$response .= "</div>";
		$response .= "</div>";
		$response .= "<div class='card card-default'>";
		$response .= "<div class='table-responsive'>";
		$response .= "<div class='modal-header'>";
		$response .= "<h5>Gastos viaticos</h5>";
		$response .= "</div>";
		$response .= "<table class='table table-striped'>";
		$response .= "<thead>";
		$response .= "<tr>";
		$response .= "<th>Almuerzo</th>";
		$response .= "<th>Agua</th>";
		$response .= "<th>Cena</th>";
		$response .= "<th>Alojamiento</th>";
		$response .= "<th>Desayuno</th>";
		$response .= "</tr>";
		$response .= "</thead>";
		$response .= "<tbody>";
		$response .= "<tr>";
		foreach($viaticos_registrados as $row){
			$response .= "<td>".$row->Valor."</td>";
		}
		$response .= "</tr>";
		$response .= "</tbody>";
		$response .= "</table>";
		$response .= "</div>";
		$response .= "</div>";
		$response .= "<div class='card card-default'>";
		$response .= "<div class='table-responsive'>";
		$response .= "<div class='modal-header'>";
		$response .= "<h5>Materiales comprados durante el trabajo</h5>";
		$response .= "</div>";
		$response .= "<table class='table table-striped'>";
		$response .= "<thead>";
		$response .= "<tr>";
		$response .= "<th>Material</th>";
		$response .= "<th>Cantidad</th>";
		$response .= "<th>Total $</th>";
		$response .= "</tr>";
		$response .= "</thead>";
		$response .= "<tbody>";
		foreach($materiales_durante as $row){
			$response .= "<tr>";
			$response .= "<th>".$row->Nombre."</th>";
			$response .= "<td>".$row->Cantidad."</td>";
			$response .= "<td>".$row->Valor."</td>";
			$response .= "</tr>";
		}
		$response .= "</tbody>";
		$response .= "</table>";
		$response .= "</div>";
		$response .= "</div>";
		$response .= "<div class='card card-default'>";
		$response .= "<div class='table-responsive'>";
		$response .= "<div class='modal-header'>";
		$response .= "<h5>Materiales comprados antes el trabajo</h5>";
		$response .= "</div>";
		$response .= "<table class='table table-striped'>";
		$response .= "<thead>";
		$response .= "<tr>";
		$response .= "<th>Material</th>";
		$response .= "<th>Cantidad</th>";
		$response .= "<th>Total $</th>";
		$response .= "</tr>";
		$response .= "</thead>";
		$response .= "<tbody>";
		foreach($materiales_antes as $row){
			$response .= "<tr>";
			$response .= "<th>".$row->Nombre."</th>";
			$response .= "<td>".$row->Cantidad."</td>";
			$response .= "<td>".$row->Valor."</td>";
			$response .= "</tr>";
		}
		$response .= "</tbody>";
		$response .= "</table>";
		$response .= "</div>";
		$response .= "</div>";
		$response .= "<div class='card card-default'>";
		$response .= "<div class='table-responsive'>";
		$response .= "<div class='modal-header'>";
		$response .= "<h5>Materiales bodega</h5>";
		$response .= "</div>";
		$response .= "<table class='table table-striped'>";
		$response .= "<thead>";
		$response .= "<tr>";
		$response .= "<th>Material</th>";
		$response .= "<th>Cantidad</th>";
		$response .= "</tr>";
		$response .= "</thead>";
		$response .= "<tbody>";
		foreach($materiales_bodega as $row){
			$response .= "<tr>";
			$response .= "<th>".$row->Nombre."</th>";
			$response .= "<td>".$row->Cantidad."</td>";
			$response .= "</tr>";
		}
		$response .= "</tbody>";
		$response .= "</table>";
		$response .= "</div>";
		$response .= "</div>";
		$response .= "<div class='card card-default'>";
		$response .= "<div class='table-responsive'>";
		$response .= "<div class='modal-header'>";
		$response .= "<h5>Combustible</h5>";
		$response .= "</div>";
		$response .= "<table class='table table-striped'>";
		$response .= "<thead>";
		$response .= "<tr>";
		$response .= "<th>Tipo</th>";
		$response .= "<th>Valor Total</th>";
		$response .= "</tr>";
		$response .= "</thead>";
		$response .= "<tbody>";

		$response .= "<tr>";
		$response .= "<th>Petroleo</th>";
		$response .= "<td>$1043</td>";
		$response .= "</tr>";
		
		$response .= "</tbody>";
		$response .= "</table>";
		$response .= "</div>";
		$response .= "</div>";
		$response .= "<div class='card card-default'>";
		$response .= "<div class='table-responsive'>";
		$response .= "<div class='modal-header'>";
		$response .= "<h5>Gastos varios</h5>";
		$response .= "</div>";
		$response .= "<table class='table table-striped'>";
		$response .= "<thead>";
		$response .= "<tr>";
		$response .= "<th>Nombre</th>";
		$response .= "<th>Valor</th>";
		$response .= "</tr>";
		$response .= "</thead>";
		$response .= "<tbody>";
		foreach($gastosvarios_registrados as $row){ 
			$response .= "<tr>";
			$response .= "<th>".$row->Nombre."</th>";
			$response .= "<td>".$row->Valor."</td>";
			$response .= "</tr>";
		}

		$response .= "</tbody>";
		$response .= "</table>";
		$response .= "</div>";
		$response .= "</div>";
		$response .= "<div class='card card-default'>";
		$response .= "<div class='modal-header'>";
		$response .= "<h5>Total</h5>";
		$response .= "</div>";
		$response .= "<div class='row'>";
		$response .= "<div class='col-md-3'>";
		$response .= "<div class='form-group'>";
		$response .= "<label>Gasto total</label>";
		$response .= "<div class='form-group'>";
		$response .= "<input type='text' class='form-control' disabled>";
		$response .= "</div>";
		$response .= "</div>";
		$response .= "</div>";
		$response .= "<div class='col-md-3'>";
		$response .= "<div class='form-group'>";
		$response .= "<label>Vuelto</label>";
		$response .= "<div class='form-group'>";
		$response .= "<input type='text' class='form-control' disabled>";
		$response .= "</div>";
		$response .= "</div>";
		$response .= "</div>";
		$response .= "</div>";
		$response .= "</div>";

		$data = array('response' => 'success', 'planilla' => $response);


		echo json_encode($data);
	}

	public function obtenerAsistenciaPlanilla(){
		$ajax_data = $this->input->post(); //Datos que vienen por POST
		
		$asistencia_planilla = $this->OperacionesModel->ObtenerAsistenciaPlanilla($ajax_data['codigo_servicio']);
		
		$response = "<div class='table-responsive'>";
		$response .= "<table class='table table-bordered'>";
		$response .= "<tr>";
		$response .= "<td>";
		$response .= "<label>Fecha Asistencia</label>";
		$response .= "</td>";
		$response .= "<td>";
		$response .= "<label>Nombre Completo</label>";
		$response .= "</td>";
		$response .= "<td>";
		$response .= "<label>Hora llegada</label>";
		$response .= "</td>";
		$response .= "<td>";
		$response .= "<label>Hora salida</label>";
		$response .= "</td>";
		$response .= "<td>";
		$response .= "<label>Horas trabajadas</label>";
		$response .= "</td>";
		$response .= "<td>";
		$response .= "<label>Horas extras</label>";
		$response .= "</td>";
		$response .= "</tr>";
		$response .= "<tbody>";
		foreach($asistencia_planilla as $row){ 
			$response .= "<tr>";
			$response .= "<td>";
			$response .= $row->Fecha;
			$response .= "</td>";
			$response .= "<td>";
			$response .= $row->NombreCompleto;
			$response .= "</td>";
			$response .= "<td>";
			$response .= $row->LlegadaM;
			$response .= "</td>";
			$response .= "<td>";
			$response .= $row->SalidaT;
			$response .= "</td>";
			$response .= "<td>";
			$response .= $row->HorasTrabajadas;
			$response .= "</td>";
			$response .= "<td>";
			$response .= $row->HorasExtras;
			$response .= "</td>";
			$response .= "</tr>";
		}
		$response .= "</tbody>";
		$response .= "</table>";
		$response .= "</div>";

		$data = array('response' => 'success', 'planilla' => $response);


		echo json_encode($data);
	}
}
