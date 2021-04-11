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
		$this->load->model('Proyecto_model');
		$this->load->helper(array('notificacion','url'));
    }

    public function index(){
		$set_data = $this->session->all_userdata();
        if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 5) {
			$data ['activomenu'] = 15;
			$data ['activo'] = 16;
			$data['lista_proyectos'] = $this->Proyecto_model->listaProyectosSegunUsuario($set_data['ID_Usuario']);
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_proyecto',$data);
			$this->load->view('Administracion/Proveedores');
			$this->load->view('layout/footer');
		}else if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activomenu'] = 15;
			$data ['activo'] = 16;
			setNotificaciones($this->DocumentacionModel);
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
				$res = $this->ProveedoresModel->registrarProveedores($ajax_data);

				if ($res) {
					$data = array('response' => "success", 'message' => "Proveedor ingresado correctamente!");
				} else {
					$data = array('response' => "error", 'message' => "El rut ingresado ya existe");
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
            
			if($value->estado == 1){
				$sub_array[] = '<span class="badge badge-danger"><i class="fa fa-user"></i> &nbsp;'.$value->nombre.'</span>';
				$sub_array[] = $value->telefono;
				$sub_array[] = '<span class="badge badge-danger">&nbsp;Inactivo</span>';
			}

			if($value->estado == 0){
				$sub_array[] = '<span class="badge badge-success"><i class="fa fa-user"></i> &nbsp;'.$value->nombre.'</span>';
				$sub_array[] = $value->telefono;
				$sub_array[] = '<span class="badge badge-success">&nbsp;Activo</span>';
			}
			
			$sub_array[] = '<button class="btn btn-primary btn-sm" data-toggle="modal"data-target="#modal-detalle-proveedor" onclick="setTablaDetalle(this)"><i class="far fa-eye"></i></button>&nbsp<button class="btn btn-warning btn-sm" id="editar_asistencia" data-toggle="modal"data-target="#modal-editar-proveedor" onclick="setTablaEditar('.$value->id_proveedor.')"><i class="fas fa-edit"></i></button>&nbsp<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-confirmacion" onclick="setIDRegistro('.$value->id_proveedor.')"><i class="fas fa-trash"></i></button>';

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

	public function obtenerDetalleProveedoresEdit(){
		$ajax_data = $this->input->post(); //Datos que vienen por POST
		
		$detalle_proveedor = $this->ProveedoresModel->ObtenerDetalleProveedores($ajax_data['iditem']);
		
		$response = "<div class='table-responsive'>";
		$response .= "<table class='table table-bordered' id='table-proveedor'>";
		foreach($detalle_proveedor as $row){ 

			$response .="<TR>";
			$response .="<TH>#</TH>";
			$response .="<TD contenteditable=true id='idproveedor'>".$row->id_proveedor."</TD>";
			$response .="</TR>";


			$response .="<TR>";
			$response .="<TH>Rut</TH>";
			$response .="<TD contenteditable=true id='rut'>".$row->rut."</TD>";
			$response .="</TR>";
			
			$response .="<TR>";
			$response .="<TH>Nombre</TH>";
			$response .="<TD contenteditable=true id='nombre'>".$row->nombre."</TD>";
			$response .="</TR>";
			
			$response .="<TR>";
			$response .="<TH>Direccion</TH>";
			$response .="<TD contenteditable=true id='direccion'>".$row->direccion."</TD>";
			$response .="</TR>";

			$response .="<TR>";
			$response .="<TH>Telefono</TH>";
			$response .="<TD contenteditable=true id='telefono'>".$row->telefono."</TD>";
			$response .="</TR>";
			
			$response .="<TR>";
			$response .="<TH>Correo</TH>";
			$response .="<TD contenteditable=true id='correo'>".$row->correo."</TD>";
			$response .="</TR>";
			
			$response .="<TR>";
			$response .="<TH>Descripcion</TH>";
			$response .="<TD contenteditable=true id='descripcion'>".$row->descripcion."</TD>";
			$response .="</TR>";
			
			$response .="<TR>";
			$response .="<TH>Dias credito</TH>";
			$response .="<TD contenteditable=true id='credito'>".$row->diascredito."</TD>";
			$response .="</TR>";
		}
		$response .= "</table>";
		$response .= "</div>";

		$data = array('response' => 'success', 'detalle' => $response);


		echo json_encode($data);
	}

    //Eliminar un documento de documentos peramentes cambiando su estado
	public function cambiarEstadoProveedor(){
		$ajax_data = $this->input->post();
		$res = $this->ProveedoresModel->updateEstadoProveedor($ajax_data);
        if($res){
            $data = array('response' => 'success', 'message' => 'Exito');
        }else{
            $data = array('response' => 'error', 'message' => $res);
        }
		echo json_encode($data);

	}


	public function actualizarProveedor(){
		$ajax_data = $this->input->post();
		$res = $this->ProveedoresModel->updateProveedor($ajax_data);
        if($res){
            $data = array('response' => 'success', 'message' => 'Exito');
        }else{
            $data = array('response' => 'error', 'message' => $res);
        }
		echo json_encode($data);

	}
    
}

