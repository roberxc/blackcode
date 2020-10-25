<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operacion extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
		}


		else{
			$data ['activo'] = 2;
			$data ['dispositivo'] = 'PC';
			$this->load->view('menu/menu_trabajador',$data);
			$this->load->view('Trabajador/OperacionPC',$data);
			$this->load->view('layout/footer');

		}
	}
}
