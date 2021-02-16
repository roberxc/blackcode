<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ordenes extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        //$this->load->model('FacturaModel');
        $this->load->model('CotizacionesModel');
        $this->load->model('ProveedoresModel');
        $this->load->model('OrdenesModel');
        $this->load->model('Proyecto_model');
		$this->load->model('DocumentacionModel');
        $this->load->model('Bodega');
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

    public function index(){
        $data['lista_materiales'] = $this->OrdenesModel->listaMateriales();
        $data['lista_cotizaciones'] = $this->CotizacionesModel->listaCotizaciones();
        $data['lista_bodegas'] = $this->OrdenesModel->listaBodegas();
        $data['lista_proyectos'] = $this->Proyecto_model->listaProyectos();
        $data ['activomenu'] = 15;
		$data ['activo'] = 15;
		$this->setNotificaciones();
     	$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/Ordenes',$data);
		$this->load->view('layout/footer');
    }

    public function listaOrdenes()
    {
        $fetch_data = $this->OrdenesModel->make_datatables_ordenes();
        $data = array();
        foreach ($fetch_data as $value){
            $sub_array = array();
            $sub_array[] = $value->nroorden;
            $sub_array[] = $value->fecha;
			$sub_array[] = $value->nombre;
			$sub_array[] = $value->total;
			if($value->estado == 0){
				$sub_array[] = '<span class="badge badge-success">Cheque a 30 dias</span>';
			}

			if($value->estado == 1){
				$sub_array[] = '<span class="badge badge-danger">Impagada</span>';
			}

			if($value->estado == 2){
				$sub_array[] = '<span class="badge badge-success">Pagada</span>';
			}
            $sub_array[] = '<button class="btn btn-primary btn-sm" data-toggle="modal" id="eyedetalle-orden" data-target="#modal-detalle-orden" onclick="setTablaDetalle(this)"><i class="far fa-eye"></i></button><button class="btn btn-success btn-sm" data-toggle="modal" id="estado-orden" data-target="#modal-estado-orden" onclick="setTablaEstado(this)"><i class="fas fa-edit"></i></button>';
            $data[] = $sub_array;
        }

        $output = array(
            "draw" => intval($_POST["draw"]) ,
            "recordsTotal" => $this->OrdenesModel->get_all_data_ordenes() ,
            "recordsFiltered" => $this->OrdenesModel->get_filtered_data_ordenes() ,
            "data" => $data
        );
        echo json_encode($output);

    }

    public function productoNuevo(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('producto', 'Nombre', 'required');
            $this->form_validation->set_rules('valor', 'Valor', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();

				if ($this->OrdenesModel->registrarNuevoProducto($ajax_data)) {
					$data = array('response' => "success", 'message' => "Producto ingresado correctamente!");
				} else {
					$data = array('response' => "error", 'message' => "Falló el ingreso");
				}
			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

    }
    
    public function nuevaOrden(){
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('nrocotizacion', 'Numero cotizacion', 'required');
			$this->form_validation->set_rules('nroorden', 'Numero de orden', 'required');
			$this->form_validation->set_rules('idbodega', 'Bodega', 'required');
			$this->form_validation->set_rules('proyecto', 'Proyecto', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			}else{
				$ajax_data = $this->input->post();
				$res = $this->OrdenesModel->registrarOrdenes($ajax_data); 
				if ($res) {
					$data = array('response' => "success", 'message' => "Orden ingresada correctamente!");
				} 
				
				if($res == null){
					$data = array('response' => "error", 'message' => "Numero de orden existente");
				}
			}
			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

	}
	
	public function actualizarEstadoOrden(){
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post();
			$estado = $ajax_data['estado'];
			$nroorden = $ajax_data['nroorden'];
			$res = $this->OrdenesModel->actualizarEstadoOrden($estado,$nroorden); 
			if ($res) {
				$data = array('response' => "success", 'message' => "Estado actualizado correctamente!");
			} 
			if($res == null){
				$data = array('response' => "error", 'message' => "Error al actualizar");
			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

    }
    
    public function obtenerDetalleOrden(){
		$ajax_data = $this->input->post(); //Datos que vienen por POST
		
		$horas_extras = $this->OrdenesModel->ObtenerDetalleOrden($ajax_data['iditem']);
		
		$response = "<div class='table-responsive'>";
		$response .= "<table class='table table-bordered'>";
		$response .= "<tr>";
		$response .= "<td>";
		$response .= "<label>Numero</label>";
		$response .= "</td>";
		$response .= "<td>";
		$response .= "<label>Material</label>";
		$response .= "</td>";
		$response .= "<td>";
		$response .= "<label>Cantidad</label>";
        $response .= "</td>";	
        $response .= "<td>";
		$response .= "<label>Valor unitario</label>";
        $response .= "</td>";
		$response .= "<td>";
		$response .= "<label>Importe</label>";
        $response .= "</td>";	
		$response .= "</tr>";
		$response .= "<tbody>";
		foreach($horas_extras as $row){ 
			$response .= "<tr>";
			$response .= "<td>";
			$response .= "<input name='col1[]' style='border:0;outline:0;display:inline-block' value=".$row->idmaterial.">";
			$response .= "</td>";
			$response .= "<td>";
			$response .= "<input name='col2[]' style='border:0;outline:0;display:inline-block' value=".$row->nombre.">";
			$response .= "</td>";
			$response .= "<td>";
			$response .= "<input name='col3[]' style='border:0;outline:0;display:inline-block' value=".$row->cantidad.">";
            $response .= "</td>";
            $response .= "<td>";
			$response .= "<input name='col4[]' style='border:0;outline:0;display:inline-block' value=".$row->valor.">";
			$response .= "</td>";
			$response .= "<td>";
			$response .= "<input name='col5[]' style='border:0;outline:0;display:inline-block' value=".$row->importe.">";
			$response .= "</td>";
			$response .= "</tr>";
		}
		$response .= "</tbody>";
		$response .= "</table>";
		$response .= "</div>";

		$data = array('response' => 'success', 'detalle' => $response);


		echo json_encode($data);
	}

	public function obtenerEstadoOrden(){
		$ajax_data = $this->input->post(); //Datos que vienen por POST
		$response = "<select class='form-control select2' style='width: 100%;' id='estado_orden' onchange='setEstadoOrden()'>";
		$response .= "<option value='1' selected>Seleccione</option>";
		$response .= "<option value='2'>Pagada</option>";
		$response .= "<option value='1'>Impagada</option>";
		$response .= "<option value='0'>Cheque a 30 dias</option>";
		$response .= "</select>";
		$data = array('response' => 'success', 'detalle' => $response);


		echo json_encode($data);
	}

	public function descargarDetalleOrden(){
        $ajax_data = $this->input->post();
        $nro  = $ajax_data['col1'];
        $material = $ajax_data['col2'];
        $cantidad = $ajax_data['col3'];
        $valor = $ajax_data['col4'];
		$importe = $ajax_data['col5'];
		$hoy = date("dmyhis");
        $fechaactual = date("d/m/Y");

        $stylesheet = file_get_contents(base_url().'assets/login/diseño/bootstrap/css/bootstrap.min.css');

        $html = "<div class='row'>";
		$html .= "<div class='col-md-4'>";
		$html .= "<div class='form-group'>";
		$html .= "<img src='".base_url()."assets/Imagen/logooficial.png' class='img-responsive center-block' alt='Cinque Terre'>";
		$html .= "</div>";
		$html .= "</div>";
		$html .= "<div class='col-md-8'>";
		$html .= "<div class='form-group'>";
		$html .= "<blockquote class='blockquote text-center'>";
        $html .= "<p class='mb-0'>CDH Ingenieria</p>";
        $html .= "<footer class='blockquote-footer'>Orden de compra Nro: (nro)</footer>";
        $html .= "</blockquote>";
		$html .= "</div>";
		$html .= "</div>";
		$html .= "</div>";
        $html .= "<br>";
        $html .= "<div class='table-responsive'>";
		$html .="<TABLE BORDER class='table table-bordered' id='tabla_vacaciones'>";
		$html .= "<tr>";
		$html .= "<td>";
		$html .= "<label>Cod</label>";
		$html .= "</td>";
		$html .= "<td>";
		$html .= "<label>Material</label>";
		$html .= "</td>";
		$html .= "<td>";
		$html .= "<label>Cantidad</label>";
		$html .= "</td>";	
		$html .= "<td>";
		$html .= "<label>Valor unitario</label>";
		$html .= "</td>";
		$html .= "<td>";
		$html .= "<label>Importe</label>";
		$html .= "</td>";
		$html .= "</tr>";
		$html .= "<tbody>";
		for($i = 0;$i<count($nro);$i++){ 
			$html .="<TR>";
			$html .="<TH>".$nro[$i]."</TH>";
			$html .="<TH>".$material[$i]."</TH>";
			$html .="<TH>".$cantidad[$i]."</TH>";
			$html .="<TH>".$valor[$i]."</TH>";
			$html .="<TH>".$importe[$i]."</TH>";
			$html .="</TR>";
		}
		$html .= "</tbody>";
		$html .="</TABLE>";
        $html .= "</div>";

        //this the the PDF filename that user will get to download
        $pdfFilePath = "cipdf_".$hoy.".pdf";
 
        //load mPDF library
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY,true, false);
		
        $mpdf->Output($pdfFilePath, "D");
    }

    
}

