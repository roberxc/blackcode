<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
    {
        parent::__construct(); // you have missed this line.
        //$this->load->model('FacturaModel');
        $this->load->model('DocumentacionModel');
		$this->load->model('AdministracionModel');
		$this->load->model('CajaChicaModel');
		$this->load->model('Proyecto_model');
		$this->load->helper(array('notificacion','url'));
    }

	public function index()
	{
		$set_data = $this->session->all_userdata();
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activo'] = 2;
			$data ['totalcajachica'] = $this->CajaChicaModel->obtenerTotalCajaChica();
			$data ['totalcostosfijos'] = $this->CajaChicaModel->ObtenerTotalCostosFijos();
			//Cargado desde el helper (notificacion_helper)
			setNotificaciones($this->DocumentacionModel);
			$data ['total_registros'] = $this->AdministracionModel->totalUsuariosRegistrados();
			$data ['tareas_registradas'] = $this->AdministracionModel->obtenerTareas();
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('Dashboard/Inicio',$data);
			$this->load->view('layout/footer');
		}else if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 3) {
			$data ['activo'] = 2;
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
			$data['lista_proyectos'] = $this->Proyecto_model->listaProyectosSegunUsuario($set_data['ID_Usuario']);
			$data['proyectos_acargo'] = $this->Proyecto_model->listaProyectosEjecutados($set_data['ID_Usuario']);
			$data['proyectos_en_ejecucion'] = $this->Proyecto_model->listaProyectosEnEjecucion();

			
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_proyecto',$data);
			$this->load->view('Dashboard/InicioProyecto',$data);
			$this->load->view('layout/footer');
		}
	}
}
