<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asistencia extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
		
	 }

	public function index()
	{
		$data ['activomenu'] = 4;
		$data ['activo'] = 5;
		$this->load->view('layout/nav');
		$this->load->view('menu/menu_admin_personal',$data);
		$this->load->view('Asistencia/IngresarAsistencia');
		$this->load->view('layout/footer');
	}

	public function AsistenciaEspera()
	{
		$data ['activomenu'] = 4;
		$data ['activo'] = 6;
		$this->load->view('layout/nav');
		$this->load->view('menu/menu_admin_personal',$data);
		$this->load->view('Asistencia/AsistenciaEspera');
		$this->load->view('layout/footer');
	}
}
