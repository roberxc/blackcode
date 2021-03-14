<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operacion extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
		$this->load->library('Mobile_Detect');
		$this->load->model('OperacionesModel');
		$this->load->model('DocumentacionModel');
		
	 }

	public function setNotificaciones(){
		$data ['expiracion'] = 0;
		$lista_fecha = $this->DocumentacionModel->ObtenerFechaDocActualizable();
		$fechaactual = date("d-m-Y");
		$data ['totaldocumentos'] = 0;
		foreach($lista_fecha as $row){
			//Paso de string a fecha
			$d1 = new DateTime($row->fechalimite);
			$d2 = new DateTime($fechaactual);
			$interval = $d1->diff($d2);
			$diasTotales    = $interval->d; 
			if($diasTotales == 3){
				$data ['lista_nrodocactualizables'] = $this->DocumentacionModel->ObtenerNroDocActualizable($row->fechalimite);
				$data ['expiracion'] = 1;
				$data ['totaldocumentos'] = $data ['totaldocumentos'] + 1;
			}
		}
		$this->load->view('layout/nav',$data);
	}

	public function index()
	{
		$detect = new CI_Mobile_Detect();

		$data ['dispositivo'] = 'Mobil';
		$data ['tipos_trabajos'] = $this->OperacionesModel->ObtenerTipostrabajos();
		$data ['lista_proyectos'] = $this->OperacionesModel->ObtenerProyectos();
		$data ['lista_personal'] = $this->OperacionesModel->ObtenerPersonal();
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

	public function getPersonal(){

		if (isset($_GET['term'])) {
			$result = $this->OperacionesModel->getPersonal($_GET['term']);
			if (count($result) > 0) {
			  foreach ($result as $row)
			  $result_array[] = array(
				  'label'=>$row->Rut,
				  'nama_mahasiswa'=>strtoupper($row->NombreCompleto)
				);
			  echo json_encode($result_array);
			}
		}

	}

	public function ModificarPlanilla(){
		$data ['tipos_trabajos'] = $this->OperacionesModel->ObtenerTipostrabajos();
		$this->load->view('Trabajador/planilla_modificacion',$data);
	}

	public function trabajoDiario()
	{
		$set_data = $this->session->all_userdata();
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activo'] = 30;
			//Lista de trabajos realizados
			$this->setNotificaciones();
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
			$this->form_validation->set_rules('fecha_trabajo', 'Fecha trabajo', 'required');
			$this->form_validation->set_rules('id_proyecto', 'Nombre proyecto', 'required');
			$this->form_validation->set_rules('persona_cargo', 'Persona a cargo', 'required');
			$this->form_validation->set_rules('suma_asignada', 'Suma asignada', 'numeric|greater_than[0]|required');
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

		$gastos_combustible = $this->OperacionesModel->ObtenerGastosCombustibles($ajax_data['codigo_servicio']);

		$gasto_total = $this->OperacionesModel->obtenerGastoTotal($ajax_data['codigo_servicio']);

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
		$response .= "<th>Documento</th>";
		$response .= "<th>Monto total $</th>";
		$response .= "<th>Detalle</th>";
		$response .= "<th>Accion</th>";
		$response .= "</tr>";
		$response .= "</thead>";
		$response .= "<tbody>";
		foreach($materiales_durante as $row){
			$response .= "<tr>";
			$response .= "<th>".$row->documento."</th>";
			$response .= "<td>".$row->monto."</td>";
			$response .= "<td>".$row->detalle."</td>";
			$response .= "<td><button class='btn btn-primary btn-sm' onclick='descargarDocumentoMateriales()' id='doc-materialesdurante' value='".$row->id."'><i class='fas fa-download'></i></button>";
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
			$response .= "<th>".$row->nombre."</th>";
			$response .= "<td>".$row->cantidad."</td>";
			$response .= "<td>".$row->valor."</td>";
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
			$response .= "<th>".$row->nombre."</th>";
			$response .= "<td>".$row->cantidad."</td>";
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
		foreach($gastos_combustible as $row){
			$response .= "<tr>";
			$response .= "<th>".$row->nombre."</th>";
			$response .= "<td>".$row->valor."</td>";
			$response .= "</tr>";
		}
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
			$response .= "<th>".$row->nombre."</th>";
			$response .= "<td> $".$row->valor."</td>";
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
		foreach($gasto_total as $row){ 
			$response .= "<input type='text' class='form-control' value='$".$row->Valor."' disabled>";
		}
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

	public function descargarDocMaterialesDurante($id){
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
			$fileInfo = $this->OperacionesModel->getDocMaterialesDurante(array('id' => $id));
            
            //file path
			$file ='ArchivosSubidos/'.$fileInfo['ubicaciondocumento'];
		
            
            //download file from directory
            force_download($file, NULL);
        }
	}

	public function obtenerAsistenciaPlanilla(){
		$ajax_data = $this->input->post(); //Datos que vienen por POST
		$asistencia_planilla = $this->OperacionesModel->ObtenerAsistenciaPlanilla($ajax_data['codigo_servicio'],$ajax_data['fecha_trabajo']);
		
		$response = "<div class='table-responsive'>";
		$response .= "<table class='table table-bordered'>";
		
		$response .= "<tr>";
		$response .= "<td>Fecha Asistencia</td>";
		$response .= "<th>".$asistencia_planilla[0]['Fecha']."</th>";
		$response .= "</tr>";

		$response .= "<tr>";
		$response .= "<td>Nombre Completo</td>";
		$response .= "<th>".$asistencia_planilla[0]['NombreCompleto']."</th>";
		$response .= "</tr>";

		$response .= "<tr>";
		$response .= "<td>Hora llegada</td>";
		$response .= "<th>".$asistencia_planilla[0]['LlegadaM']."</th>";
		$response .= "</tr>";

		$response .= "<tr>";
		$response .= "<td>Hora salida</td>";
		$response .= "<th>".$asistencia_planilla[0]['SalidaT']."</th>";
		$response .= "</tr>";

		$response .= "<tr>";
		$response .= "<td>Horas trabajadas</td>";
		$response .= "<th>".$asistencia_planilla[0]['HorasTrabajadas']."</th>";
		$response .= "</tr>";

		$response .= "<tr>";
		$response .= "<td>Horas extras</td>";
		$response .= "<th>".$asistencia_planilla[0]['HorasExtras']."</th>";
		$response .= "</tr>";

		$response .= "<tr>";
		$response .= "<td>Observación</td>";
		$response .= "<th>".$asistencia_planilla[0]['detalle']."</th>";
		$response .= "</tr>";

		$response .= "<tr>";
		$response .= "<td>Total horas extras</td>";
		$response .= "<th><button class='btn btn-info btn-sm' id='boton-horasextras' data-toggle='modal' data-target='#modal-horasextras'><i class='fas fa-exclamation-circle'></i></button></th>";
		$response .= "</tr>";

		$response .= "</table>";
		$response .= "</div>";

		$data = array('response' => 'success', 'planilla' => $response);


		echo json_encode($data);
	}

	public function download($id){
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
			$fileInfo = $this->OperacionesModel->getRows(array('id' => $id));
            
            //file path
			$file ='ArchivosSubidos/'.$fileInfo['Imagen'];
		
            
            //download file from directory
            force_download($file, NULL);
        }
    }

	public function DescargarArchivos(){
		$ajax_data = $this->input->post(); //Datos que vienen por POST
		
		$archivos_subidos = $this->OperacionesModel->ObtenerArchivosSubidos($ajax_data['codigo_servicio']);
		
		$response = "<div class='table-responsive'>";
		$response .= "<table class='table table-bordered'>";
		$response .= "<tr>";
		$response .= "<td>";
		$response .= "<label>Archivos</label>";
		$response .= "</td>";
		$response .= "<td>";
		$response .= "<label>Descarga</label>";
		$response .= "</td>";	
		$response .= "</tr>";
		$response .= "<tbody>";
		foreach($archivos_subidos as $row){ 
			$response .= "<tr>";
			$response .= "<td>";
			
			$response .= "<input type='text' value='$row->Imagen' class='form-control nombreArchivo' disabled/>";
			$response .= "</td>";
			$response .= "<td>";
			$response .= "<div class='btn-group btn-group-sm' >";
			$response .= "<a class='btn btn-info' href=".base_url().'Operacion/download/'.$row->ID."?><i class='fas fa-eye'></i></a>";
			$response .= "</div>";
			$response .= "</td>";
			$response .= "</tr>";
		}
		$response .= "</tbody>";
		$response .= "</table>";
		$response .= "</div>";

		$data = array('response' => 'success', 'planilla' => $response);


		echo json_encode($data);
	}

	public function obtenerHoraExtrasPersonal(){
		$ajax_data = $this->input->post(); //Datos que vienen por POST
		
		$horas_extras = $this->OperacionesModel->ObtenerHorasExtras($ajax_data['rut_personal'],$ajax_data['fecha_inicio'],$ajax_data['fecha_fin']);
		
		$response = "<div class='table-responsive'>";
		$response .= "<table class='table table-bordered'>";
		$response .= "<tr>";
		$response .= "<td>";
		$response .= "<label>Rut</label>";
		$response .= "</td>";
		$response .= "<td>";
		$response .= "<label>Nombre</label>";
		$response .= "</td>";
		$response .= "<td>";
		$response .= "<label>Total horas extras</label>";
		$response .= "</td>";	
		$response .= "</tr>";
		$response .= "<tbody>";
		$response .= "<tr>";
		$response .= "<td>";
		$response .= $horas_extras[0]['Rut'];
		$response .= "</td>";
		$response .= "<td>";
		$response .= $horas_extras[0]['Nombre'];
		$response .= "</td>";
		$response .= "<td>";
		$response .= $horas_extras[0]['TotalHoras'];
		$response .= "</td>";
		$response .= "</tr>";
		$response .= "</tbody>";
		$response .= "</table>";
		$response .= "</div>";

		if($horas_extras[0]['TotalHoras'] > 0){
			$data = array('response' => 'success', 'horas' => $response);

		}else{
			$data = array('response' => 'success', 'horas' => '<span class="badge badge-danger">Sin resultados</span>');
		}
		echo json_encode($data);
	}

	public function obtenerTrabajosDiarios(){
		$fetch_data = $this->OperacionesModel->make_datatables_trabajodiario();
        $data = array();
        foreach ($fetch_data as $value){
            $sub_array = array();
			$sub_array[] = $value->codigoservicio;
            $sub_array[] = $value->fechaasignacion;
			$sub_array[] = $value->nombreproyecto;
			$sub_array[] = $value->personalcargo;
			$sub_array[] = '<button class="btn btn-primary btn-sm" id="detalle_trabajo" data-toggle="modal" data-target="#modal-detalle" onclick="setCodigoServicio(this)"><i class="far fa-eye"></i></button><button class="btn btn-warning btn-sm" id="detalle_archivos" data-toggle="modal" data-target="#modal-archivos" onclick="setCodigoServicio(this)"><i class="fas fa-upload"></i></button><button class="btn btn-success btn-sm" id="detalle_asistencia" data-toggle="modal"data-target="#modal-asistencia" onclick="setCodigoServicio(this)"><i class="fas fa-book-open"></i></button>';			
			$data[] = $sub_array;
        }

        $output = array(
            "draw" => intval($_POST["draw"]) ,
            "recordsTotal" => $this->OperacionesModel->get_all_data_trabajodiario() ,
            "recordsFiltered" => $this->OperacionesModel->get_filtered_data_trabajodiario() ,
            "data" => $data
        );
        echo json_encode($output);

	}
}
