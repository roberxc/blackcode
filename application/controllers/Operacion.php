<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operacion extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
		$this->load->library('Mobile_Detect');
		
	 }

	public function index()
	{
		$name = $_SESSION['email'];
		$detect = new CI_Mobile_Detect();
		if ($detect->isMobile()) {
			// Detecta si es un móvil
			if(isset($name) && $name === "trabajador"){
				$data ['dispositivo'] = 'Mobil';
				$this->load->view('Trabajador/index');
			}
		}else{
			$data ['activo'] = 2;
			$data ['dispositivo'] = 'PC';
			$this->load->view('menu/menu_trabajador',$data);
			$this->load->view('Trabajador/OperacionPC',$data);
			$this->load->view('layout/footer');

		}
	}

	public function trabajoDiario()
	{
		$name = $_SESSION['email'];
		if(isset($name) && $name === "admin"){
			$data ['activo'] = 3;
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('TrabajoDiario/TrabajoDiario');
			$this->load->view('layout/footer');

		}
	}
}
