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
        $this->load->model('Bodega');
    }

    public function index(){
        $data['lista_materiales'] = $this->OrdenesModel->listaMateriales();
        $data['lista_cotizaciones'] = $this->CotizacionesModel->listaCotizaciones();
        $data['lista_bodegas'] = $this->OrdenesModel->listaBodegas();
        $data['lista_proyectos'] = $this->Proyecto_model->listaProyectos();
        $data ['activomenu'] = 15;
		$data ['activo'] = 15;
		$this->load->view('layout/nav');
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
				$sub_array[] = '<span class="badge badge-warning">Por aprobar</span>';
			}

			if($value->estado == 1){
				$sub_array[] = '<span class="badge badge-success">Aprobada</span>';
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
			$ajax_data = $this->input->post();
			$res = $this->OrdenesModel->registrarOrdenes($ajax_data); 
			if ($res) {
				$data = array('response' => "success", 'message' => "Orden ingresada correctamente!");
			} 
			
			if($res == null){
				$data = array('response' => "error", 'message' => "Numero de orden existente");
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
		$response .= "<label>Valor</label>";
        $response .= "</td>";	
		$response .= "</tr>";
		$response .= "<tbody>";
		foreach($horas_extras as $row){ 
			$response .= "<tr>";
			$response .= "<td>";
			$response .= $row->numero;
			$response .= "</td>";
			$response .= "<td>";
			$response .= $row->nombre;
			$response .= "</td>";
			$response .= "<td>";
			$response .= $row->cantidad;
            $response .= "</td>";
            $response .= "<td>";
			$response .= $row->valor;
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
		$response .= "<option value='0' selected>Seleccione</option>";
		$response .= "<option value='0'>Por aprobar</option>";
		$response .= "<option value='1'>Aprobada</option>";
		$response .= "</select>";
		$data = array('response' => 'success', 'detalle' => $response);


		echo json_encode($data);
	}

    
}

