<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Factura extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        $this->load->model('FacturasModel');
        $this->load->model('OrdenesModel');
        $this->load->model('DocumentacionModel');
		$this->load->model('Proyecto_model');
		$this->load->helper(array('notificacion','url'));
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
            $sub_array[] = '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-archivos" onclick="listaDocumentos(this)"><i class="far fa-eye"></i></button>';
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
		$set_data = $this->session->all_userdata();

		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 5) {

			$data['lista_ordenes'] = $this->OrdenesModel->listaOrdenes();
			$data['activomenu'] = 15;
			$data['activo'] = 18;
			$data['lista_proyectos'] = $this->Proyecto_model->listaProyectosSegunUsuario($set_data['ID_Usuario']);
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_proyecto',$data);
			$this->load->view('Administracion/Facturas');
			$this->load->view('layout/footer');
		}else if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {

			$data['lista_ordenes'] = $this->OrdenesModel->listaOrdenes();
			$data['activomenu'] = 15;
			$data['activo'] = 18;
			setNotificaciones($this->DocumentacionModel);
			$this->load->view('menu/menu_supremo', $data);
			$this->load->view('Administracion/Facturas',$data);
			$this->load->view('layout/footer');
		}
        
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
			$response .= "<a class='btn btn-info' href=".base_url().'Factura/download/'.$row->ID."?><i class='fas fa-download'></i></a>";
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

	public function subirFacturaCompraMateriales(){
		//El metodo is_ajax_request() de la libreria input permite verificar
		//si se esta accediendo mediante el metodo AJAX 
		if ($this->input->is_ajax_request()) {
			$codigoservicio = $this->input->post("codigo1");
			$monto = $this->input->post("montototal");
			$detalle = $this->input->post("detalle");
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$config = [
				"upload_path" => APPPATH. '../ArchivosSubidos/',
				'allowed_types' => "*"
			];

			$this->load->library("upload",$config);

			if ($this->upload->do_upload('pic_file_doccompra')) {
				$data = array("upload_data" => $this->upload->data());
				if($this->FacturasModel->subirFacturaCompraMateriales($data,$codigoservicio,$monto,$detalle)==true){
					echo "exito";
				}else{
					echo "error";
				}
			}else{
				echo $this->upload->display_errors();
			}
		}else{
			show_404();
		}
	}

	public function subirFacturas(){
		//El metodo is_ajax_request() de la libreria input permite verificar
		//si se esta accediendo mediante el metodo AJAX 
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('nrofactura', 'Numero factura', 'required');
			$this->form_validation->set_rules('montototal', 'Monto total', 'required');
			$this->form_validation->set_rules('fecha', 'Fecha', 'required');
			$this->form_validation->set_rules('nroorden', 'Numero de orden', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			}else{
				$ajax_data = $this->input->post();
				$fecha = $this->input->post("fecha");
				$nroorden = $this->input->post("nroorden");
				$nrofactura = $this->input->post("nrofactura");
				$detalle = $this->input->post("detalle");
				$montototal = $this->input->post("montototal");

				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				$config = [
					"upload_path" => APPPATH. '../ArchivosSubidos/',
					'allowed_types' => "*"
				];

				$this->load->library("upload",$config);
				if($this->FacturasModel->siExisteFactura($ajax_data)){
					if ($this->upload->do_upload('pic_file')) {
						$data = array("upload_data" => $this->upload->data());
						if($this->FacturasModel->subirFactura($data,$fecha,$nroorden,$nrofactura,$montototal,$detalle)==true){
							$data = array('response' => "success", 'message' => "Factura ingresada correctamente!");
						}else{
							$data = array('response' => "error", 'message' => "Error al subir");
						}
					}else{
						$data = array('response' => "error", 'message' => $this->upload->display_errors());
					}
				
				}else{
					$data = array('response' => "error", 'message' => "Numero de factura ya ingresada!");
				}
			}
			echo json_encode($data);
		}else{
			show_404();
		}
	}

    public function download($id){
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
			$fileInfo = $this->FacturasModel->getRows(array('id' => $id));
            
            //file path
			$file ='ArchivosSubidos/'.$fileInfo['ubicaciondocumento'];
		
            
            //download file from directory
            force_download($file, NULL);
        }
    }
}

