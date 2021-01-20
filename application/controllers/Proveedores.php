<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proveedores extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        //$this->load->model('FacturaModel');
        $this->load->model('ProveedoresModel');
    }

    public function index(){
        $data ['activomenu'] = 15;
		$data ['activo'] = 16;
		$this->load->view('layout/nav');
     	$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/Proveedores');
		$this->load->view('layout/footer');
    }

    public function ingresoProveedores(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('rut', 'Rut', 'required');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();

				if ($this->ProveedoresModel->registrarProveedores($ajax_data)) {
					$data = array('response' => "success", 'message' => "Proveedor ingresado correctamente!");
				} else {
					$data = array('response' => "error", 'message' => "Falló el ingreso");
				}
			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

	}

    
}

