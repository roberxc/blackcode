<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asistencia extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        $this
            ->load
            ->model('AsistenciaModel');
    }

    public function index()
    {
        $data['activomenu'] = 4;
        $data['activo'] = 5;
        $this
            ->load
            ->view('layout/nav');
        $this
            ->load
            ->view('menu/menu_admin_personal', $data);
        $this
            ->load
            ->view('Asistencia/IngresarAsistencia');
        $this
            ->load
            ->view('layout/footer');
    }

    public function AsistenciaEspera()
    {
        $data['activomenu'] = 4;
        $data['activo'] = 6;
        $this
            ->load
            ->view('layout/nav');
        $this
            ->load
            ->view('menu/menu_admin_personal', $data);
        $this
            ->load
            ->view('Asistencia/AsistenciaEspera');
        $this
            ->load
            ->view('layout/footer');
    }

    public function ingresoAsistencia()
    {
        if ($this
            ->input
            ->is_ajax_request())
        {
            //Validaciones
            $this
                ->form_validation
                ->set_rules('rut', 'Rut', 'required');
            $this
                ->form_validation
                ->set_rules('nombrecompleto', 'Nombre', 'required');
            $this
                ->form_validation
                ->set_rules('fecha', 'Fecha', 'required');
            $this
                ->form_validation
                ->set_rules('horallegadam', 'Hora llegada mañana', 'required');
            $this
                ->form_validation
                ->set_rules('horasalidam', 'Hora salida mañana', 'required');
            $this
                ->form_validation
                ->set_rules('horallegadat', 'Hora llegada tarde', 'required');
            $this
                ->form_validation
                ->set_rules('horasalidat', 'Hora salida tarde', 'required');
            $this
                ->form_validation
                ->set_rules('estado', 'Asistente', 'required');

            if ($this
                ->form_validation
                ->run() == false)
            {
                $data = array(
                    'response' => "error",
                    'message' => validation_errors()
                );
            }
            else
            {
                $ajax_data = $this
                    ->input
                    ->post();

                if ($this
                    ->AsistenciaModel
                    ->registrarAsistenciaPersonal($ajax_data))
                {
                    $data = array(
                        'response' => "success",
                        'message' => "Monto ingresado correctamente!"
                    );
                }
                else
                {
                    $data = array(
                        'response' => "error",
                        'message' => "Falló el ingreso"
                    );
                }
            }

            echo json_encode($data);
        }
        else
        {
            echo "'No direct script access allowed'";
        }

    }

    public function obtenerAsistencia()
    {
        $fetch_data = $this
            ->AsistenciaModel
            ->make_datatables_asistencia();
        $data = array();
        foreach ($fetch_data as $value)
        {

            $sub_array = array();
            $sub_array[] = '<input type="hidden" value='.$value->id_personal.'" class="name-file" disabled/>';
            $sub_array[] = $value->rut;
            $sub_array[] = $value->nombrecompleto;
            $sub_array[] = $value->fecha_asistencia;
            $sub_array[] = '<a href="#" class="fas fa-eye" id="detalle_asistencia" data-toggle="modal"data-target="#modal-detalle-asistencia">';

            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]) ,
            "recordsTotal" => $this
                ->AsistenciaModel
                ->get_all_data_stock() ,
            "recordsFiltered" => $this
                ->AsistenciaModel
                ->get_filtered_data_stock() ,
            "data" => $data
        );
        echo json_encode($output);

    }

    public function obtenerAsistenciaCompleta()
    {
        $ajax_data = $this->input->post(); //Datos que vienen por POST
        $asistencia_planilla = $this->AsistenciaModel->ObtenerAsistenciaCompleta($ajax_data['id_personal']);

        $response = "<div class='table-responsive'>";
        $response .= "<table class='table table-bordered'>";
		$response .= "<tr>";
		$response .= "<td>";
        $response .= "<label>Rut</label>";
		$response .= "</td>";
		$response .= "<td>";
        $response .= "<label>Nombre Completo</label>";
        $response .= "</td>";
        $response .= "<td>";
        $response .= "<label>Fecha Asistencia</label>";
        $response .= "</td>";
        $response .= "<td>";
        $response .= "<label>Hora llegada mañana</label>";
        $response .= "</td>";
        $response .= "<td>";
        $response .= "<label>Hora salida mañana</label>";
		$response .= "</td>";
		$response .= "<td>";
        $response .= "<label>Hora llegada tarde</label>";
        $response .= "</td>";
        $response .= "<td>";
        $response .= "<label>Hora salida tarde</label>";
        $response .= "</td>";
        $response .= "<td>";
        $response .= "<label>Horas trabajadas</label>";
        $response .= "</td>";
        $response .= "<td>";
        $response .= "<label>Horas extras</label>";
        $response .= "</td>";
        $response .= "</tr>";
        $response .= "<tbody>";
        foreach ($asistencia_planilla as $row)
        {
            $response .= "<tr>";
            $response .= "<td>";
            $response .= "$row->rut";
            $response .= "</td>";
            $response .= "<td>";
            $response .= $row->NombreCompleto;
			$response .= "</td>";
			$response .= "<td>";
            $response .= $row->Fecha;
            $response .= "</td>";
            $response .= "<td>";
            $response .= $row->LlegadaM;
            $response .= "</td>";
            $response .= "<td>";
            $response .= $row->SalidaM;
			$response .= "</td>";
			$response .= "<td>";
            $response .= $row->LlegadaT;
            $response .= "</td>";
            $response .= "<td>";
            $response .= $row->SalidaT;
            $response .= "</td>";
            $response .= "<td>";
            $response .= $row->HorasTrabajadas;
            $response .= "</td>";
            $response .= "<td>";
            $response .= $row->HorasExtras;
            $response .= "</td>";
            $response .= "</tr>";
        }
        $response .= "</tbody>";
        $response .= "</table>";
        $response .= "</div>";

        $data = array(
            'response' => 'success',
            'planilla' => $response
        );

        echo json_encode($data);
    }
}

