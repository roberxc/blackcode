<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
    {
        parent::__construct(); // you have missed this line.
        //$this->load->model('FacturaModel');
        $this->load->model('DocumentacionModel');
		$this->load->model('AdministracionModel');
    }

	public function setNotificaciones(){
		$data ['expiracion'] = 0;
		$lista_fecha = $this->DocumentacionModel->ObtenerFechaDocActualizable();
		$fechaactual = date("d-m-Y");
		$data ['totaldocumentos'] = 0;
		foreach($lista_fecha as $row){
			//Paso de string a fecha
			$d1 = new DateTime($row->fechalimite);
			$d2 = new DateTime($fechaactual);
			$interval = $d1->diff($d2);
			$diasTotales    = $interval->d; 
			if($diasTotales == 3){
				$data ['lista_nrodocactualizables'] = $this->DocumentacionModel->ObtenerNroDocActualizable($row->fechalimite);
				$data ['expiracion'] = 1;
				$data ['totaldocumentos'] = $data ['totaldocumentos'] + 1;
			}
		}
		$this->load->view('layout/nav',$data);
	}

	public function index()
	{
		$set_data = $this->session->all_userdata();
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activo'] = 2;
			$this->setNotificaciones();
			$data ['total_registros'] = $this->AdministracionModel->totalUsuariosRegistrados();
			$data ['tareas_registradas'] = $this->AdministracionModel->obtenerTareas();
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('Dashboard/Inicio',$data);
			$this->load->view('layout/footer');
		}else if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 3) {
			$data ['activo'] = 5;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_bodeguero',$data);
			$this->load->view('Dashboard/InicioBodeguero');
			$this->load->view('layout/footer');
		}else if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 2) {
			$data ['activo'] = 2;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_trabajador',$data);
			$this->load->view('Dashboard/InicioTrabajador');
			$this->load->view('layout/footer');

		}else if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 4) {
			$data ['activo'] = 2;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_admin_personal',$data);
			$this->load->view('Dashboard/InicioAdminPersonal');
			$this->load->view('layout/footer');

		}else if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 5) {
			$data ['activo'] = 2;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_proyecto',$data);
			$this->load->view('Dashboard/InicioProyecto');
			$this->load->view('layout/footer');
		}
	}
}
