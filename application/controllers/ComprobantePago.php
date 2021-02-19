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

	public function subirDocumentoPago(){
		//El metodo is_ajax_request() de la libreria input permite verificar
		//si se esta accediendo mediante el metodo AJAX 
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('nrofactura', 'Numero factura', 'required');
			$this->form_validation->set_rules('nrodocumento', 'Numero documento', 'required');
			$this->form_validation->set_rules('fecha', 'Fecha', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			}else{
				$fecha = $this->input->post("fecha");
				$detalle = $this->input->post("detalle");
				$nrodocumento = $this->input->post("nrodocumento");
				$nrofactura = $this->input->post("nrofactura");

				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				$config = [
					"upload_path" => APPPATH. '../ArchivosSubidos/',
					'allowed_types' => "*"
				];

				$this->load->library("upload",$config);

				if ($this->upload->do_upload('pic_file')) {
					$data = array("upload_data" => $this->upload->data());
					if($this->ComprobantePagoModel->subirComprobante($data,$fecha,$detalle,$nrodocumento,$nrofactura)==true){
						$data = array('response' => "success", 'message' => "Comprobante ingresado correctamente!");
					}else{
						$data = array('response' => "error", 'message' => "Error al subir");
					}
				}else{
					$data = array('response' => "error", 'message' => $this->upload->display_errors());
				}
			}
			echo json_encode($data);
		}else{
			show_404();
		}
	}

    public function index(){
		$set_data = $this->session->all_userdata();
		
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 5) {
			$data['lista_facturas'] = $this->FacturasModel->listaFacturas();
			$data['activomenu'] = 15;
			$data['activo'] = 21;
			$this->setNotificaciones();
			$this->load->view('menu/menu_proyecto',$data);
			$this->load->view('Administracion/Proveedores');
			$this->load->view('layout/footer');
		}else if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data['lista_facturas'] = $this->FacturasModel->listaFacturas();
			$data['activomenu'] = 15;
			$data['activo'] = 21;
			$this->setNotificaciones();
			$this->load->view('menu/menu_supremo', $data);
			$this->load->view('Administracion/DocumentoPago',$data);
			$this->load->view('layout/footer');
		}
       
    }

    public function obtenerDocumento()
    {
        $fetch_data = $this->ComprobantePagoModel->make_datatables_comprobante();
        $data = array();
        foreach ($fetch_data as $value){
            $sub_array = array();
            $sub_array[] = $value->nrodocumento;
            $sub_array[] = $value->fecha;
			$sub_array[] = $value->nrocotizacion;
			$sub_array[] = $value->nroorden;
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

