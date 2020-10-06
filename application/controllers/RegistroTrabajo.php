<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistroTrabajo extends CI_Controller {

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
		$name = $_SESSION['email'];

		if(isset($name) && $name === "proyecto"){
			$data ['activo'] = 2;
			$this->load->view('menu/menu_adminproyectos',$data);
			$this->load->view('Proyecto/Rtrabajo');
			$this->load->view('layout/footer');
		}

	}
}

?>
