<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ComprobantePago extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        $this->load->model('ComprobantePagoModel');
        $this->load->model('FacturasModel');
        $this->load->model('OrdenesModel');
    }

    public function index(){
        $data['lista_facturas'] = $this->FacturasModel->listaFacturas();
        $data['activomenu'] = 15;
        $data['activo'] = 21;
        $this->load->view('layout/nav');
        $this->load->view('menu/menu_supremo', $data);
        $this->load->view('Administracion/DocumentoPago',$data);
        $this->load->view('layout/footer');
    }

    public function obtenerDocumento()
    {
        $fetch_data = $this->ComprobantePagoModel->make_datatables_comprobante();
        $data = array();
        foreach ($fetch_data as $value){
            $sub_array = array();
            $sub_array[] = $value->nrodocumento;
            $sub_array[] = $value->fecha;
            $sub_array[] = $value->nrofactura;
            $sub_array[] = $value->detalle;
            $sub_array[] = '<a href="#" class="fas fa-eye" id="detalle_archivos" data-toggle="modal"data-target="#modal-archivos" onclick="listaDocumentos(this)">';
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]) ,
            "recordsTotal" => $this->ComprobantePagoModel->get_all_data_comprobante(),
            "recordsFiltered" => $this->ComprobantePagoModel->get_filtered_data_comprobante(),
            "data" => $data
        );
        echo json_encode($output);

    }

    public function download($id){
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
			$fileInfo = $this->ComprobantePagoModel->getRows(array('id' => $id));
            
            //file path
			$file ='ArchivosSubidos/'.$fileInfo['ubicaciondocumento'];
		
            
            //download file from directory
            force_download($file, NULL);
        }
    }

    public function detalleArchivos(){
		$ajax_data = $this->input->post(); //Datos que vienen por POST
		
		$archivos_subidos = $this->ComprobantePagoModel->ObtenerArchivosSubidos($ajax_data['nrodocumento']);
		
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
			$response .= "<a class='btn btn-info' href=".base_url().'ComprobantePago/download/'.$row->ID."?><i class='fas fa-eye'></i></a>";
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

