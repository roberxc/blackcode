<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CLibroMantenciones extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
		$this->load->helper(array('notificacion','url'));
		$this->load->model('DocumentacionModel');
	 }

	public function index(){
		$set_data = $this->session->all_userdata();
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activomenu'] = 20;
			$data ['activo'] = 96;
			setNotificaciones($this->DocumentacionModel);
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('Administracion/VLibroMantenciones');
			$this->load->view('layout/footer');
		}
	}
}