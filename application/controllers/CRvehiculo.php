<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRvehiculo extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
		$this->load->model('Vehiculo');
		$this->load->helper(array('notificacion','url'));
		$this->load->model('DocumentacionModel');
	 }

	public function index()
	{
		$set_data = $this->session->all_userdata();
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activomenu'] = 20;
			$data ['activo'] = 13;
			$data ['total_vehiculos'] = $this->Vehiculo->ObtenerTotalVehiculos();

			setNotificaciones($this->DocumentacionModel);
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('Administracion/VRvehiculo',$data);
			$this->load->view('layout/footer');
		}
	}
}