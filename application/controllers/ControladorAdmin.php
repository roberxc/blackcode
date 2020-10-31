<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ControladorAdmin extends CI_Controller {

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


	 

	public function CajaEgreso()
	{
		
		$data ['activo'] = 1;
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Dashboard/Egreso');
		$this->load->view('layout/footer');
	}

	public function CajaIngreso()
	{
		
		$data ['activo'] = 1;
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Dashboard/Ingreso');
		$this->load->view('layout/footer');
	}
	public function MenuCaja()
	{
		
		$data ['activo'] = 5;
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Dashboard/CajaChica');
		$this->load->view('layout/footer');
	}
	public function vueltocaja()
	{
		
		$data ['activo'] = 5;
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Dashboard/Vuelto');
		$this->load->view('layout/footer');
	}
	public function registroTrabajador()
	{
		
		$data ['activo'] = 6;
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/Registro');
		$this->load->view('layout/footer');
	}
}

?>