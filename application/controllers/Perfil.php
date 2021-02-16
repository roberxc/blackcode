<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
		
	 }

	public function index()
	{
		$set_data = $this->session->all_userdata();
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activomenu'] = 2;
			$data ['activo'] = 7;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('Perfil/miPerfil',$data);
			$this->load->view('layout/footer');
		}else if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 3) {
			$data ['activomenu'] = 2;
			$data ['activo'] = 7;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_bodeguero',$data);
			$this->load->view('Perfil/miPerfil',$data);
			$this->load->view('layout/footer');
		}else if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 2) {
			$data ['activomenu'] = 2;
			$data ['activo'] = 7;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_trabajador',$data);
			$this->load->view('Perfil/miPerfil',$data);
			$this->load->view('layout/footer');

		}
	}

	
}
