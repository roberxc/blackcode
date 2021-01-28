<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CMantencion extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
		$this->load->model('Vehiculo');
		$this->load->model('Personal');
		$this->load->model('Mantencion');


	 }

	public function index(){
		$set_data = $this->session->all_userdata();
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activomenu'] = 20;
			$data ['activo'] = 14;
			$data ['lista_vehiculos'] = $this->Vehiculo->ObtenerVehiculos();
			$data ['lista_personal'] = $this->Personal->ObtenerListaPersonal();
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('Administracion/VMantencion',$data);
			$this->load->view('layout/footer');
		}
	}
}