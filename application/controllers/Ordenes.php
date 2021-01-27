<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ordenes extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        //$this->load->model('FacturaModel');
        $this->load->model('CotizacionesModel');
        $this->load->model('ProveedoresModel');
        $this->load->model('OrdenesModel');
        $this->load->model('Bodega');
    }

    public function index(){
        $data['lista_materiales'] = $this->OrdenesModel->listaMateriales();
        $data['lista_proveedores'] = $this->ProveedoresModel->listaProveedores();
        $data['lista_bodegas'] = $this->OrdenesModel->listaBodegas();
        $data ['activomenu'] = 15;
		$data ['activo'] = 15;
		$this->load->view('layout/nav');
     	$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/Ordenes',$data);
		$this->load->view('layout/footer');
    }

    public function obtenerOrdenes()
    {
        $fetch_data = $this->CotizacionesModel->make_datatables_ordenes();
        $data = array();
        foreach ($fetch_data as $value){
            $sub_array = array();
            $sub_array[] = '<input type="text" value='.$value->id_cotizacion.' class="name-file" disabled/>';
            $sub_array[] = $value->nombre;
            $sub_array[] = $value->fecha;
            $sub_array[] = '<a href="#" class="fas fa-eye" id="detalle_asistencia" data-toggle="modal"data-target="#modal-detalle-asistencia">';
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]) ,
            "recordsTotal" => $this->CotizacionesModel->get_all_data_cotizaciones(),
            "recordsFiltered" => $this->CotizacionesModel->get_filtered_data_cotizaciones(),
            "data" => $data
        );
        echo json_encode($output);

    }

    public function productoNuevo(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('producto', 'Nombre', 'required');
            $this->form_validation->set_rules('valor', 'Valor', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();

				if ($this->OrdenesModel->registrarNuevoProducto($ajax_data)) {
					$data = array('response' => "success", 'message' => "Producto ingresado correctamente!");
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

