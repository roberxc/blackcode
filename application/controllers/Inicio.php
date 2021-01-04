<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		$set_data = $this->session->all_userdata();
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activo'] = 2;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('Dashboard/Inicio');
			$this->load->view('layout/footer');
		}else if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 3) {
			$data ['activo'] = 3;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_bodeguero',$data);
			$this->load->view('Dashboard/InicioBodeguero');
			$this->load->view('layout/footer');
		}else if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 2) {
			$data ['activo'] = 2;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_trabajador',$data);
			$this->load->view('Dashboard/InicioTrabajador');
			$this->load->view('layout/footer');
		}
	}
}
