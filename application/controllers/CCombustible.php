<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CCombustible extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
	 }

	public function index(){
		$set_data = $this->session->all_userdata();
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activomenu'] = 20;
			$data ['activo'] = 99;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('Administracion/VCombustible');
			$this->load->view('layout/footer');
		}
	}
}