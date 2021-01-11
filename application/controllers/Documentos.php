<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos extends CI_Controller {

	public function index()
	{
		$data ['activo'] = 2;
		$this->load->view('menu/menu_principal',$data);
		$this->load->view('Proyecto/Estado');
		$this->load->view('layout/footer');
	}
}

?>
