<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Administracion extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('CajaChicaModel');
		$this->load->model('Vehiculo');
		$this->load->model('Proyecto_model');
		$this->load->model('Combustible');
		$this->load->model('Mantencion');
		$this->load->model('OperacionesModel');
		$this->load->model('AdministracionModel');
		$this->load->helper(array('notificacion','url'));
		$this->load->model('Users');
		$this->load->model('DocumentacionModel');
	}

	public function informeEgresos(){
		
		$data ['activo'] = 10;
		setNotificaciones($this->DocumentacionModel);
     	$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/InformeEgresos');
		$this->load->view('layout/footer');
	}

	public function CostosFijos(){
		$data ['activomenu'] = 5;
		$data ['activo'] = 6;
		$data['lista_tipocostos'] = $this->AdministracionModel->listaTipoCostos();
		setNotificaciones($this->DocumentacionModel);
     	$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/CostosFijos',$data);
		$this->load->view('layout/footer');
	}

	public function CajaEgreso()
	{
		$data ['activomenu'] = 5;
		$data ['activo'] = 5;
		setNotificaciones($this->DocumentacionModel);
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/Egreso');
		$this->load->view('layout/footer');
	}

	public function listaRegistros(){
		$data ['activo'] = 8;
		$data ['activomenu'] = 2;
		setNotificaciones($this->DocumentacionModel);
		$data['lista_tipousuarios'] = $this->AdministracionModel->listaTipoUsuarios();
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/listaRegistros',$data);
		$this->load->view('layout/footer');

	}

	public function CajaIngreso()
	{
		$data ['activomenu'] = 5;
		$data ['activo'] = 5;
		$data['include_css'] = array("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css");
		setNotificaciones($this->DocumentacionModel);
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/Ingreso',$data);
		$this->load->view('layout/footer');
	}
	public function MenuCaja()
	{
		$data ['activomenu'] = 5;
		$data ['activo'] = 5;
		$data ['totalcajachica'] = $this->CajaChicaModel->obtenerTotalCajaChica();
		setNotificaciones($this->DocumentacionModel);
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/CajaChica');
		$this->load->view('layout/footer');
	}
	public function vueltocaja()
	{
		$data ['activomenu'] = 5;
		$data ['activo'] = 5;
		setNotificaciones($this->DocumentacionModel);
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/Vuelto');
		$this->load->view('layout/footer');
	}
	public function registroTrabajador(){
		$data ['activo'] = 6;
		$data ['activomenu'] = 2;
		setNotificaciones($this->DocumentacionModel);
		$data['lista_tipousuarios'] = $this->AdministracionModel->listaTipoUsuarios();
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/GestionCuentas');
		$this->load->view('layout/footer');
	}
	
	
	//Metodos para registro con base de datos
	public function ingresoCajaChica(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('montoingreso', 'Monto', 'required');
			$this->form_validation->set_rules('fechaingreso', 'Fecha', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();

				if ($this->CajaChicaModel->registroIngreso($ajax_data['fechaingreso'],$ajax_data['montoingreso'])) {
					$data = array('response' => "success", 'message' => "Monto ingresado correctamente!");
				} else {
					$data = array('response' => "error", 'message' => "Falló el ingreso");
				}
			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

	}

	public function egresoCajaChica(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('montoegreso', 'Monto', 'required|numeric|greater_than[0]');
			$this->form_validation->set_rules('fechaegreso', 'Fecha', 'required');
			$this->form_validation->set_rules('destinatario', 'Destinatario', 'required');
			$total = $this->CajaChicaModel->obtenerTotalCajaChica();
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				if($ajax_data['montoegreso']<=$total[0]->balance){
					if ($this->CajaChicaModel->registroEgreso($ajax_data['fechaegreso'],abs($ajax_data['montoegreso']),
						$ajax_data['destinatario'],$ajax_data['detalle'])) {
					$data = array('response' => "success", 'message' => "Egreso registrado correctamente!");
					} else {
						$data = array('response' => "error", 'message' => "Falló el ingreso");
					}
				}else{
					$data = array('response' => "error", 'message' => "El monto ingresado es mayor al total de la caja chica");
				}
			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

	}

	public function obtenerIngresosCajaChica(){
		$fetch_data = $this->CajaChicaModel->make_datatables_cajaingresos();
        $data = array();
        foreach ($fetch_data as $value){
            $sub_array = array();
			$sub_array[] = $value->id;
            $sub_array[] = $value->fechaingreso;
			$sub_array[] = $value->montoingreso;
			$sub_array[] = '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EditarIngreso" id="id_cajachica" value='.$value->id.'><i class="far fa-edit"></i></button>&nbsp<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-confirmacion" value='.$value->id.' onclick="setIDIngreso('.$value->id.')"><i class="fas fa-trash"></i></button>';
			$data[] = $sub_array;
        }

        $output = array(
            "draw" => intval($_POST["draw"]) ,
            "recordsTotal" => $this->CajaChicaModel->get_all_data_cajaingresos() ,
            "recordsFiltered" => $this->CajaChicaModel->get_filtered_data_cajaingresos() ,
            "data" => $data
        );
        echo json_encode($output);

	}

	public function obtenerRegistrosUsuarios(){
		$fetch_data = $this->AdministracionModel->make_datatables_registrousuarios();
        $data = array();
        foreach ($fetch_data as $value){
            $sub_array = array();
			$sub_array[] = $value->id_usuario;
            $sub_array[] = $value->rut;
			if($value->estado == 1){
				$sub_array[] = '<span class="badge badge-danger"><i class="fa fa-user"></i> &nbsp;'.$value->nombre.'</span>';
			}

			if($value->estado == 0){
				$sub_array[] = '<span class="badge badge-success"><i class="fa fa-user"></i> &nbsp;'.$value->nombre.'</span>';
			}
			
			$sub_array[] = $value->correo;
			$sub_array[] = $value->tipo;
			if($value->estado == 1){
				$sub_array[] = '<span class="badge badge-danger">Inactivo</span>';
			}
			if($value->estado == 0){
				$sub_array[] = '<span class="badge badge-success">Activo</span>';
			}
			$sub_array[] = '<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-confirmacion" onclick="setIDUsuario(this)"><i class="fas fa-trash"></i></button><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-editar" onclick="setIDUsuario(this)"><i class="fas fa-edit"></i></button>';			
			$data[] = $sub_array;
        }

        $output = array(
            "draw" => intval($_POST["draw"]) ,
            "recordsTotal" => $this->AdministracionModel->get_all_data_registrousuarios() ,
            "recordsFiltered" => $this->AdministracionModel->get_filtered_data_registrousuarios() ,
            "data" => $data
        );
        echo json_encode($output);

	}

	public function obtenerEgresosCajaChica(){
		$fetch_data = $this->CajaChicaModel->make_datatables_cajaegresos();
        $data = array();
        foreach ($fetch_data as $value){
            $sub_array = array();
            $sub_array[] = $value->fechaegreso;
			$sub_array[] = $value->montoegreso;
			$sub_array[] = $value->destinatario;
			$sub_array[] = $value->detalle;
			if($value->estado == 2){
				$sub_array[] = '<span class="badge badge-success">Reingresado</span>';
				$sub_array[] = '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EditarEgreso" id="id_egresoupdate" value='.$value->id.','.$value->iddestinatario.'><i class="far fa-edit"></i></button>';
			}

			if($value->estado == 1){
				$sub_array[] = '<span class="badge badge-warning">Ingresado</span>';
				$sub_array[] = '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#EditarEgreso" id="id_egresoupdate" value='.$value->id.','.$value->iddestinatario.'><i class="far fa-edit"></i></button>&nbsp<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#EliminarEgreso" id="id_egresodelete" value='.$value->id.'><i class="fas fa-trash"></i></button>';
			}
			$data[] = $sub_array;
        }

        $output = array(
            "draw" => intval($_POST["draw"]) ,
            "recordsTotal" => $this->CajaChicaModel->get_all_data_cajaegresos() ,
            "recordsFiltered" => $this->CajaChicaModel->get_filtered_data_cajaegresos() ,
            "data" => $data
        );
        echo json_encode($output);
	}

	public function obtenerVueltosCajaChica(){
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post();
			$res = $this->CajaChicaModel->obtenerVueltos($ajax_data['fecha_vuelto']);
			echo json_encode($res);
		} else {
			echo "'No direct script access allowed'";
		}
	}

	//Metodos para la gestion de cuentas, registro de cuentas
	public function registroCuentas(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('name', 'Nombre completo', 'required');
			$this->form_validation->set_rules('rut', 'Rut', 'required');
			$this->form_validation->set_rules('telefono', 'Telefono', 'required');
			$this->form_validation->set_rules('email', 'Correo', 'required|valid_email');
			$this->form_validation->set_rules('tipo', 'Tipo', 'required');
			$this->form_validation->set_rules('password', 'Contraseña', 'required');
			$this->form_validation->set_rules('password_confirm', 'Confirmar contraseña', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				$password1 = $ajax_data['password'];
				$password2 = $ajax_data['password_confirm'];

				if($password1 === $password2){
					$result = $this->Users->create($ajax_data);
					
					if ($result == 1) {
						$data = array('response' => "error", 'message' => "Falló el registro");
					}
					
					if ($result == 2) {
						$data = array('response' => "success", 'message' => "Cuenta creada exitosamente!");
					}
					if ($result == 3) {
						$data = array('response' => "error", 'message' => "El correo ingresado ya existe");
					}
					
				}else{
					$data = array('response' => "error", 'message' => "Las contraseñas ingresadas no son iguales");
				}
			}
			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}	
	}

	public function registroCombustible(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('fecha', 'fecha', 'required');
			//$this->form_validation->set_rules('id_vehiculo', 'id_vehiculo', 'required');
			$this->form_validation->set_rules('conductor', 'conductor', 'required');
			$this->form_validation->set_rules('estacion', 'estacion', 'required');
			$this->form_validation->set_rules('litros', 'litros', 'required');
			$this->form_validation->set_rules('valor', 'valor', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				$config = [
					"upload_path" => APPPATH. '../ArchivosSubidos/',
					'allowed_types' => "*"
				];
				$this->load->library("upload",$config);
				if ($this->upload->do_upload('pic_file')) {
					$data = array("upload_data" => $this->upload->data());
					$res = $this->Combustible->create($ajax_data,$data);
					if($res){
						$data = array('response' => "success", 'message' => "Gasto registrado correctamente!");
					}
				}else{
					$data = array('response' => "error", 'message' => $this->upload->display_errors());
				}

			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}	
	}
	public function registroMantencion(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('fecha', 'fecha', 'required');
			$this->form_validation->set_rules('id_vehiculo', 'Vehiculo', 'required');
			$this->form_validation->set_rules('kilometraje', 'kilometraje', 'required');
			$this->form_validation->set_rules('servicio', 'servicio', 'required');
			$this->form_validation->set_rules('id_personal', 'Personal', 'required');
			$this->form_validation->set_rules('mecanico', 'Mecanico', 'required');
			$this->form_validation->set_rules('taller', 'Taller', 'required');
			$this->form_validation->set_rules('detalle', 'Detalle', 'required');
			$this->form_validation->set_rules('total_m', 'Total', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				$config = [
					"upload_path" => APPPATH. '../ArchivosSubidos/',
					'allowed_types' => "*"
				];
				$this->load->library("upload",$config);
				if ($this->upload->do_upload('pic_file')) {
					$data = array("upload_data" => $this->upload->data());
					$res = $this->Mantencion->create($ajax_data,$data);
					if($res){
						$data = array('response' => "success", 'message' => "Mantencion registrada correctamente!");
					}
				}else{
					$data = array('response' => "error", 'message' => $this->upload->display_errors());
				}
			}
			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}
	}

	public function registroVehiculo(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('patente', 'patente', 'required');
			$this->form_validation->set_rules('tipo', 'tipo', 'required');
			$this->form_validation->set_rules('modelo', 'modelo', 'required');
			$this->form_validation->set_rules('marca', 'marca', 'required');
			$this->form_validation->set_rules('color', 'color', 'required');
			$this->form_validation->set_rules('ano', 'ano', 'required');
			$this->form_validation->set_rules('tipomotor', 'tipomotor', 'required');
			
			
			

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				
				if (!$this->Vehiculo->create($ajax_data)) {
					$data = array('response' => "error", 'message' => "Falló el registro");
				}else{
					$data = array('response' => "success", 'message' => "Vehiculo Registrado");
				}

			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

	}



	public function registroVuelto(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('vuelto', 'Vuelto', 'required|numeric');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				if($ajax_data['vuelto_asignado']==$ajax_data['monto_asignado']){
					$data = array('response' => "error", 'message' => "Falló el registro de vuelto");

				}else if($ajax_data['vuelto']<=$ajax_data['monto_asignado'] && $ajax_data['vuelto_asignado']==0){
					
					if (!$this->CajaChicaModel->actualizarVuelto($ajax_data['vuelto'],$ajax_data['fecha'],false,0)) {
						$data = array('response' => "error", 'message' => "Falló el registro de vuelto");
					}else{
						$data = array('response' => "success", 'message' => "Vuelto ingresado correctamente!");
					}


				}else if($ajax_data['vuelto_asignado']>0){

					$res = $ajax_data['vuelto_asignado'] + $ajax_data['vuelto'];
					
					if (!$this->CajaChicaModel->actualizarVuelto($res,$ajax_data['fecha'],true,$ajax_data['vuelto'])) {
						$data = array('response' => "error", 'message' => "Falló el registro de vuelto");
					}else{
						$data = array('response' => "success", 'message' => "Vuelto ingresado correctamente!");
					}


				}else{
					$data = array('response' => "error", 'message' => "El vuelto ingresado es mayor al monto asignado");
				}


			}

			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

	}

	public function obtenerEstadisticasEgresos(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('fecha_inicial', 'Fecha', 'required');
			$this->form_validation->set_rules('fecha_termino', 'Fecha', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
				echo json_encode($data);
			} else {
				$ajax_data = $this->input->post();
				$fechainicio = $ajax_data['fecha_inicial'];
				$fechatermino = $ajax_data['fecha_termino'];
				$this->CajaChicaModel->generarEstadisticasEgresos($fechainicio,$fechatermino);
			}
		} else {
			echo "'No direct script access allowed'";
		}

	}


	public function obtenerTrabajosRealizadosPorCodigo(){
		$texto = $this->input->post('texto');
		$resultado = $this->OperacionesModel->ObtenerPlanillasRealizadas($texto);
		echo json_encode($resultado);
	}

	public function registrarTipoCosto(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('nombre', 'Nombre', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();

				if ($this->AdministracionModel->registroTipoCostoFijo($ajax_data)) {
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
	
	public function registrarNuevoCostoFijo(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('fecha', 'Fecha', 'required');
			$this->form_validation->set_rules('valor', 'Valor', 'required');
			$this->form_validation->set_rules('id_tipo', 'Tipo', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();

				if ($this->AdministracionModel->registroCostoFijo($ajax_data)) {
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
	
	public function obtenerCostosFijos()
    {
        $fetch_data = $this->AdministracionModel->make_datatables_costosfijos();
        $data = array();
        foreach ($fetch_data as $value){
            $sub_array = array();
			$sub_array[] = $value->id_costofijos;
            $sub_array[] = $value->fecha;
            $sub_array[] = $value->valor;
			$sub_array[] = $value->tipo;
			$sub_array[] = $value->detalle;
            $sub_array[] = '<button class="btn btn-warning btn-sm" id="editar_asistencia" data-toggle="modal"data-target="#modal-editar-costofijo" onclick="setTablaEditar(this)"><i class="fas fa-edit"></i></button>&nbsp<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-confirmacion" onclick="setIDCosto(this)"><i class="fa fa-trash"></i></button>';
            $data[] = $sub_array;
        }

        $output = array(
            "draw" => intval($_POST["draw"]) ,
            "recordsTotal" => $this->AdministracionModel->get_all_data_costosfijos() ,
            "recordsFiltered" => $this->AdministracionModel->get_filtered_data_costosfijos() ,
            "data" => $data
        );
        echo json_encode($output);

	}
	
	public function graficarCostosFijos(){
		if ($this->input->is_ajax_request()) {
			//Validaciones
			$this->form_validation->set_rules('fecha_inicial', 'Fecha', 'required');
			$this->form_validation->set_rules('fecha_termino', 'Fecha', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
				echo json_encode($data);
			} else {
				$ajax_data = $this->input->post();
				$fechainicio = $ajax_data['fecha_inicial'];
                $fechatermino = $ajax_data['fecha_termino'];
				$res = $this->AdministracionModel->generarEstadisticasCostosFijos($fechainicio,$fechatermino);
                if($res){
                    $data = array('response' => 'success', 'message' => 'Exito');
                }else{
                    $data = array('response' => 'error', 'message' => $res);
                }
                
                
            
            
            }
		} else {
			echo "'No direct script access allowed'";
		}

	}

	//Eliminar costos fijos cambiando su estado
	public function cambiarEstadoCostoFijo(){
		$ajax_data = $this->input->post();
		$nrocosto = $ajax_data['nro_costo'];
		$res = $this->AdministracionModel->actualizarEstadoCostoFijo($nrocosto);
        if($res){
            $data = array('response' => 'success', 'message' => 'Exito');
        }else{
            $data = array('response' => 'error', 'message' => $res);
        }
		echo json_encode($data);

	}

	//Eliminar costos fijos cambiando su estado
	public function eliminarRegistroUsuario(){
		$ajax_data = $this->input->post();
		$idusuario = $ajax_data['id_usuario'];
		$estado = $ajax_data['estado'];
		$set_data = $this->session->all_userdata();
		$set_data['ID_Usuario'];
		if($set_data['ID_Usuario'] === $idusuario){
			$data = array('response' => 'error', 'message' => 'Estás usando esta cuenta, no puedes cambiar su estado');
		}else{
			$res = $this->AdministracionModel->eliminarRegistroUsuario($idusuario,$estado);
			if($res){
				$data = array('response' => 'success', 'message' => 'Exito');
			}else{
				$data = array('response' => 'error', 'message' => $res);
			}
		}
		echo json_encode($data);

	}

	//Actualizar monto y fecha de caja chica
	public function actualizarCajaChica(){
		$ajax_data = $this->input->post();
		$res = $this->AdministracionModel->updateCajaChica($ajax_data);
        if($res){
            $data = array('response' => 'success', 'message' => 'Exito');
        }else{
            $data = array('response' => 'error', 'message' => $res);
        }
		echo json_encode($data);

	}

	//Eliminar un ingreso de la caja chica cambiando su estado
	public function deleteIngresoCajaChica(){
		$ajax_data = $this->input->post();
		$res = $this->AdministracionModel->deleteIngresoCajaChica($ajax_data);
        if($res){
            $data = array('response' => 'success', 'message' => 'Exito');
        }else{
            $data = array('response' => 'error', 'message' => $res);
        }
		echo json_encode($data);

	}

	//Actualizar egreso de caja chica
	public function actualizarCajaChicaEgreso(){
		$ajax_data = $this->input->post();
		$res = $this->AdministracionModel->updateCajaChicaEgreso($ajax_data);
        if($res){
            $data = array('response' => 'success', 'message' => 'Exito');
        }else{
            $data = array('response' => 'error', 'message' => $res);
        }
		echo json_encode($data);

	}

	//Eliminar el registro de egreso caja chica, cambiando estado
	public function deleteCajaChicaEgreso(){
		$ajax_data = $this->input->post();
		$res = $this->AdministracionModel->deleteCajaChicaEgreso($ajax_data);
        if($res){
            $data = array('response' => 'success', 'message' => 'Exito');
        }else{
            $data = array('response' => 'error', 'message' => $res);
        }
		echo json_encode($data);

	}

	public function nuevaTarea(){
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post();
			$this->form_validation->set_rules('tarea', 'Tarea', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			}else{
				$res = $this->AdministracionModel->registrarTarea($ajax_data); 
				if ($res) {
					$data = array('response' => "success", 'message' => "Tarea ingresada correctamente!");
				} else{
					$data = array('response' => "error", 'message' => $res);
				}

			}
			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

    }

	public function obtenerTareas(){
		$ajax_data = $this->input->post(); //Datos que vienen por POST
		$listatareas = $this->AdministracionModel->obtenerTareas();
		$contador = 0;
		$response = "<li>";
		$response .= "</li>";
		date_default_timezone_set("America/Santiago");
        $fecha = date("Y-m-d G:i:s");

		foreach($listatareas as $row){ 
			$d1 = new DateTime($row->fecha);
			$d2 = new DateTime($fecha);
			$interval = $d1->diff($d2);
			$minutos  = 0;
			$diastotales = 0;

			$diastotales = $interval->d;
			$minutos  = $interval->i;

			$response .= "<li>";
			$response .= "<span class='handle'>";
			$response .= "<i class='fas fa-ellipsis-v'></i>";
			$response .= "<i class='fas fa-ellipsis-v'></i>";
			$response .= "</span>";
			$response .= "<div  class='icheck-primary d-inline ml-2'>";
			$response .= "<input type='checkbox' value='".$row->id_tarea."' name='todo".$row->id_tarea."' id='todoCheck".$row->id_tarea."' onchange='updateTarea(this)'>";
			$response .= "<label for='todoCheck".$row->id_tarea."'></label>";
			$response .= "</div>";
			$response .= "<span class='text'>".$row->nombre."</span>";
			

			if($diastotales >=1){
				$response .= "<small class='badge badge-danger'><i class='far fa-clock'></i> ".$diastotales." dias</small>";
			}else{
				if($minutos <=59){
					$response .= "<small class='badge badge-success'><i class='far fa-clock'></i> ".$minutos." min</small>";
				}
			}

			$response .= "<div class='tools'>";
			$response .= "<i class='fas fa-edit'></i>";
			$response .= "<i class='fas fa-trash-o'></i>";
			$response .= "</div>";
			$response .= "</li>";
			$contador +=1;
		}

        $data = array('response' => 'success', 'detalle' => $response);
        

		echo json_encode($data);
    }

	public function updateTarea(){
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post();
			$res = $this->AdministracionModel->updateTarea($ajax_data); 
			if ($res) {
				$data = array('response' => "success", 'message' => "Tarea finalizada correctamente!");
			} else{
				$data = array('response' => "error", 'message' => $res);
			}
			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

    }

	public function cambiarTipoUsuario(){
		if ($this->input->is_ajax_request()) {
			$ajax_data = $this->input->post();
			$res = $this->AdministracionModel->cambiarTipoUsuario($ajax_data); 
			if ($res) {
				$data = array('response' => "success", 'message' => "Tipo de usuario cambiado!");
			} else{
				$data = array('response' => "error", 'message' => $res);
			}
			echo json_encode($data);
		} else {
			echo "'No direct script access allowed'";
		}

    }


	public function obtenerDetalleCostoFijo(){
		$ajax_data = $this->input->post(); //Datos que vienen por POST
		
		$detalle_costofijo = $this->CajaChicaModel->ObtenerDetalleCostoFijo($ajax_data['iditem']);
		
		$response = "<div class='table-responsive'>";
		foreach($detalle_costofijo as $row){ 

			$response .="<div class='modal-body'>";
			$response .="<div class='row'>";
			$response .="<input type='hidden' class='form-control' value='".$row->id_costofijos."' id='idcosto_update'>";

			$response .="<div class='col-md-4'>";
			$response .="<div class='form-group'>";
			$response .="<label for='recipient-bodega' class='col-form-label'>Fecha </label>";
			$response .="<div class='form-group'>";
			$response .="<input type='date' class='form-control' value='".$row->fecha."' id='fecha_update'>";
			$response .="</div>";
			$response .="</div>";
			$response .="</div>";

			$response .="<div class='col-md-4'>";
			$response .="<div class='form-group'>";
			$response .="<label for='recipient-bodega' class='col-form-label'>Valor </label>";
			$response .="<div class='form-group'>";
			$response .="<input type='text' class='form-control' value='".$row->valor."' id='valor_update'>";
			$response .="</div>";
			$response .="</div>";
			$response .="</div>";

			$response .="<div class='col-md-4'>";
			$response .="<div class='form-group'>";
			$response .="<label for='recipient-bodega' class='col-form-label'>Detalle </label>";
			$response .="<div class='form-group'>";
			$response .="<input type='text' class='form-control' value='".$row->detalle."' id='detalle_update'>";
			$response .="</div>";
			$response .="</div>";
			$response .="</div>";

			$response .="<div class='col-md-4'>";
			$response .="<div class='form-group'>";
			$response .="<label for='recipient-bodega' class='col-form-label'>Nombre </label>";
			$response .="<div class='form-group'>";
			$response .="<select class='form-control' id='tipocosto_update'>";
			$response .="<option value='".$row->id_tipo."'>".$row->nombre."</option>";
			$response .="</select>";
			$response .="</div>";
			$response .="</div>";
			$response .="</div>";
			$response .="</div>";
			$response .="<hr class='cell-divide-hr'>";
			$response .="</div>";

			
		}
		$response .= "</table>";
		$response .= "</div>";

		$data = array('response' => 'success', 'detalle' => $response);


		echo json_encode($data);
	}

	public function actualizarCostosFijos(){
		$ajax_data = $this->input->post();
		$res = $this->CajaChicaModel->updateCostosFijos($ajax_data);
        if($res){
            $data = array('response' => 'success', 'message' => 'Exito');
        }else{
            $data = array('response' => 'error', 'message' => $res);
        }
		echo json_encode($data);

	}

	public function obtenerEstadisticasCostosFijos(){
		if ($this->input->is_ajax_request()) {
			date_default_timezone_set("America/Santiago");
			$currentyear = date("Y");

			$end = date('Y', strtotime('-1 years'));
			$res = $this->CajaChicaModel->generarEstadisticasCostosFijos($end,$currentyear);
		} else {
			echo "'No direct script access allowed'";
		}

	}
}

?>