<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentacion extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
		$this->load->model('DocumentacionModel');
	 }

	public function index()
	{

	}

	public function Permamente()
	{
		$data ['documentos_permamentes'] = $this->DocumentacionModel->ObtenerDocumentosPermamentes();
		$data ['activomenu'] = 11;
		$data ['activo'] = 8;
		$this->load->view('layout/nav');
     	$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/documentacionPermamente',$data);
		$this->load->view('layout/footer');
	}

	public function Actualizable()
	{
		$data ['documentos_actualizables'] = $this->DocumentacionModel->ObtenerDocumentosActualizables();
		$data ['activomenu'] = 11;
		$data ['activo'] = 12;
		$this->load->view('layout/nav');
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/documentacionActualizable',$data);
		$this->load->view('layout/footer');
	}
	
	public function filtrarDocumentacionPermamente(){
		$nombre = $this->input->post('nombre');
		$fecha = $this->input->post('fecha');

		$resultado = $this->DocumentacionModel->FiltroDocumentacionPermamente($nombre,$fecha);
		echo json_encode($resultado);
	}
}
