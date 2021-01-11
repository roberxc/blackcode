<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentacion extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
		
	 }

	public function index()
	{

	}

	public function Permamente()
	{
		$data ['activomenu'] = 11;
		$data ['activo'] = 8;
		$this->load->view('layout/nav');
     	$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/documentacionPermamente');
		$this->load->view('layout/footer');
	}

	public function Actualizable()
	{
		$data ['activomenu'] = 11;
		$data ['activo'] = 12;
		$this->load->view('layout/nav');
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/documentacionActualizable');
		$this->load->view('layout/footer');
	}

}
