<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cotizacion extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        //$this->load->model('FacturaModel');
        $this->load->model('CotizacionesModel');
        $this->load->model('ProveedoresModel');
    }

    public function index(){
        $data['activomenu'] = 15;
        $data['activo'] = 19;
        $data['lista_proveedores'] = $this->ProveedoresModel->listaProveedores();
        $this->load->view('layout/nav');
        $this->load->view('menu/menu_supremo', $data);
        $this->load->view('Administracion/Cotizacion');
        $this->load->view('layout/footer');
    }

    public function obtenerCotizaciones()
    {
        $fetch_data = $this->CotizacionesModel->make_datatables_cotizaciones();
        $data = array();
        foreach ($fetch_data as $value){
            $sub_array = array();
            $sub_array[] = $value->nrocotizacion;
            $sub_array[] = $value->nombre;
            $sub_array[] = $value->fecha;
            $sub_array[] = '<a href="#" class="fas fa-eye" id="detalle_archivos" data-toggle="modal"data-target="#modal-archivos" onclick="listaDocumentos(this)">';
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]) ,
            "recordsTotal" => $this->CotizacionesModel->get_all_data_cotizaciones(),
            "recordsFiltered" => $this->CotizacionesModel->get_filtered_data_cotizaciones(),
            "data" => $data
        );
        echo json_encode($output);

    }

    public function download($id){
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
			$fileInfo = $this->CotizacionesModel->getRows(array('id' => $id));
            
            //file path
			$file ='ArchivosSubidos/'.$fileInfo['ubicaciondocumento'];
		
            
            //download file from directory
            force_download($file, NULL);
        }
    }

    public function detalleArchivos(){
		$ajax_data = $this->input->post(); //Datos que vienen por POST
		
		$archivos_subidos = $this->CotizacionesModel->ObtenerArchivosSubidos($ajax_data['nro_cotizacion']);
		
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

