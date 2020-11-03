<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('users/users_rules','string')); 
        $this->load->model('ModelsUsers');   
    
    }
    public function index(){
        echo "Tabla de usuarios ";
    }
    public function create(){
       $vista = $this->load->view('admin/create_user','',TRUE);
       $this->getTemplate($vista);
    }
    public function store(){
        $user = $this->input->post('user');
        $correo = $this->input->post('correo');
        $range = $this->input->post('range');
        $name = $this->input->post('name');
        $lastname = $this->input->post('lastname');
        $area = $this->input->post('area');
        $especialidad = $this->input->post('especialidad');
        $cedula = $this->input->post('cedula');

        $this->form_validation->set_rules(getCreateUserRules());
        
        if($this->form_validation->run() == FALSE){
            $this->output->set_status_header(400);

        }else {

            $user = array(
                'nombre_usuario' => $user,
                'contrasena' => random_string('alnum',8),
                'correo' => $correo,
                'range' => $range,
                'status' => 1,

            );
            $user_info = array(
                'nombre' => $name,
                'apellido' => $lastname,
                'cedula' => $cedula,
                'especialidad' => $especialidad,
                'area' => $area,
            );
            if(!$this->ModelsUsers->save($user, $user_info)){
                $this->output->set_status_header(500);
            }else{
                $this->session->set_flashdata('msg','El usuario a sido registrado');
                redirect(base_url('users'));

            }

            

        }

        $vista = $this->load->view('admin/create_user','',TRUE);
        $this->getTemplate($vista);

    }
    public function getTemplate($view){
        $data = array(
            'head' =>  $this->load->view('layout/head','',TRUE),
            'nav' => $this->load->view('layout/nav','',TRUE),
            'aside' => $this->load->view('layout/aside','',TRUE),
            'content' => $view,
            'footer' => $this->load->view('layout/footer','',TRUE),  
        );   
        $this->load->view('dashboard',$data);

    }
}