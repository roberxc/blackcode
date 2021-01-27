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

	public function obtenerProveedores()
    {
        $fetch_data = $this->ProveedoresModel->make_datatables_proveedores();
        $data = array();
        foreach ($fetch_data as $value)
        {

            $sub_array = array();
            $sub_array[] = '<input type="hidden" value='.$value->id_proveedor.'" class="name-file" disabled/>';
            $sub_array[] = $value->rut;
            $sub_array[] = $value->nombre;
            $sub_array[] = $value->telefono;
            $sub_array[] = '<a href="#" class="fas fa-eye" id="detalle_asistencia" data-toggle="modal"data-target="#modal-detalle-asistencia">';

            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]) ,
            "recordsTotal" => $this
                ->ProveedoresModel
                ->get_all_data_proveedores() ,
            "recordsFiltered" => $this
                ->ProveedoresModel
                ->get_filtered_data_proveedores() ,
            "data" => $data
        );
        echo json_encode($output);

    }

    

    
}

