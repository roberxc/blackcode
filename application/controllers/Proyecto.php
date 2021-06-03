<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Proyecto extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Proyecto_model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        $this->load->library('zip');
        $this->load->library("pagination");
        $this->load->helper('url');
    }
    public function registroTrabajador()
    {
        $set_data = $this->session->all_userdata();
        $data['activo']          = 6;
        $data['activomenu']      = 2;
        $data['lista_proyectos'] = $this->Proyecto_model->listaProyectosSegunUsuario($set_data['ID_Usuario']);
        $this->load->view('layout/nav');
        $this->load->view('menu/menu_proyecto', $data);
        $this->load->view('Proyecto/GestionTrabajador');
        $this->load->view('layout/footer');
        
    }
    
    public function AdminArchivos($idproyecto)
    {
        $set_data = $this->session->all_userdata();
        $data['activo']          = 7;
        $data['activomenu']      = 1;
        $data['lista_proyectos'] = $this->Proyecto_model->listaProyectosSegunUsuario($set_data['ID_Usuario']);
        $data['id_proyecto']     = $idproyecto;
        $data['nombre_proyecto'] = $this->Proyecto_model->getNombreProyecto($idproyecto);
        $this->load->view('layout/nav');
        $this->load->view('menu/menu_proyecto', $data);
        $this->load->view('Proyecto/AdministradorArchivos', $data);
        $this->load->view('layout/footer');
    }
    
    public function Estado_proyecto()
    {
        $set_data = $this->session->all_userdata();
        $data['activo']          = 4;
        $data['activomenu']      = 1;
        $data['lista_proyectos'] = $this->Proyecto_model->listaProyectosSegunUsuario($set_data['ID_Usuario']);
        $this->load->view('layout/nav');
        $this->load->view('menu/menu_proyecto', $data);
        $this->load->view('Proyecto/Estado');
        $this->load->view('layout/footer');
    }

    public function ObtenerArchivosEstadoProyecto($id_proyecto)
    {
        $fetch_data = $this->Proyecto_model->make_datatables_detallearchivos($id_proyecto);
        $data       = array();
        foreach ($fetch_data as $value) {
            $sub_array   = array();
            $sub_array[] = $value->id_facturatrabajo;
            $sub_array[] = $value->ubicaciondocumento;
            $sub_array[] = $value->montototal;
            $sub_array[] = $value->detalle;
            $sub_array[] = "<a class='btn btn-info' href=".base_url().'Proyecto/descargarFacturaOperacion/'.$value->id_facturatrabajo."><i class='fas fa-download'></i></a>";
            //$sub_array[] = '<a href="#"  class="fas fa-eye" data-toggle="modal" onclick="verMas('.$value->nroorden.');">';
            $data[]      = $sub_array;
        }
        
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Proyecto_model->get_all_data_detallearchivos(),
            "recordsFiltered" => $this->Proyecto_model->get_filtered_data_detallearchivos($id_proyecto),
            "data" => $data
        );
        echo json_encode($output);
        
    }


    public function Proyecto_ejecucion()
    {
        $set_data = $this->session->all_userdata();
        $data['activo']     = 5;
        $data['activomenu'] = 1;
        $this->load->view('layout/nav');
        $data['lista_proyectos'] = $this->Proyecto_model->listaProyectosSegunUsuario($set_data['ID_Usuario']);
        $this->load->view('menu/menu_proyecto', $data);
        $this->load->view('Proyecto/ProyectoE');
        $this->load->view('layout/footer');
    }
    public function Planilla_Proyecto($idproyecto)
    {
        $data['codigo']                = $idproyecto;
        $data['lista_proyectos']       = $this->Proyecto_model->listaProyectos();
        $data['Monto_total']           = $this->Proyecto_model->obtenerTotalFactura($data['codigo']);
        $data['Monto_balanceProyecto'] = $this->Proyecto_model->TotalBalanceProyecto($data['codigo']);
        $data['Monto_TotalProyecto']   = $this->Proyecto_model->MostrarTotalProyecto($data['codigo']);
        $data['Monto_presupuesto']     = $this->Proyecto_model->obtenerTotalPresupuesto($data['codigo']);
        $data['Monto_balance']         = $this->Proyecto_model->TotalBalance($data['codigo']);
        $data['Monto_proyecto']        = $this->Proyecto_model->obtenerMontoProyecto($data['codigo']);

        $data['activo']     = 5;
        $data['activomenu'] = 1;
        $this->load->view('layout/nav-proyecto');
        $this->load->view('menu/menu_proyecto', $data);
        $this->load->view('Proyecto/PlanillasPro', $data);
        $this->load->view('layout/footer');
    }
    
    function subirArchivos()
    {
        $data = array();
        $dataresponse = array();
        $errorUploadType = $statusMsg = '';
        
        // If file upload form submitted 
        if ($this->input->post('fileSubmit')) {
            //idproyecto 
            $idproyecto   = $this->input->post('id_proyecto_dir');
            $iddirectorio = $this->input->post('tipo-archivo');
            // If files are selected to upload 
            if (!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0) {
                $filesCount = count($_FILES['files']['name']);
                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                    $_FILES['file']['error']    = $_FILES['files']['error'][$i];
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i];
                    
                    // File upload configuration 
                    $uploadPath              = 'ArchivosSubidos';
                    $config['upload_path']   = $uploadPath;
                    $config['allowed_types'] = 'gif|jpg|png|xlsx|pdf|doc|docx|jpeg';
                    //$config['max_size']    = '100'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                    
                    // Load and initialize upload library 
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    // Upload file to server 
                    if ($this->upload->do_upload('file')) {
                        // Uploaded file data 
                        $fileData                       = $this->upload->data();
                        $uploadData[$i]['nombre']       = $fileData['file_name'];
                        $uploadData[$i]['tipo']         = $fileData['file_type'];
                        $uploadData[$i]['fecha_subida'] = date("Y-m-d H:i:s");
                    } else {
                        $errorUploadType .= $_FILES['file']['name'] . ' | ';
                    }
                    
                    
                    
                }
                
                $errorUploadType = !empty($errorUploadType) ? '<br/>Formato no admitido: ' . trim($errorUploadType, ' | ') : '';
                if (!empty($uploadData)) {
                    // Insert files data into the database 
                    $insert       = $this->Proyecto_model->insert($uploadData, $idproyecto, $iddirectorio);
                    $dataresponse = array(
                        'response' => 'success',
                        'message' => 'Archivo subido correctamente!'
                    );
                    // Upload status message 
                    $statusMsg    = $insert ? 'Archivos subidos exitosamente!' . $errorUploadType : 'Some problem occurred, please try again.';
                } else {
                    $dataresponse = array(
                        'response' => "error",
                        'message' => "Error al subir los archivos" . $errorUploadType
                    );
                    $statusMsg    = "Sorry, there was an error uploading your file." . $errorUploadType;
                }
            } else {
                $dataresponse = array(
                    'response' => 'error',
                    'message' => 'El limite máximo de archivos para subir es de:' . intval(ini_get("max_file_uploads"))
                );
            }
            
        }
        
        // Get files data from the database 
        $data['files'] = $this->Proyecto_model->getRows();
        
        
        // Pass the files data to view 
        $data['statusMsg'] = $statusMsg;
        echo json_encode($dataresponse);
    }
    
    
    
    public function Evaluacion_proyecto()
    {
        // $data[ es lo que lleva en la vista foreach($partidas as $i)]combobox
        $data['partidas']        = $this->Proyecto_model->Mostrarpartidas();
        $data['lista_proyectos'] = $this->Proyecto_model->listaProyectos();
        $data['activo']          = 4;
        $this->load->view('layout/nav-proyecto');
        $this->load->view('menu/menu_proyecto', $data);
        $this->load->view('Proyecto/Evaluacion');
        $this->load->view('layout/footer');
    }
    public function Registro_proyecto()
    {
        $data['lista_proyectos'] = $this->Proyecto_model->listaProyectos();
        $data['activo']          = 4;
        $this->load->view('layout/nav-proyecto');
        $this->load->view('menu/menu_proyecto', $data);
        $this->load->view('Proyecto/RegistroProyecto');
        $this->load->view('layout/footer');
    }
    public function obtenerDetalleDespiece()
    {
        $ajax_data    = $this->input->post(); //Datos que vienen por POST
        $lista_etapas = $this->Proyecto_model->MostrarpartidasEtapas($ajax_data['id_partida']);
        $response     = "<div class='table-responsive'>";
        $response .= "<table class='table table-bordered'>";
        $response .= "<tr>";
        $response .= "<td style='visibility:hidden'>";
        $response .= "<label>ID</label>";
        $response .= "</td>";
        $response .= "<td>";
        $response .= "<label>Etapa</label>";
        $response .= "</td>";
        $response .= "<td>";
        $response .= "<label>Estado</label>";
        $response .= "</td>";
        $response .= "<td>";
        $response .= "<label>Ingresar despiece</label>";
        $response .= "</td>";
        /* $response .= "<td>";
        $response .= "<label>Ingresar flete</label>";
        $response .= "</td>";*/
        $response .= "</tr>";
        $response .= "<tbody>";
        foreach ($lista_etapas as $row) {
            $response .= "<tr>";
            $response .= "<td>";
            $response .= $row->id;
            $response .= "</td>";
            $response .= "<td>";
            $response .= $row->nombreetapa;
            $response .= "</td>";
            $response .= "<td>";
            if ($row->estado == 0) {
                $response .= '<span class="badge badge-danger">No registrado</span>';
            } else {
                $response .= '<span class="badge badge-success">Registrado</span>';
            }
            $response .= "</td>";
            $response .= "<td>";
            $response .= "<button type='button' name='add' onclick='setId(this)' data-toggle='modal' data-target='#registro_despiece' class='btn btn-success'>+</button>";
            $response .= "</td>";
            /*
            $response .= "<td>";
            $response .= "<button type='button' name='add' onclick='setIdFlete(this)' data-toggle='modal' data-target='#registro_flete' class='btn btn-success'>+</button>";
            $response .= "</td>";*/
            $response .= "</tr>";
        }
        $response .= "</tbody>";
        $response .= "</table>";
        $response .= "</div>";
        
        $data = array(
            'response' => 'success',
            'detalle' => $response
        );
        
        
        echo json_encode($data);
    }
    
    //Mostrar estado de todos los proyectos en ejecución a la vista de todos los usuarios
    
    public function fetch_data()
    {
        $this->load->model('Proyecto_model', 'proyecto_modal');
        
        $fetch_data = $this->proyecto_modal->make_datatables_EstadoProyecto();
        $data       = array();
        foreach ($fetch_data as $value) {
            
            $sub_array   = array();
            $sub_array[] = $value->nombreproyecto;
            $sub_array[] = $value->nombreusuario;
            $sub_array[] = $value->fecha_inicio;
            $sub_array[] = $value->fecha_termino;
            if ($value->estado == 0) {
                $sub_array[] = '<span class="badge badge-danger">En proceso</span>';
            } else {
                $sub_array[] = '<span class="badge badge-success">Terminado</span>';
            }
            $sub_array[] = '<button class="btn btn-primary btn-sm" onclick="setIDProyecto('.$value->id_proyecto.')" data-toggle="modal" data-target="#myModalVerMas"><i class="far fa-eye"></i></button>';
            
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Proyecto_model->get_all_data_EstadoProyecto(),
            "recordsFiltered" => $this->Proyecto_model->get_filtered_data_EstadoProyecto(),
            "data" => $data
        );
        echo json_encode($output);
    }
    public function fetch_ProyectoEjecutados()
    {
        $this->load->model('Proyecto_model', 'proyecto_modal');
        
        $fetch_data = $this->proyecto_modal->make_datatables_ProyectoEjecutados();
        $data       = array();
        foreach ($fetch_data as $value) {
            
            $sub_array   = array();
            $sub_array[] = $value->nombreproyecto;
            $sub_array[] = $value->fecha_inicio;
            $sub_array[] = $value->fecha_termino;
            if ($value->estado == 0) {
                $sub_array[] = '<span class="badge badge-danger">En proceso</span>';
            } else {
                $sub_array[] = '<span class="badge badge-success">Terminado</span>';
            }

            $sub_array[] = '<button class="btn btn-primary btn-sm" onclick="detalleProyecto('.$value->id_proyecto.')"><i class="far fa-eye"></i></button><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detalleDocumentos" onclick="generarDataTableArchivos('.$value->id_proyecto.')"><i class="fas fa-book"></i></button><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-estado-proyecto" onclick="setTablaEstado('.$value->id_proyecto.')"><i class="far fa-edit"></i></button>';
            $data[]      = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Proyecto_model->get_all_data_EstadoProyecto(),
            "recordsFiltered" => $this->Proyecto_model->get_filtered_data_EstadoProyecto(),
            "data" => $data
        );
        echo json_encode($output);
    }
    
    public function obtenerEstadoProyecto(){
		$ajax_data = $this->input->post(); //Datos que vienen por POST
		$response = "<select class='form-control select2' style='width: 100%;' id='estado_proyecto' onchange='setEstadoProyecto()'>";
		$response .= "<option value='1' selected>Seleccione</option>";
		$response .= "<option value='0'>En proceso</option>";
		$response .= "<option value='1'>Terminado</option>";
		$response .= "</select>";
		$data = array('response' => 'success', 'detalle' => $response);


		echo json_encode($data);
	}

    public function actualizarEstadoProyecto(){
		$ajax_data = $this->input->post();
		$estado = $ajax_data['estado'];
		$idproyecto = $ajax_data['id_proyecto'];
		if ($this->Proyecto_model->actualizarEstadoProyecto($estado,$idproyecto)) {
			$data = array('response' => "success", 'message' => "Estado de proyecto actualizado correctamente!");
		} else {
			$data = array('response' => "error", 'message' => "Falló la actualizacio");
		}
		echo json_encode($data);
    }
    
    public function GuardarProyectos()
    {
        if ($this->input->is_ajax_request()) {
            //Validaciones
            $this->form_validation->set_rules('nombreProyecto', 'Nombre proyecto', 'required');
            $this->form_validation->set_rules('fechaInicio', 'Fecha de inicio', 'required');
            $this->form_validation->set_rules('fechaTermino', 'Fecha de termino', 'required');
            $this->form_validation->set_rules('monto', 'Monto', 'required');
            
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'response' => "error",
                    'message' => validation_errors()
                );
            } else {
                $ajax_data = $this->input->post();
                
                if (!$this->Proyecto_model->ingresoProyecto($ajax_data)) {
                    $data = array(
                        'response' => "success",
                        'message' => "Proyecto Registrado"
                    );
                    
                } else {
                    $data = array(
                        'response' => "error",
                        'message' => "Falló el registro"
                    );
                }
                
            }
            
            echo json_encode($data);
        } else {
            echo "'No direct script access allowed'";
        }
        
    }
    
    public function registroPersonal()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('name', 'Nombre completo', 'required');
            $this->form_validation->set_rules('rut', 'Rut', 'required');
            $this->form_validation->set_rules('telefono', 'Telefono', 'required|numeric');
            $this->form_validation->set_rules('email', 'Correo', 'required|valid_email');
            $this->form_validation->set_rules('cargo', 'Cargo', 'required|alpha');
            
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'response' => "error",
                    'message' => validation_errors()
                );
            } else {
                $ajax_data = $this->input->post();
                
                if (!$this->Proyecto_model->registroPersonal($ajax_data)) {
                    $data = array(
                        'response' => "success",
                        'message' => "Trabajador registrado correctamente!"
                    );
                    
                } else {
                    $data = array(
                        'response' => "error",
                        'message' => "Falló el registro"
                    );
                }
                
            }
            
            echo json_encode($data);
        } else {
            echo "'No direct script access allowed'";
        }
    }
    
    public function registroPartidas()
    {
        
        if ($this->input->is_ajax_request()) {
            $ajax_data = $this->input->post();
            $res       = $this->Proyecto_model->registrarPartidasModels($ajax_data);
            if ($res) {
                $data = array(
                    'response' => "success",
                    'message' => "Guardado exitosamente!"
                );
            } else {
                $data = array(
                    'response' => "error",
                    'message' => $res
                );
            }
            echo json_encode($data);
        } else {
            echo "'No direct script access allowed'";
        }
    }
    
    public function GuardarPorcentaje()
    {
        if ($this->input->is_ajax_request()) {
            $ajax_data = $this->input->post();
            $res       = $this->Proyecto_model->ingresoPorcentaje($ajax_data);
            if ($res) {
                $data = array(
                    'response' => "error",
                    'message' => $res
                );
                
            } else {
                $data = array(
                    'response' => "success",
                    'message' => "Guardado exitosamente!"
                );
            }
            echo json_encode($data);
        } else {
            echo "'No direct script access allowed'";
        }
    }
    
    
    
    public function registroSupervision()
    {
        
        if ($this->input->is_ajax_request()) {
            $ajax_data = $this->input->post();
            $res       = $this->Proyecto_model->ingresarSupervision($ajax_data);
            if ($res) {
                $data = array(
                    'response' => "success",
                    'message' => "Guardado exitosamente!"
                );
            } else {
                $data = array(
                    'response' => "error",
                    'message' => $res
                );
            }
            echo json_encode($data);
        } else {
            echo "'No direct script access allowed'";
        }
    }
    public function registroInstalacion()
    {
        
        if ($this->input->is_ajax_request()) {
            $ajax_data = $this->input->post();
            $res       = $this->Proyecto_model->ingresarInstalacion($ajax_data);
            if ($res) {
                $data = array(
                    'response' => "success",
                    'message' => "Guardado exitosamente!"
                );
            } else {
                $data = array(
                    'response' => "error",
                    'message' => $res
                );
            }
            echo json_encode($data);
        } else {
            echo "'No direct script access allowed'";
        }
    }
    
    public function registroEtapas()
    {
        
        if ($this->input->is_ajax_request()) {
            $ajax_data = $this->input->post();
            $res       = $this->Proyecto_model->ingresarEtapas($ajax_data);
            if ($res) {
                $data = array(
                    'response' => "success",
                    'message' => "Guardado exitosamente!"
                );
            } else {
                $data = array(
                    'response' => "error",
                    'message' => $res
                );
            }
            echo json_encode($data);
        } else {
            echo "'No direct script access allowed'";
        }
    }
    
    public function registroDespiece()
    {
        
        if ($this->input->is_ajax_request()) {
            $ajax_data = $this->input->post();
            $res       = $this->Proyecto_model->ingresarDespiece($ajax_data);
            if ($res) {
                $data = array(
                    'response' => "success",
                    'message' => "Guardado exitosamente!"
                );
            } else {
                $data = array(
                    'response' => "error",
                    'message' => $res
                );
            }
            echo json_encode($data);
        } else {
            echo "'No direct script access allowed'";
        }
    }
    public function Guardarflete()
    {
        if ($this->input->is_ajax_request()) {
            //Validaciones
            $this->form_validation->set_rules('id_etapa', 'id_etapa', 'required');
            $this->form_validation->set_rules('valor', 'valor', 'required');
            
            
            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'response' => "error",
                    'message' => validation_errors()
                );
            } else {
                $ajax_data = $this->input->post();
                
                if (!$this->Proyecto_model->ingresoflete($ajax_data)) {
                    $data = array(
                        'response' => "success",
                        'message' => "Proyecto Registrado"
                    );
                    
                } else {
                    $data = array(
                        'response' => "error",
                        'message' => "Falló el registro"
                    );
                }
                
            }
            
            echo json_encode($data);
        } else {
            echo "'No direct script access allowed'";
        }
        
    }
    public function GuardarFleteTraslado()
    {
        if ($this->input->is_ajax_request()) {
            $ajax_data = $this->input->post();
            $res       = $this->Proyecto_model->ingresoFleteTraslado($ajax_data);
            if ($res) {
                $data = array(
                    'response' => "success",
                    'message' => $res
                );
                
            } else {
                $data = array(
                    'response' => "error",
                    'message' => "ERRRROR!"
                );
            }
            echo json_encode($data);
        } else {
            echo "'No direct script access allowed'";
        }
    }
    
    
    public function obtenerResumenProyecto()
    {
        $ajax_data           = $this->input->post(); //Datos que vienen por POST
        $lista_etapas        = $this->Proyecto_model->obtenerResumen($ajax_data);
        $lista_imprevistos   = $this->Proyecto_model->obtenerImprevisto($ajax_data);
        $lista_instalacion   = $this->Proyecto_model->obtenerInstalacion($ajax_data);
        $lista_supervision   = $this->Proyecto_model->obtenerSupervision($ajax_data);
        $lista_porcentaje    = $this->Proyecto_model->obtenerPorcentaje($ajax_data);
        $lista_fletetraslado = $this->Proyecto_model->obtenerFleteTraslado($ajax_data);
        $lista_gastoGeneral  = $this->Proyecto_model->totalGastoGeneral($ajax_data);
        $lista_comisiones    = $this->Proyecto_model->totalComisiones($ajax_data);
        $lista_ingenieria    = $this->Proyecto_model->totalIngenieria($ajax_data);
        $lista_utilidades    = $this->Proyecto_model->totalUtilidades($ajax_data);
        $response            = "<TABLE BORDER class='table table-bordered'>";
        $subtotal            = 0;
        foreach ($lista_etapas as $row) {
            $subtotal = intval($row->SubTotal);
            $response .= "<TR>";
            $response .= "<TH>Subtotal por partida</TH>";
            $response .= "<TD>$" . $subtotal . "</TD>";
        }
        $response .= "</TR>";
        $imprevisto = 0;
        foreach ($lista_imprevistos as $row) {
            $imprevisto = $subtotal * (float) $row->imprevisto;
            $response .= "<TR>";
            $response .= "<TH>Imprevistos</TH>";
            $response .= "<TD>$" . $imprevisto . "</TD>";
            $response .= "</TR>";
        }
        
        $costomaterial = intval($subtotal) + intval($imprevisto);
        $response .= "<TR>";
        $response .= "<TH>Costo materiales</TH>";
        $response .= "<TD>$" . $costomaterial . "</TD>";
        $response .= "</TR>";
        
        $instalacion = 0;
        foreach ($lista_instalacion as $row) {
            $instalacion = $row->instalacion;
            $response .= "<TR>";
            $response .= "<TH>Instalación</TH>";
            $response .= "<TD>$" . $row->instalacion . "</TD>";
            $response .= "</TR>";
        }
        $supervision = 0;
        foreach ($lista_supervision as $row) {
            $supervision = $row->supervision;
            $response .= "<TR>";
            $response .= "<TH>Supervisión</TH>";
            $response .= "<TD>$" . $row->supervision . "</TD>";
            $response .= "</TR>";
        }
        //echo"Costo material: ".$costomaterial."\n";
        //echo"Instalacion: ".$instalacion."\n";
        //echo"Supervision: ".$supervision."\n";
        
        $valorEquipamiento = intval($costomaterial) + intval($instalacion) + intval($supervision);
        
        $response .= "<TR>";
        $response .= "<TH>Valor equipamiento instalado</TH>";
        $response .= "<TD>$" . $valorEquipamiento . "</TD>";
        $response .= "</TR>";
        
        $valor = 0;
        foreach ($lista_fletetraslado as $row) {
            $valor = intval($row->valor);
            $response .= "<TR>";
            $response .= "<TH>Flete traslado </TH>";
            $response .= "<TD>$" . $row->valor . "</TD>";
            $response .= "</TR>";
        }
        $response .= "<TR>";
        $response .= "<TH>Gastos generales </TH>";
        $response .= "<TD>$" . $lista_gastoGeneral . "</TD>";
        $response .= "</TR>";
        $comisiones = 0;
        
        $response .= "<TR>";
        $response .= "<TH>Comisiones </TH>";
        $response .= "<TD>$" . $lista_comisiones . "</TD>";
        $response .= "</TR>";
        $ingenieria = 0;
        
        
        $response .= "<TR>";
        $response .= "<TH>Ingeniería </TH>";
        $response .= "<TD>$" . $lista_ingenieria . "</TD>";
        $response .= "</TR>";
        
        
        $utilidades = 0;
        
        $response .= "<TR>";
        $response .= "<TH>Utilidades </TH>";
        $response .= "<TD>$" . $lista_utilidades . "</TD>";
        $response .= "</TR>";
        
        
        $Preciosugerido = intval($valorEquipamiento) + intval($valor) + (float) $lista_gastoGeneral + (float) $lista_comisiones + (float) $lista_ingenieria + (float) $lista_utilidades;
        $response .= "<TR>";
        $response .= "<TH>Precio sugerido venta </TH>";
        $response .= "<TD>$" . $Preciosugerido . "</TD>";
        $response .= "</TR>";
        
        $response .= "</TABLE>";
        $data = array(
            'response' => 'success',
            'detalle' => $response
        );
        
        
        echo json_encode($data);
        
        
    }
    public function obtenerPrecioVenta()
    {
        
        $PreciosugeridoVenta = $this->Proyecto_model->obtenerPrecioSugeridoProyecto();
        
        $response = "<TABLE BORDER class='table table-bordered'>";
        $response .= "<TR>";
        $response .= "<TD class='bg-info'><h5>Precio sugerido Proyecto</h5></TD>";
        $response .= "</TR>";
        
        
        foreach ($PreciosugeridoVenta as $row) {
            $response .= "<TR>";
            $response .= "<TD scope='col'>$" . $row->PrecioSugerido . "</TD>";
            $response .= "</TR>";
        }
        $response .= "</TABLE>";
        
        $data = array(
            'response' => 'success',
            'detalle' => $response
        );
        
        echo json_encode($data);
    }
    
    public function obtenerTrabajoDiario()
    {
        
        $ajax_data     = $this->input->post();
        $codigo        = $ajax_data['codigo'];
        $lista_trabajo = $this->Proyecto_model->obtenerTrabajoDiario($codigo);
        
        $response = "<table id='example1' class='table table-bordered table-striped'>";
        $response .= " <thead>";
        $response .= " <tr>";
        $response .= "<th>ID</th>";
        $response .= "<th>Fecha</th>";
        $response .= " <th>Detalle</th>";
        $response .= "<th>Codigo de servicio</th>";
        $response .= "<th>Personal</th>";
        $response .= "<th>Registro fotográfico</th>";
        $response .= "</tr>";
        $response .= "</thead>";
        $response .= "<tbody>";
        
        foreach ($lista_trabajo as $row) {
            $response .= "<tr>";
            $response .= "<td>" . $row->id . "</td>";
            $response .= "<td>" . $row->fecha_inicio . "</td>";
            $response .= "<td>" . $row->detalle . "</td>";
            $response .= "<td>" . $row->codigoservicio . "</td>";
            $response .= "<td> <button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#personal' onclick='generarTablaPersonalQueAsiste(this)'><i class='far fa-eye'></i></button></td>";
            $response .= "<td> <button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#galeria' onclick='generarGaleriaImagenes(this)'><i class='far fa-eye'></i></button></td>";
            $response .= " </tr>";
        }
        $response .= "</tfoot>";
        $response .= " </table>";
        
        
        $data = array(
            'response' => 'success',
            'detalle' => $response
        );
        
        echo json_encode($data);
        
    }
    
    public function obtenerRegistroMaterial()
    {
        
        $ajax_data = $this->input->post();
        $codigo    = $ajax_data['codigo'];
        
        $lista_monto       = $this->Proyecto_model->MostrarMaterialesProyecto($codigo);
        $lista_factura     = $this->Proyecto_model->obtenerTotalFactura($codigo);
        $lista_presupuesto = $this->Proyecto_model->obtenerTotalPresupuesto($codigo);
        $lista_balance     = $this->Proyecto_model->TotalBalance($codigo);
        
        $response = "<table id='example1' class='table table-bordered table-striped'>";
        $response .= " <thead>";
        $response .= " <tr>";
        $response .= "<th>ID</th>";
        $response .= " <th>Monto</th>";
        $response .= "<th>Detalle</th>";
        $response .= " <th>Presupuesto</th>";
        $response .= "<th>Balance por item</th>";
        $response .= "<th>Facturas</th>";
        $response .= "</tr>";
        $response .= "</thead>";
        $response .= "<tbody>";
        $balance = 0;
        foreach ($lista_monto as $row) {
            $balance = intval($row->monto) - intval($row->presupuesto);
            $response .= "<tr>";
            $response .= "<td>" . $row->id . "</td>";
            $response .= "<td>$" . $row->monto . "</td>";
            $response .= "<td>" . $row->detalle . "</td>";
            $response .= "<td>$" . $row->presupuesto . "</td>";
            $response .= "<td>$" . -$balance . "</td>";
            $response .= "<td> <button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#MostrarFacturas' onclick='setTablaFacturas(this)'><i class='fas fa-download'></i></button></td>";
            $response .= " </tr>";
        }
        $response .= "</tfoot>";
        $response .= "<tr>";
        $response .= "<th>Total: </th>";
        $factura = 0;
        foreach ($lista_factura as $row) {
            $factura = $row->totalMonto;
            $response .= "<th>$" . $factura . "</th>";
        }
        $response .= "<th></th>";
        $presupuesto = 0;
        foreach ($lista_presupuesto as $row) {
            $presupuesto = $row->totalpresupuesto;
            $response .= "<th>$" . $presupuesto . "</th>";
        }
        $response .= "<th>$" . $lista_balance . "</th>";
        $response .= " </tr>";
        $response .= "</tfoot>";
        $response .= " </table>";
        
        $data = array(
            'response' => 'success',
            'detalle' => $response
        );
        
        echo json_encode($data);
        
    }
    
    public function obtenerManoDeObra()
    {
        
        //$PreciosugeridoVenta = $this->Proyecto_model->obtenerPrecioSugeridoProyecto();
        $ajax_data   = $this->input->post();
        $codigo      = $ajax_data['codigo'];
        $lista_monto = $this->Proyecto_model->MostrarTotalManoObra($codigo);
        
        $response = "<table id='example1' class='table table-bordered table-striped'>";
        $response .= " <thead>";
        $response .= " <tr>";
        $response .= "<th>Rut</th>";
        $response .= "<th>Nombre Completo</th>";
        $response .= " <th>Total horas</th>";
        $response .= "<th>Hora trabajador</th>";
        $response .= "<th>Costo total</th>";
        $response .= "</tr>";
        $response .= "</thead>";
        $response .= "<tbody>";
        $valorhora     = 20000;
        $totalhora     = 0;
        $totalproyecto = 0;
        foreach ($lista_monto as $row) {
            $totalhora = intval($row->horastrabajadas) * $valorhora;
            $response .= "<tr>";
            $response .= "<td>" . $row->rut . "</td>";
            $response .= "<td>" . $row->nombrecompleto . "</td>";
            $response .= "<td>" . $row->horastrabajadas . "</td>";
            $response .= "<td>" . $valorhora . "</td>";
            $response .= "<td>" . $totalhora . "</td>";
            $response .= "</tr>";
            $totalproyecto += $totalhora;
        }
        $response .= "<tr>";
        $response .= "<th></th>";
        $response .= "<th></th>";
        $response .= "<th></th>";
        $response .= "<th>Total: </th>";
        $response .= "<th>" . $totalproyecto . "</th>";
        $response .= " </tr>";
        $response .= "</tfoot>";
        $response .= " </table>";
        
        
        $data = array(
            'response' => 'success',
            'detalle' => $response
        );
        
        echo json_encode($data);
        
        
    }
    
    public function obtenerPersonalQueAsiste()
    {
        $ajax_data      = $this->input->post();
        $codigo         = $ajax_data['codigo'];
        $lista_personal = $this->Proyecto_model->MostrarPersonal($codigo);
        
        $response = "<table id='example1' class='table table-bordered table-striped'>";
        $response .= " <thead>";
        $response .= " <tr>";
        $response .= "<th>Personal</th>";
        $response .= "<th>Horas</th>";
        $response .= "</tr>";
        $response .= "</thead>";
        $response .= "<tbody>";
        foreach ($lista_personal as $row) {
            $response .= "<tr>";
            $response .= "<td>" . $row->nombre . "</td>";
            $response .= "<td>" . $row->hora . "</td>";
            $response .= " </tr>";
        }
        $response .= "</tfoot>";
        $response .= " </table>";
        
        
        $data = array(
            'response' => 'success',
            'detalle' => $response
        );
        
        echo json_encode($data);
        
    }
    public function obtenerFacturas()
    {
        $ajax_data = $this->input->post();
        $codigo    = $ajax_data['idtrabajodiario'];
        
        $lista_documento = $this->Proyecto_model->MostrarDocumento($codigo);
        
        $response = "<table id='' class='table table-bordered table-striped'>";
        $response .= " <thead>";
        $response .= " <tr>";
        $response .= "<th>Nro Factura</th>";
        $response .= "<th>Nombre Factura</th>";
        $response .= "<th>Descargar</th>";
        $response .= "</tr>";
        $response .= "</thead>";
        $response .= "<tbody>";
        foreach ($lista_documento as $row) {
            $response .= "<tr>";
            $response .= "<td>" . $row->id . "</td>";
            $response .= "<td>" . $row->documento . "</td>";
            $response .= "<td><button class='btn btn-primary btn-sm' onclick='descargarFactura(this)'><i class='fas fa-download'></i></button></td>";
            $response .= " </tr>";
        }
        $response .= "</tfoot>";
        $response .= " </table>";
        
        
        $data = array(
            'response' => 'success',
            'detalle' => $response
        );
        
        echo json_encode($data);
        
    }
    public function descargaFactura($id){
        if (!empty($id)) {
            //load download helper
            $this->load->helper('download');
            //get file info from database
            $fileInfo = $this->Proyecto_model->getRows(array(
                'id' => $id
            ));
            //file path
            $file = 'ArchivosSubidos/' . $fileInfo['ubicaciondocumento'];
            //download file from directory
            force_download($file, NULL);
        }
    }

    //Metodo para descargar facturas que son subidas en operaciones
    public function descargarFacturaOperacion($id){
        if (!empty($id)) {
            //load download helper
            $this->load->helper('download');
            //get file info from database
            $fileInfo = $this->Proyecto_model->getRows(array(
                'id' => $id
            ));
            //file path
            $file = 'ArchivosSubidos/' . $fileInfo['ubicaciondocumento'];
            //download file from directory
            force_download($file, NULL);
        }
    }
    
    
    //Administrador de archivos
    
    public function ObtenerArchivos($directorio, $id_proyecto)
    {
        $fetch_data = $this->Proyecto_model->make_datatables_archivos($directorio, $id_proyecto);
        $data       = array();
        foreach ($fetch_data as $value) {
            $sub_array   = array();
            $sub_array[] = '<div class="checkbox"><input type="checkbox" value="' . $value->nombrearchivo . '" name="images[]"></div>';
            $sub_array[] = $value->nombrearchivo;
            $sub_array[] = $value->fecha_subida;
            $sub_array[] = $value->directorio;
            $sub_array[] = '<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-detalle-orden" onclick="setTablaDetalle(this)"><i class="far fa-eye"></i></button><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-estado-orden" onclick="setTablaEstado(this)"><i class="far fa-edit"></i></button>';
            //$sub_array[] = '<a href="#"  class="fas fa-eye" data-toggle="modal" onclick="verMas('.$value->nroorden.');">';
            $data[]      = $sub_array;
        }
        
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Proyecto_model->get_all_data_archivos(),
            "recordsFiltered" => $this->Proyecto_model->get_filtered_data_archivos($directorio, $id_proyecto),
            "data" => $data
        );
        echo json_encode($output);
        
    }
    
    public function obtenerDetalleArchivos()
    {
        $ajax_data = $this->input->post();
        
        //Filtro de busqueda
        if (isset($ajax_data['filtro_nombre'])) {
            $detalle_archivos = $this->Proyecto_model->ObtenerArchivosPorNombre($ajax_data);
        } else {
            $detalle_archivos = $this->Proyecto_model->ObtenerArchivos($ajax_data);
        }
        
        $response = "<table class='table table-hover table-striped'>";
        $response .= " <tbody>";
        foreach ($detalle_archivos as $row) {
            $response .= "<tr>";
            $response .= "<td>" . $row->nombre . "</td>";
            $response .= "<td>" . $row->fecha_subida . "</td>";
            $response .= "<td>" . $row->formato . "</td>";
            $response .= "<td>" . $row->directorio . "</td>";
            $response .= "</tr>";
        }
        $response .= "</tbody>";
        $response .= " </table>";
        
        
        $data = array(
            'response' => 'success',
            'detalle' => $response
        );
        
        echo json_encode($data);
        
    }
    
    public function obtenerDetalleFotos(){
        $ajax_data = $this->input->get();

        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->Proyecto_model->ObtenerFilasImagenes($ajax_data);
        $config["per_page"] = 8;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $start = ($page - 1) * $config["per_page"];
        $data = array(
            'response' => 'success',
            'pagination_link'  => $this->pagination->create_links(),
            'detalle'   => $this->Proyecto_model->ObtenerImagenes($ajax_data,$config["per_page"], $start)
        );
        
        echo json_encode($data);
        
    }
    
    //Obtener imagenes subidas desde operaciones para mostrarlas en estado de proyecto
    public function obtenerImagenesOperaciones(){
        $ajax_data = $this->input->post();
        
        if(isset($ajax_data['id_proyecto'])){
            $detalle_archivos = $this->Proyecto_model->ObtenerImagenesOperacion($ajax_data);
            $response = "<section class='content'>";
            $response .= "<div class='container-fluid'>";
            $response .= "<div class='row'>";
            $response .= "<div class='col-12'>";
            $response .= "<div class='card card-primary'>";
            $response .= "<div class='card-body'>";
            $response .= "<div>";
            $response .= "</div>";
            $response .= "<div>";
            $response .= "<div class='filter-container p-0 row'>";
            foreach ($detalle_archivos as $row) {
                $response .= "<div class='filtr-item col-sm-4' data-category='1' data-sort='white sample'>";
                $response .= "<a href='" . base_url() . "ArchivosSubidos/" . $row->imagen . "' data-toggle='lightbox' data-footer='Fecha:' data-title='Nombre: " . $row->imagen . "'>";
                $response .= "<img src='" . base_url() . "ArchivosSubidos/" . $row->imagen . "' class='img-fluid mb-2' alt='white sample'/>";
                $response .= "</a>";
                $response .= "<br>";
                $response .= "<input type='checkbox' name='images[]' class='select' value='" . $row->imagen . "'/>";
                $response .= "</div>";
            }
            $response .= "</div>";
            $response .= "</div>";
            $response .= "</div>";
            $response .= "</div>";
            $response .= "</div>";
            $response .= "</div>";
            $response .= "</div>";
            $response .= "</section>";
        }

        if(isset($ajax_data['id_trabajodiario'])){
            $detalle_archivos = $this->Proyecto_model->ObtenerImagenesTrabajoDiario($ajax_data);
            $response = "<section class='content'>";
            $response .= "<div class='container-fluid'>";
            $response .= "<div class='row'>";
            $response .= "<div class='col-12'>";
            $response .= "<div class='card card-primary'>";
            $response .= "<div class='card-body'>";
            $response .= "<div>";
            $response .= "</div>";
            $response .= "<div>";
            $response .= "<div class='filter-container p-0 row'>";
            foreach ($detalle_archivos as $row) {
                $response .= "<div class='filtr-item col-sm-4' data-category='1' data-sort='white sample'>";
                $response .= "<a href='" . base_url() . "ArchivosSubidos/" . $row->imagen . "' data-toggle='lightbox' data-title='" . $row->imagen . "'>";
                $response .= "<img src='" . base_url() . "ArchivosSubidos/" . $row->imagen . "' class='img-fluid mb-2' alt='white sample'/>";
                $response .= "</a>";
                $response .= "</div>";
            }
            $response .= "</div>";
            $response .= "</div>";
            $response .= "</div>";
            $response .= "</div>";
            $response .= "</div>";
            $response .= "</div>";
            $response .= "</div>";
            $response .= "</section>";
        }
        
        
        $data = array(
            'response' => 'success',
            'detalle' => $response
        );
        
        echo json_encode($data);
        
    }
    
    public function ordenarFotosPorFecha()
    {
        $ajax_data   = $this->input->post();
        $id_proyecto = $ajax_data['id_proyecto'];
        $tipo_orden  = $ajax_data['tipo_orden'];
        
        //Ascendente
        if ($tipo_orden == 1) {
            $detalle_archivos = $this->Proyecto_model->ObtenerFotosOrdenadas($id_proyecto, $tipo_orden);
        }
        
        //Descendente
        if ($tipo_orden == 2) {
            $detalle_archivos = $this->Proyecto_model->ObtenerFotosOrdenadas($id_proyecto, $tipo_orden);
        }
        
        //var_dump($detalle_archivos);
        
        
        $response = "<section class='content'>";
        $response .= "<div class='container-fluid'>";
        $response .= "<div class='row'>";
        $response .= "<div class='col-12'>";
        $response .= "<div class='card card-primary'>";
        $response .= "<div class='card-body'>";
        $response .= "<div>";
        $response .= "<div class='mb-2'>";
        $response .= "<a class='btn btn-secondary' href='javascript:void(0)' data-shuffle> -- </a>";
        $response .= "<div class='float-right'>";
        $response .= "<select class='custom-select' style='width: auto;' data-sortOrder>";
        $response .= "<option value='sortData'> Ordenar por fecha </option>";
        $response .= "</select>";
        $response .= "<div class='btn-group'>";
        $response .= "<a class='btn btn-default' onclick='ordenFotos(1)'> Ascendente </a>";
        $response .= "<a class='btn btn-default' onclick='ordenFotos(2)'> Descendente </a>";
        $response .= "</div>";
        $response .= "</div>";
        $response .= "</div>";
        $response .= "</div>";
        $response .= "<div>";
        $response .= "<div class='filter-container p-0 row'>";
        foreach ($detalle_archivos as $row) {
            $response .= "<div class='filtr-item col-sm-4' data-category='1' data-sort='white sample'>";
            $response .= "<a href='" . base_url() . "ArchivosSubidos/" . $row->nombre . "' data-toggle='lightbox' data-footer='Fecha: " . $row->fecha_subida . "' data-title='Nombre: " . $row->nombre . "'>";
            $response .= "<img src='" . base_url() . "ArchivosSubidos/" . $row->nombre . "' class='img-fluid mb-2' alt='white sample'/>";
            $response .= "</a>";
            $response .= "<br>";
            $response .= "<input type='checkbox' name='images[]' class='select' value='" . $row->nombre . "'/>";
            $response .= "</div>";
        }
        $response .= "</div>";
        $response .= "</div>";
        $response .= "</div>";
        $response .= "</div>";
        $response .= "</div>";
        $response .= "</div>";
        $response .= "</div>";
        $response .= "</section>";
        $data = array(
            'response' => 'success',
            'detalle' => $response
        );
        
        echo json_encode($data);
        
    }
    
    public function descargarArchivos()
    {
        $ajax_data = $this->input->post();
        if ($ajax_data['tipo-descarga'] == '1') {
            $directorio = $this->input->post('cdirectorio-archivos');
            $archivos   = array();
            if ($this->input->post('images')) {
                $images = $this->input->post('images');
                foreach ($images as $image) {
                    array_push($archivos, $image);
                }
            }
            //get file info from database
            $fileInfo = $this->Proyecto_model->getNombreArchivo($archivos,'nombre','archivo_proyecto');
            foreach ($fileInfo as $row) {
                $this->zip->read_file('./ArchivosSubidos/' . $row->nombre);
            }
            
            $this->zip->download('' . $directorio . time() . '-CDH.zip');
            
        } else if ($ajax_data['tipo-descarga'] == '0') {
            $archivos = array();
            if ($this->input->post('images')) {
                $images = $this->input->post('images');
                foreach ($images as $image) {
                    array_push($archivos, $image);
                }
            }
            $this->Proyecto_model->eliminarArchivos($archivos);
            redirect('DirectorioProyecto/' . $ajax_data['id_proyecto_dir'], 'refresh');
        }else if ($ajax_data['tipo-descarga'] == '3') { //Estos son las imagenes que vienen de operacion y se descarga en estado de proyecto
            $archivos   = array();
            if ($this->input->post('images')) {
                $images = $this->input->post('images');
                foreach ($images as $image) {
                    array_push($archivos, $image);
                }
            }
            //get file info from database
            $fileInfo = $this->Proyecto_model->getNombreArchivo($archivos,'imagen','detalletrabajodiario');
            foreach ($fileInfo as $row) {
                $this->zip->read_file('./ArchivosSubidos/' . $row->nombre);
            }
            
            $this->zip->download('' . $directorio . time() . '-CDH.zip');
            
        }
        
    }

    public function obtenerBalancePorProyecto(){
		if ($this->input->is_ajax_request()) {
            $set_data = $this->session->all_userdata();
			$res = $this->Proyecto_model->generarEstadisticasBalancePorProyectos($set_data['ID_Usuario']);
		} else {
			echo "'No direct script access allowed'";
		}

	}

}