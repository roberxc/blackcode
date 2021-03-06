<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Upload extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('pic_model');
		$this->load->model('CotizacionesModel');
		$this->load->model('FacturasModel');
		$this->load->helper(array('form', 'url'));
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
				'allowed_types' => "*"
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
				'allowed_types' => "*"
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
				'allowed_types' => "*"
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
				'allowed_types' => "*"
			];

			$this->load->library("upload",$config);

			if ($this->upload->do_upload('pic_file_update')) {
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
	
}
