<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vacaciones extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        $this->load->model('AsistenciaModel');
    }

    public function index()
    {
        $data['activomenu'] = 11;
        $data['activo'] = 122;
        $data['lista_personal'] = $this->AsistenciaModel->listaPersonal();
        $this->load->view('layout/nav');
        $this->load->view('menu/menu_admin_personal', $data);
        $this->load->view('Asistencia/Vacaciones');
        $this->load->view('layout/footer');
    }

    public function obtenerdetalleVacaciones(){
		$ajax_data = $this->input->post(); //Datos que vienen por POST

        $diaspedidos = $ajax_data['dias_pedidos'];
        $fechainiciotrabajo = $ajax_data['fecha_iniciotrabajo'];
        $fechaterminotrabajo = $ajax_data['fecha_terminotrabajo'];

        //echo"INICIO TRABAJO: ".$fechainiciotrabajo."\n";
        //echo"TERMINO TRABAJO: ".$fechaterminotrabajo."\n";
        
        //Paso de string a fecha
        $d1 = new DateTime($fechainiciotrabajo);
        $d2 = new DateTime($fechaterminotrabajo);

        $interval = $d1->diff($d2);

        $diasTotales    = $interval->d; 
        $mesesTotales  = $interval->m;
        //echo"Dias totales: ".$diasTotales."\n";
        //echo"Meses totales: ".$mesesTotales."\n";

        $diashabiles = 15/12; //1,25
        $diashabiles2 = ($diashabiles / 30) * $diasTotales; //0,04167
        //echo"DIAS HABILES: ".$diashabiles2."\n";

        $diasmeses = (float)$diashabiles * $mesesTotales; //7,5

        $diasindemnizar = (float)$diasmeses + (float) $diashabiles2;
        $diasindemnizarround = round($diasindemnizar);
        //echo"Dias indemnizar TOTAL: ".$diasindemnizarround."\n";
        

        /*
        //Dias y meses dentro de la fecha
        $diasindemnizar = (float)$diashabiles * $mesesTotales; //10
        $diasindemnizar2 = (float)$diashabiles2 * $diasTotales; //0,0833
        //Suma total
        $diashabilesindemnizar = $diasindemnizar + $diasindemnizar2; //10,08
        */


        //Sumar 1 dia a la fecha de termino de contrato
        $fechaterminomasdia = date('d-m-Y', strtotime($fechaterminotrabajo . ' +1 day'));
        //echo"FECHA TERMINO MAS DIA: ".$fechaterminomasdia."\n";

        //echo " FECHA MAs 1 dia".$stop_date;
        $fechaterminovacaciones = date('d-m-Y', strtotime($fechaterminomasdia . ' +'.$diasindemnizarround.' day'));
        //echo"FECHA TERMINO CUENTA: ".$fechaterminovacaciones."\n";

        $datepartida = new DateTime($fechaterminomasdia); //Inicio de conteo
        $datetermino = new DateTime($fechaterminovacaciones); //Termino de conteo

        //Calculo de domingos
        $days = $datepartida->diff($datetermino, true)->days;

        $sundays = intval($days / 7) + ($datepartida->format('N') + $days % 7 >= 7);
        //echo"Domingos: ".$sundays."\n";

        //Calculo de sabados
        $days = $datepartida->diff($datetermino, true)->days;

        $saturdays = intval($days / 7) + ($datepartida->format('N') + $days % 6 >= 6);
        //echo"Sabados: ".$saturdays."\n";

        $diasaindemnizar = $diasindemnizarround + intval($sundays) + intval($saturdays);
        //echo"Dias indemnizar total: ".$diasaindemnizar."\n";

        //Resumen
        $diaslegales = 20; //Vacaciones legales
        $diasprogresivos = 0;
        $subtotalacumulado = intval($diaslegales) + intval($diasprogresivos);
        $totalvacacionespendientes = (float)$subtotalacumulado+(float)$diasaindemnizar;
        $saldoremamentefecha = (float)$totalvacacionespendientes - $diaspedidos;


        /*
            El detalle del ejemplo es el siguiente: 
            a) 15: 12 = 1,25 (días de vacaciones por mes trabajado) 1,25: 30 = 0,04167 
            (vacaciones por día trabajado) 
            b) 1,25 x 8 meses = 10 0,04167 x 2 días = 0,08333 Días hábiles a indemnizar = 10,08 
            c) Contabilizar los 10,75 días hábiles a partir del día siguiente al término de contrato 
            (18.12.2017) 
            d) Agregar los días sábado, domingo y festivos que inciden en el cómputo anterior 
            (entre el 18.12.2017 y el 03.01.2018)= 6 o 
            e) Nº de días a indemnizar (16,75) x sueldo diario.
        */
		
		//$horas_extras = $this->AsistenciaModel->ObtenerHorasExtras($ajax_data['rut_personal'],$ajax_data['fecha_inicio'],$ajax_data['fecha_fin']);

        $response = "<div class='table-responsive'>";
        $response ="<TABLE BORDER class='table table-bordered'>";
        $response .="<TR>";
        $response .="<TD>Vacaciones legales acumuladas:</TD>";
        $response .="<TH>".$diaslegales."</TH>";
        $response .="</TR>";
        $response .="<TR>";
        $response .="<TD>Dias progresivos pendientes</TD>";
        $response .="<TH>".$diasprogresivos."</TH>";
        $response .="</TR>";
        $response .="<TR>";
        $response .="<TD>Subtotal vacaciones acumuladas</TD>";
        $response .="<TH>".$subtotalacumulado."</TH>";
        $response .="</TR>";
        $response .="<TR>";
        $response .="<TD>Dias proporcionales a la fecha</TD>";
        $response .="<TH>".$diasaindemnizar."</TH>";
        $response .="</TR>";
        $response .="<TR>";
        $response .="<TD>Total vacaciones pendientes</TD>";
        $response .="<TH>".$totalvacacionespendientes."</TH>";
        $response .="</TR>";
        $response .="<TR>";
        $response .="<TD>Dias normales a usar</TD>";
        $response .="<TH>".$diaspedidos."</TH>";
        $response .="</TR>";
        $response .="<TR>";
        $response .="<TD>Saldo remamente a la fecha</TD>";
        $response .="<TH>".$saldoremamentefecha."</TH>";
        $response .="</TR>";
        $response .="</TABLE>";
        $response .= "</div>";
        $response .= "<div class='row'>";
        $response .= "<div class='col-md-4'>";
        $response .= "</div>";
        $response .= "<div class='col-md-4'>";
        $response .= "<div class='form-group'>";
        $response .= "<label class='invisible'>Actualizar</label>";
        $response .= "<button type='button' class='btn btn-block btn-primary' onclick='guardarAsistencia()'>Guardar</button>";
        $response .= "</div>";
        $response .= "</div>";
        $response .= "<div class='col-md-4'>";
        $response .= "</div>";
        $response .= "</div>";
        

		$data = array('response' => 'success', 'detalle' => $response);


		echo json_encode($data);
    }
}

