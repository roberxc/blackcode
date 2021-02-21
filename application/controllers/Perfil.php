<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
		$this->load->model('DocumentacionModel');
		$this->load->model('PerfilModel');
		$this->load->model('Auth');
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

		$data ['lista_perfil'] = $this->PerfilModel->obtenerPerfil($set_data['ID_Usuario']);
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activomenu'] = 2;
			$data ['activo'] = 7;
			$this->setNotificaciones();
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('Perfil/miPerfil',$data);
			$this->load->view('layout/footer');
		}else if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 3) {
			$data ['activomenu'] = 2;
			$data ['activo'] = 7;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_bodeguero',$data);
			$this->load->view('Perfil/miPerfil',$data);
			$this->load->view('layout/footer');
		}else if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 2) {
			$data ['activomenu'] = 2;
			$data ['activo'] = 7;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_trabajador',$data);
			$this->load->view('Perfil/miPerfil',$data);
			$this->load->view('layout/footer');

		}else if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 4) {
			$data ['activomenu'] = 2;
			$data ['activo'] = 7;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_admin_personal',$data);
			$this->load->view('Perfil/miPerfil',$data);
			$this->load->view('layout/footer');

		}
	}

	public function updatePerfil(){
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post();
			$currentpassword = $ajax_data['currentpassword'];
			$set_data = $this->session->all_userdata();
			if($this->Auth->getCurrentPassword($set_data['correo'],$currentpassword)){
				$setpassword = $ajax_data['setpassword'];
				$verifypassword = $ajax_data['setpassword2'];
				if($setpassword === $verifypassword){
					$res = $this->PerfilModel->updatePerfil($ajax_data,$set_data); 
					if ($res) {
						$data = array('response' => "success", 'message' => "Perfil actualizado correctamente!");
					}
				}else{
					$data = array('response' => "error", 'message' => "La contraseña nueva ingresada y la confirmación de esta no coinciden");
				}
			}else{
				$data = array('response' => "error", 'message' => "Contraseña actual ingresada no es valida");
			}
			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

		

    }

	
}
