<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operacion extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
		$this->load->library('Mobile_Detect');
		
	 }

	public function index()
	{
		$detect = new CI_Mobile_Detect();
		if ($detect->isMobile()) {
			// Detecta si es un móvil
				$data ['dispositivo'] = 'Mobil';
				$this->load->view('Trabajador/index');
			
		}else{
			$data ['activo'] = 8;
			$data ['activomenu'] = 1;
			$data ['dispositivo'] = 'PC';
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_trabajador',$data);
			$this->load->view('Trabajador/OperacionPC',$data);
			$this->load->view('layout/footer');

		}
	}

	public function trabajoDiario()
	{
		$set_data = $this->session->all_userdata();
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activo'] = 3;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('TrabajoDiario/TrabajoDiario');
			$this->load->view('layout/footer');

		}
	}

	public function stockBodega()
	{
		$set_data = $this->session->all_userdata();
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 2) {
			$data ['activo'] = 9;
			$data ['activomenu'] = 2;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_trabajador',$data);
			$this->load->view('Trabajador/StockBodega');
			$this->load->view('layout/footer');

		}

		else if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activo'] = 9;
			$data ['activomenu'] = 1;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('Trabajador/StockBodega');
			$this->load->view('layout/footer');

		}
	}

	public function trabajosRealizados()
	{
		$set_data = $this->session->all_userdata();
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 2) {
			$data ['activo'] = 10;
			$data ['activomenu'] = 1;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_trabajador',$data);
			$this->load->view('Trabajador/TrabajosRealizados');
			$this->load->view('layout/footer');

		}
	}
}
