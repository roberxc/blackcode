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
	
	public function file_data(){
		//validate the form data 

		//$this->form_validation->set_rules('pic_title', 'Picture Title', 'required');

       // if ($this->form_validation->run() == FALSE){
		//	$this->load->view('upload_form');
		//}else{
			
			//get the form values
			$micodigo= $this->input->post('codigo1');
			//$data['pic_desc'] = $this->input->post('pic_desc', TRUE);

			//file upload code 
			//set file upload settings 
			$config['upload_path']          = APPPATH. './models/DocumentosSubidos/';
			$config['allowed_types']        = 'jpg|png|pdf|docx';
			$config['max_size']             = 500;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('pic_file')){
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
				//$this->load->view('planilla', $error);
			}else{

				//file is uploaded successfully
				//now get the file uploaded data 
				$upload_data = $this->upload->data();
				

				//get the uploaded file name
				$data['pic_file'] = $upload_data['file_name'];
			

				//store pic data to the db
				$this->pic_model->registro($data,$micodigo);

				redirect('DetalleOperaciones/'.$micodigo);
			}
			
		//}
	}
}
