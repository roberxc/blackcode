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
		$this->load->helper(array('form', 'url'));
		$this->load->model('Users');
		
	}

	public function informeEgresos(){
		
		$data ['activo'] = 10;
		$this->load->view('layout/nav');
     	$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/InformeEgresos');
		$this->load->view('layout/footer');
	}

	public function CostosFijos(){
		$data ['activomenu'] = 5;
		$data ['activo'] = 6;
		$data['lista_tipocostos'] = $this->AdministracionModel->listaTipoCostos();
		$this->load->view('layout/nav');
     	$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/CostosFijos',$data);
		$this->load->view('layout/footer');
	}

	public function CajaEgreso()
	{
		$data ['activomenu'] = 5;
		$data ['activo'] = 5;
		$this->load->view('layout/nav');
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/Egreso');
		$this->load->view('layout/footer');
	}

	public function CajaIngreso()
	{
		$data ['activomenu'] = 5;
		$data ['activo'] = 5;
		$data['include_css'] = array("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css");
		$this->load->view('layout/nav');
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/Ingreso',$data);
		$this->load->view('layout/footer');
	}
	public function MenuCaja()
	{
		$data ['activomenu'] = 5;
		$data ['activo'] = 5;
		$data ['totalcajachica'] = $this->CajaChicaModel->obtenerTotalCajaChica();
		$this->load->view('layout/nav');
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/CajaChica');
		$this->load->view('layout/footer');
	}
	public function vueltocaja()
	{
		$data ['activo'] = 5;
		$this->load->view('layout/nav');
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Administracion/Vuelto');
		$this->load->view('layout/footer');
	}
	public function registroTrabajador(){
		$data ['activo'] = 6;
		$data ['activomenu'] = 2;
		$this->load->view('layout/nav');
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
				if($ajax_data['montoegreso']<=$total[0]->Balance){
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
		if ($this->input->is_ajax_request()) {
			$posts = $this->CajaChicaModel->obtenerIngresos();
			echo json_encode($posts);
		} else {
			echo "'No direct script access allowed'";
		}

	}

	public function obtenerEgresosCajaChica(){
		if ($this->input->is_ajax_request()) {
			$posts = $this->CajaChicaModel->obtenerEgresos();
			echo json_encode($posts);
		} else {
			echo "'No direct script access allowed'";
		}
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
				
				if (!$this->Users->create($ajax_data)) {
					$data = array('response' => "error", 'message' => "Falló el registro");
				}else{
					$data = array('response' => "success", 'message' => "Cuenta creada correctamente!");
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
			$this->form_validation->set_rules('doc_ad', 'doc_ad', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				
				if (!$this->Combustible->create($ajax_data)) {
					$data = array('response' => "error", 'message' => "Falló el registro");
				}else{
					$data = array('response' => "success", 'message' => "Gasto registrado correctamente!");
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
				$this->form_validation->set_rules('id_vehiculo', 'id_vehiculo', 'required');
				$this->form_validation->set_rules('kilometraje', 'kilometraje', 'required');
				$this->form_validation->set_rules('servicio', 'servicio', 'required');
				$this->form_validation->set_rules('id_personal', 'id_personal', 'required');
				$this->form_validation->set_rules('mecanico', 'mecanico', 'required');
				$this->form_validation->set_rules('taller', 'taller', 'required');
				$this->form_validation->set_rules('detalle', 'detalle', 'required');
				$this->form_validation->set_rules('total_m', 'total_m', 'required');
				$this->form_validation->set_rules('doc_adj', 'doc_adj', 'required');

				
				
	
				if ($this->form_validation->run() == FALSE) {
					$data = array('response' => "error", 'message' => validation_errors());
				} else {
					$ajax_data = $this->input->post();
					
					
					if (!$this->Mantencion->create($ajax_data)) {
						$data = array('response' => "error", 'message' => "Falló el registro de mantencion");
					}else{
						$data = array('response' => "success", 'message' => "Mantencion registrada correctamente!");
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
            $sub_array[] = $value->fecha;
            $sub_array[] = $value->valor;
			$sub_array[] = $value->tipo;
			$sub_array[] = $value->detalle;
            $sub_array[] = '<button class="btn btn-primary btn-sm" data-toggle="modal" id="eyedetalle-orden" data-target="#modal-detalle-orden" onclick="setTablaDetalle(this)"><i class="far fa-eye"></i></button><button class="btn btn-success btn-sm" data-toggle="modal" id="estado-orden" data-target="#modal-estado-orden" onclick="setTablaEstado(this)"><i class="fas fa-edit"></i></button>';
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
}

?>