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
        $this->load->model('DocumentacionModel');
		$this->load->model('OrdenesModel');
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
		$set_data = $this->session->all_userdata();

		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 5) {

			$data['activomenu'] = 15;
			$data['activo'] = 19;
			$data['lista_proveedores'] = $this->ProveedoresModel->listaProveedores();
			$data['lista_materiales'] = $this->OrdenesModel->listaMateriales();
			$this->setNotificaciones();
			$this->load->view('menu/menu_proyecto',$data);
			$this->load->view('Administracion/Proveedores');
			$this->load->view('layout/footer');
		}else if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {

			$data['activomenu'] = 15;
			$data['activo'] = 19;
			$data['lista_proveedores'] = $this->ProveedoresModel->listaProveedores();
			$data['lista_materiales'] = $this->OrdenesModel->listaMateriales();
			$this->setNotificaciones();
			$this->load->view('menu/menu_supremo', $data);
			$this->load->view('Administracion/Cotizacion', $data);
			$this->load->view('layout/footer');
		}
       
    }

	public function subirCotizaciones(){
		//El metodo is_ajax_request() de la libreria input permite verificar
		//si se esta accediendo mediante el metodo AJAX 
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('nrocotizacion', 'Numero', 'required');
			$this->form_validation->set_rules('fecha', 'Fecha', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			}else{
				$ajax_data = $this->input->post();
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				$config = [
					"upload_path" => APPPATH. '../ArchivosSubidos/',
					'allowed_types' => "*"
				];
				$this->load->library("upload",$config);
				if($this->CotizacionesModel->siExisteCotizacion($ajax_data)){
					if ($this->upload->do_upload('pic_file')) {
						$data = array("upload_data" => $this->upload->data());
						$res = $this->CotizacionesModel->registrarCotizacion($data,$ajax_data);
						if($res){
							$data = array('response' => "success", 'message' => "Cotizacion ingresada correctamente!");
						}
					}else{
						$data = array('response' => "error", 'message' => $this->upload->display_errors());
					}
				}else{
					$data = array('response' => "error", 'message' => "Numero de cotizacion ya ingresada!");
				}
			}
			echo json_encode($data);
		}else{
			show_404();
		}
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
			$sub_array[] = '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-archivos" onclick="listaDocumentos(this)"><i class="far fa-eye"></i></button>';
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

	public function obtenerDetalleCotizacion(){
        $ajax_data = $this->input->post(); //Datos que vienen por POST
        $lista_detalle = $this->CotizacionesModel->ObtenerCotizaciones($ajax_data['id_cotizacion']);

        $response = "<div class='table-responsive'>";
        $response .= "<table class='table table-bordered' id='productos_cotizacion'>";
		$response .= "<tr>";
		$response .= "<td>";
        $response .= "<label>ID</label>";
		$response .= "</td>";
		$response .= "<td>";
        $response .= "<label>Material</label>";
		$response .= "</td>";
		$response .= "<td>";
        $response .= "<label>Cantidad</label>";
        $response .= "</td>";
        $response .= "<td>";
        $response .= "<label>Precio unitario</label>";
        $response .= "</td>";
		$response .= "<td>";
        $response .= "<label>Importe</label>";
        $response .= "</td>";
		$response .= "<td>";
        $response .= "<label>Acción</label>";
        $response .= "</td>";
        $response .= "</tr>";
        $response .= "<tbody>";
        foreach ($lista_detalle as $row)
        {
            $response .= "<tr>";
            $response .= "<td class='item'>";
            $response .= "$row->id_material";
            $response .= "</td>";
			$response .= "<td class='item_material'>";
            $response .= "$row->nombre";
            $response .= "</td>";
            $response .= "<td class='cantidad'>";
            $response .= $row->cantidad;
			$response .= "</td>";
			$response .= "<td class='precio'>";
            $response .= $row->valor;
            $response .= "</td>";
			$response .= "<td class='importe'>";
            $response .= $row->importe;
            $response .= "</td>";
			$response .= "<td>";
            $response .= '<button type="button" class="btnremove btn btn-danger" onclick="deleteRow(this)">X</button>';
            $response .= "</td>";
			$response .= "</tr>";
        }
        $response .= "</tbody>";
        $response .= "</table>";
        $response .= "</div>";

        $data = array('response' => 'success','detalle' => $response);

        echo json_encode($data);
    }

    
}

