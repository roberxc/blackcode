<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

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
	public function index()
	{

		$user = $this->input->post('email');
		$pass = $this->input->post('pass');

		$data = array('email' => $user,
						'id' => 0,
						'login' => true);
		$this->session->set_userdata($data);

		$name = $_SESSION['email'];
		
		if(isset($name) && $name === "supremo"){
			$data ['activo'] = 2;
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('Dashboard/inicio');
			
		}else if(isset($name) && $name === "proyecto"){
			$data ['activo'] = 2;
			$this->load->view('menu/menu_adminproyectos',$data);
			$this->load->view('Dashboard/inicio');
			$this->load->view('layout/footer');
		}else if(isset($name) && $name === "bodeguero"){
			$data ['activo'] = 2;
			$this->load->view('menu/menu_bodeguero',$data);
			$this->load->view('Dashboard/inicio');
			$this->load->view('layout/footer');
		}else if(isset($name) && $name === "trabajador"){
			$data ['activo'] = 2;
			$this->load->view('menu/menu_trabajador',$data);
			$this->load->view('Dashboard/InicioTrabajador');
			$this->load->view('layout/footer');
		}
	}
}
