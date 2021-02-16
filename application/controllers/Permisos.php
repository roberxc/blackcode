<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permisos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        $this->load->model('VacacionesModel');
        $this->load->model('AsistenciaModel');
        $this->load->model('PermisosModel');
        $this->load->model('Personal');
    }

    public function index()
    {
        $data['activomenu'] = 11;
        $data['activo'] = 123;
        $data['lista_personal'] = $this->AsistenciaModel->listaPersonal();
        $data['lista_permisos'] = $this->PermisosModel->ObtenerTipoPermisos();
        $this->load->view('layout/nav');
        $this->load->view('menu/menu_admin_personal', $data);
        $this->load->view('Asistencia/Permisos');
        $this->load->view('layout/footer');
    }

    public function obtenerPermisos()
    {
        $fetch_data = $this->PermisosModel->make_datatables_permisos();
        $data = array();
        foreach ($fetch_data as $value){
            $sub_array = array();
            $sub_array[] = $value->rut;
            $sub_array[] = $value->nombrecompleto;
            $sub_array[] = $value->tipopermiso;
            $sub_array[] = $value->fecha_inicio;
            $sub_array[] = $value->fecha_termino;
            //$sub_array[] = '<a href="#" class="fas fa-eye" id="detalle_archivos" data-toggle="modal"data-target="#modal-archivos" onclick="listaDocumentos(this)">';
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]) ,
            "recordsTotal" => $this->PermisosModel->get_all_data_permisos(),
            "recordsFiltered" => $this->PermisosModel->get_filtered_data_permisos(),
            "data" => $data
        );
        echo json_encode($output);

    }

    public function registrarPermiso(){
		//El metodo is_ajax_request() de la libreria input permite verificar
		//si se esta accediendo mediante el metodo AJAX 
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('rutpersonal', 'Rut', 'required');
			$this->form_validation->set_rules('tipopermiso', 'Tipo permiso', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			}else{
				$ajax_data = $this->input->post();
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				$config = [
					"upload_path" => APPPATH. '../ArchivosSubidos/',
					'allowed_types' => "*"
				];
				$this->load->library("upload",$config);
				if ($this->upload->do_upload('pic_file')) {
					$data = array("upload_data" => $this->upload->data());
					$res = $this->PermisosModel->registrarPermiso($data,$ajax_data);
					if($res){
						$data = array('response' => "success", 'message' => "Permiso ingresado correctamente!");
					}
				}else{
					$data = array('response' => "error", 'message' => $this->upload->display_errors());
				}
				
			}
			echo json_encode($data);
		}else{
			show_404();
		}
	}

    
}

