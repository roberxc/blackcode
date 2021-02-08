<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Upload extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('pic_model');
		$this->load->model('CotizacionesModel');
		//$this->load->library('form_validation');
		
		//$this->load->view('header');

	}
	
	public function form(){
		$this->load->view('planilla');
		//$this->load->view('footer');
	}

	public function subirArchivo(){
		//El metodo is_ajax_request() de la libreria input permite verificar
		//si se esta accediendo mediante el metodo AJAX 
		if ($this->input->is_ajax_request()) {
			$codigoservicio = $this->input->post("codigo1");
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$config = [
				"upload_path" => APPPATH. '../ArchivosSubidos/',
				'allowed_types' => "jpg|png|pdf|docx|jepg"
			];

			$this->load->library("upload",$config);

			if ($this->upload->do_upload('pic_file')) {
				$data = array("upload_data" => $this->upload->data());
				if($this->pic_model->subirArchivoBD($data,$codigoservicio)==true){
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

	public function subirDocumentacionPermamente(){
		//El metodo is_ajax_request() de la libreria input permite verificar
		//si se esta accediendo mediante el metodo AJAX 
		if ($this->input->is_ajax_request()) {
			$nombredocumento = $this->input->post("nombre-documento");
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$config = [
				"upload_path" => APPPATH. '../ArchivosSubidos/',
				'allowed_types' => "jpg|png|pdf|docx|jepg"
			];

			$this->load->library("upload",$config);

			if ($this->upload->do_upload('pic_file')) {
				$data = array("upload_data" => $this->upload->data());
				if($this->pic_model->subirDocumentacionPermamente($data,$nombredocumento)==true){
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

	public function subirDocumentacionActualizable(){
		//El metodo is_ajax_request() de la libreria input permite verificar
		//si se esta accediendo mediante el metodo AJAX 
		if ($this->input->is_ajax_request()) {
			$nombredocumento = $this->input->post("nombre-documento");
			$fechalimite = $this->input->post("fecha-limite");
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$config = [
				"upload_path" => APPPATH. '../ArchivosSubidos/',
				'allowed_types' => "jpg|png|pdf|docx|jepg"
			];

			$this->load->library("upload",$config);

			if ($this->upload->do_upload('pic_file')) {
				$data = array("upload_data" => $this->upload->data());
				if($this->pic_model->subirDocumentacionActualizable($data,$nombredocumento,$fechalimite)==true){
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

	public function updateDocumentacionActualizable(){
		//El metodo is_ajax_request() de la libreria input permite verificar
		//si se esta accediendo mediante el metodo AJAX 
		if ($this->input->is_ajax_request()) {
			$nombredocumento = $this->input->post("nombre-documento");
			$fechalimite = $this->input->post("fecha-limite");
			$iddoc = $this->input->post("id-doc");
			
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$config = [
				"upload_path" => APPPATH. '../ArchivosSubidos/',
				'allowed_types' => "jpg|png|pdf|docx|jepg"
			];

			$this->load->library("upload",$config);

			if ($this->upload->do_upload('pic-file-update')) {
				$data = array("upload_data" => $this->upload->data());
				if($this->pic_model->updateDocumentacionActualizable($data,$nombredocumento,$fechalimite,$iddoc)==true){
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

	public function subirCotizaciones(){
		//El metodo is_ajax_request() de la libreria input permite verificar
		//si se esta accediendo mediante el metodo AJAX 
		if ($this->input->is_ajax_request()) {
			$proveedor = $this->input->post("proveedor");
			$fecha = $this->input->post("fecha");
			$nrocotizacion = $this->input->post("nrocotizacion");

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$config = [
				"upload_path" => APPPATH. '../ArchivosSubidos/',
				'allowed_types' => "jpg|png|pdf|docx|jepg"
			];

			$this->load->library("upload",$config);
			if ($this->upload->do_upload('pic_file')) {
				$data = array("upload_data" => $this->upload->data());
				if($this->CotizacionesModel->subirCotizacion($data,$proveedor,$fecha,$nrocotizacion)==true){
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
			$fecha = $this->input->post("fecha");
			$nroorden = $this->input->post("nroorden");
			$nrofactura = $this->input->post("nrofactura");

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$config = [
				"upload_path" => APPPATH. '../ArchivosSubidos/',
				'allowed_types' => "jpg|png|pdf|docx|jepg"
			];

			$this->load->library("upload",$config);

			if ($this->upload->do_upload('pic_file')) {
				$data = array("upload_data" => $this->upload->data());
				if($this->pic_model->subirFactura($data,$fecha,$nroorden,$nrofactura)==true){
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

	public function subirDocumentoPago(){
		//El metodo is_ajax_request() de la libreria input permite verificar
		//si se esta accediendo mediante el metodo AJAX 
		if ($this->input->is_ajax_request()) {
			$fecha = $this->input->post("fecha");
			$detalle = $this->input->post("detalle");
			$nrodocumento = $this->input->post("nrodocumento");
			$nrofactura = $this->input->post("nrofactura");

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$config = [
				"upload_path" => APPPATH. '../ArchivosSubidos/',
				'allowed_types' => "jpg|png|pdf|docx|jepg"
			];

			$this->load->library("upload",$config);

			if ($this->upload->do_upload('pic_file')) {
				$data = array("upload_data" => $this->upload->data());
				if($this->pic_model->subirComprobante($data,$fecha,$detalle,$nrodocumento,$nrofactura)==true){
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
	
}
