<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Upload extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('pic_model');
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
	
}
