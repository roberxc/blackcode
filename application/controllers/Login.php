<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','session'));
		$this->load->helper(array('auth/login_rules'));
		$this->load->model('Auth');
	}
	
	public function index(){
		$this->load->view('Login');
		
	}


	public function testlogin(){
		$test = "SI FUNCIONA";
		echo json_encode($test);
	}

	public function validate(){
		$this->form_validation->set_error_delimiters('', '');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$rules = getLoginRules();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() === FALSE){
			$this->output->set_status_header(400);
			$errors = array(
				'email' => form_error('email'),
				'password' => form_error('password')
			);
			echo json_encode($errors);
			
		}else{
			$usr= $this->input->post('email');
			$pass= $this->input->post('password');
			if(!$res = $this->Auth->login($usr, $pass)){
				echo json_encode(array('msg' => 'Error verifique sus credenciales '));
				$this->output->set_status_header(401);
				exit;

			}

			if($res->estado == 1){
				echo json_encode(array('msg' => 'Usuario inactivo, comuniquese con administración'));
				$this->output->set_status_header(401);
				exit;

			}else{
				$data = array(
					'ID_Usuario' => $res->id_usuario,
					'estado' =>$res->estado,
					'id_tipousuario' => $res->id_tipousuario,
					'correo' => $res->correo,
					'nombre_completo' => $res->nombre_completo,
					'is_logged' => TRUE,
	
				);
				$this->session->set_userdata($data);
	
				$this->session->set_flashdata('msg', 'Bienvenido al sistema'.$data['nombre_completo']);
				echo json_encode(array("url" => base_url('Inicio')));


			}

		}

	}
	public function logout(){
		$vars = array('ID_Usuario','id_tipousuario','nombre_usuario','is_logged');
		$this->session->unset_userdata($vars);
		$this->session->sess_destroy();
		redirect('login');
			//aqui se destuye la sesion y te redirige a login
	}
}
