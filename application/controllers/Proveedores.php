<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proveedores extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        //$this->load->model('FacturaModel');
        $this->load->model('ProveedoresModel');
		$this->load->model('DocumentacionModel');
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

    public function index(){
		$set_data = $this->session->all_userdata();
        if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 5) {
			$data ['activomenu'] = 15;
			$data ['activo'] = 16;
			$this->setNotificaciones();
			$this->load->view('menu/menu_proyecto',$data);
			$this->load->view('Administracion/Proveedores');
			$this->load->view('layout/footer');
		}else if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activomenu'] = 15;
			$data ['activo'] = 16;
			$this->setNotificaciones();
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('Administracion/Proveedores');
			$this->load->view('layout/footer');
		
		}
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
            $sub_array[] = $value->id_proveedor;
            $sub_array[] = $value->rut;
            $sub_array[] = $value->nombre;
            $sub_array[] = $value->telefono;
            $sub_array[] = '<a href="#" class="fas fa-eye" id="detalle_asistencia" data-toggle="modal"data-target="#modal-detalle-proveedor" onclick="setTablaDetalle(this)">';

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

    public function obtenerDetalleProveedores(){
		$ajax_data = $this->input->post(); //Datos que vienen por POST
		
		$detalle_proveedor = $this->ProveedoresModel->ObtenerDetalleProveedores($ajax_data['iditem']);
		
		$response = "<div class='table-responsive'>";
		$response .= "<table class='table table-bordered'>";
		foreach($detalle_proveedor as $row){ 
			$response .="<TR>";
			$response .="<TH>Rut</TH>";
			$response .="<TD>".$row->rut."</TD>";
			$response .="</TR>";
			
			$response .="<TR>";
			$response .="<TH>Nombre</TH>";
			$response .="<TD>".$row->nombre."</TD>";
			$response .="</TR>";
			
			$response .="<TR>";
			$response .="<TH>Direccion</TH>";
			$response .="<TD>".$row->direccion."</TD>";
			$response .="</TR>";

			$response .="<TR>";
			$response .="<TH>Telefono</TH>";
			$response .="<TD>".$row->telefono."</TD>";
			$response .="</TR>";
			
			$response .="<TR>";
			$response .="<TH>Correo</TH>";
			$response .="<TD>".$row->correo."</TD>";
			$response .="</TR>";
			
			$response .="<TR>";
			$response .="<TH>Descripcion</TH>";
			$response .="<TD>".$row->descripcion."</TD>";
			$response .="</TR>";
			
			$response .="<TR>";
			$response .="<TH>Dias credito</TH>";
			$response .="<TD>".$row->diascredito."</TD>";
			$response .="</TR>";
		}
		$response .= "</table>";
		$response .= "</div>";

		$data = array('response' => 'success', 'detalle' => $response);


		echo json_encode($data);
	}

    

    
}

