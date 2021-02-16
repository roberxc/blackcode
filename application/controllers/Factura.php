<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Factura extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        $this->load->model('FacturasModel');
        $this->load->model('OrdenesModel');
    }

    public function obtenerFacturas()
    {
        $fetch_data = $this->FacturasModel->make_datatables_facturas();
        $data = array();
        foreach ($fetch_data as $value){
            $sub_array = array();
            $sub_array[] = $value->nrofactura;
            $sub_array[] = $value->rut;
            $sub_array[] = $value->nombre;
            $sub_array[] = $value->fecha;
            $sub_array[] = $value->nrocotizacion;
            $sub_array[] = $value->nroorden;
            $sub_array[] = '<a href="#" class="fas fa-eye" id="detalle_archivos" data-toggle="modal"data-target="#modal-archivos" onclick="listaDocumentos(this)">';
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]) ,
            "recordsTotal" => $this->FacturasModel->get_all_data_facturas(),
            "recordsFiltered" => $this->FacturasModel->get_filtered_data_facturas(),
            "data" => $data
        );
        echo json_encode($output);

    }

    public function index(){
        $data['lista_ordenes'] = $this->OrdenesModel->listaOrdenes();
        $data['activomenu'] = 15;
        $data['activo'] = 18;
        $this->load->view('layout/nav');
        $this->load->view('menu/menu_supremo', $data);
        $this->load->view('Administracion/Facturas',$data);
        $this->load->view('layout/footer');
    }

    public function detalleArchivos(){
		$ajax_data = $this->input->post(); //Datos que vienen por POST
		
		$archivos_subidos = $this->FacturasModel->ObtenerArchivosSubidos($ajax_data['nrofactura']);
		
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
			
			$response .= "<input type='text' value='$row->Archivo' class='form-control nombreArchivo' disabled/>";
			$response .= "</td>";
			$response .= "<td>";
			$response .= "<div class='btn-group btn-group-sm' >";
			$response .= "<a class='btn btn-info' href=".base_url().'Cotizacion/download/'.$row->ID."?><i class='fas fa-eye'></i></a>";
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

    
}

