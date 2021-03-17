<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentacion extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
		$this->load->model('DocumentacionModel');
		$this->load->helper(array('notificacion','url'));
	 }

	public function index()
	{

	}

	public function Permamente()
	{
		$data ['documentos_permamentes'] = $this->DocumentacionModel->ObtenerDocumentosPermamentes();
		$data ['activomenu'] = 11;
		$data ['activo'] = 8;
		setNotificaciones($this->DocumentacionModel);
     	$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/documentacionPermamente',$data);
		$this->load->view('layout/footer');
	}

	public function Actualizable()
	{
		$data ['documentos_actualizables'] = $this->DocumentacionModel->ObtenerDocumentosActualizables();
		$data ['activomenu'] = 11;
		$data ['activo'] = 12;
		setNotificaciones($this->DocumentacionModel);
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/documentacionActualizable',$data);
		$this->load->view('layout/footer');
	}
	
	public function filtrarDocumentacionPermamente(){
		$nombre = $this->input->post('nombre');
		$fecha = $this->input->post('fecha');

		$resultado = $this->DocumentacionModel->FiltroDocumentacionPermamente($nombre,$fecha);
		echo json_encode($resultado);
	}

	public function filtrarDocumentacionActualizable(){
		$nombre = $this->input->post('nombre');
		$fecha = $this->input->post('fechalimite');

		$resultado = $this->DocumentacionModel->FiltroDocumentacionActualizable($nombre,$fecha);
		echo json_encode($resultado);
	}

	public function obtenerDocumentacion($tipo)
    {
        $fetch_data = $this->DocumentacionModel->make_datatables_documentacion($tipo);
        $data = array();
        foreach ($fetch_data as $value){
            $sub_array = array();
			$sub_array[] = $value->id;
			$sub_array[] = $value->nombre;
			//Si es igual a 0 es porque es documentacion permamente
			if($tipo == 0){
				$sub_array[] = $value->fecha;
				$sub_array[] = '<button class="btn btn-success btn-sm" data-toggle="modal" id="estado-orden" data-target="#modal-estado-orden" onclick="descargarDocumento(this)"><i class="fas fa-download"></i></button>';
			}
			//Si es igual a 1 es porque es documentacion actualizable
			if($tipo == 1){
				$sub_array[] = $value->fechalimite;
				$sub_array[] = '<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-editardocumento" onclick="editarDocumento(this)"><i class="fas fa-edit"></i></button><button class="btn btn-success btn-sm" data-toggle="modal" id="estado-orden" data-target="#modal-estado-orden" onclick="descargarDocumento(this)"><i class="fas fa-download"></i></button>';
			}
            $data[] = $sub_array;
        }

        $output = array(
            "draw" => intval($_POST["draw"]) ,
            "recordsTotal" => $this->DocumentacionModel->get_all_data_documentacion($tipo) ,
            "recordsFiltered" => $this->DocumentacionModel->get_filtered_data_documentacion($tipo) ,
            "data" => $data
        );
        echo json_encode($output);

	}

	public function download($id){
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
			$fileInfo = $this->DocumentacionModel->getRows(array('id' => $id));
            
            //file path
			$file ='ArchivosSubidos/'.$fileInfo['ubicacion'];
		
            
            //download file from directory
            force_download($file, NULL);
        }
	}
	
	public function obtenerDetalleDocumento(){
		$ajax_data = $this->input->post(); //Datos que vienen por POST
		
		$horas_extras = $this->DocumentacionModel->ObtenerDetalleDocActualizable($ajax_data['iditem']);
		$response = "<div class='form-group'>";
		$response .= "<label for='exampleInputEmail1'>Nombre del documento</label>";
		$response .= "<input type='text' class='form-control' id='nombre-documento' name='nombre-documento' placeholder='Ingrese'>";
		$response .= "</div>";
		$response .= "<div class='form-group'>";
		$response .= "<label for='exampleInputEmail1'>Fecha limite</label>";
		$response .= "<input type='date' class='form-control' id='fecha-limite' name='fecha-limite' format='d/m/y'>";
		$response .= "</div>";

		$data = array('response' => 'success', 'detalle' => $response);


		echo json_encode($data);
	}
}
