<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vacaciones extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        $this->load->model('VacacionesModel');
        $this->load->model('AsistenciaModel');
        $this->load->model('Personal');
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

    public function obtenerVacaciones(){
        $fetch_data = $this->VacacionesModel->make_datatables_vacaciones();
        $data = array();
        foreach ($fetch_data as $value){

            $sub_array = array();
            $sub_array[] = '<input type="hidden" value='.$value->id_personal.'" class="name-file" disabled/>';
            $sub_array[] = $value->rut;
            $sub_array[] = $value->nombrecompleto;
            $sub_array[] = $value->fechainicio;
            $sub_array[] = $value->fechatermino;
            $sub_array[] = $value->diasausar;
            $sub_array[] = '<a href="#" class="fas fa-eye" id="detalle_asistencia" data-toggle="modal"data-target="#modal-detalle-asistencia">';

            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]) ,
            "recordsTotal" => $this->VacacionesModel->get_all_data_vacaciones() ,
            "recordsFiltered" => $this->VacacionesModel->get_filtered_data_vacaciones() ,
            "data" => $data
        );
    
        
        echo json_encode($output);

    }

    public function descargarDetalle(){
        $ajax_data = $this->input->post();
        $rut = $ajax_data['rutpersonal'];
        $diasacumulados = implode($ajax_data['col1']);
        $diasprogresivos = implode($ajax_data['col2']);
        $subtotalacumulado = implode($ajax_data['col3']);
        $diasproporcionales = implode($ajax_data['col4']);
        $totalvacaciones = implode($ajax_data['col5']);
        $diasausar = implode($ajax_data['col6']);
        $saldoremamente = implode($ajax_data['col7']);
        
        $nombre = $this->Personal->ObtenerNombrePersonal($rut);
		$hoy = date("dmyhis");
        $fechaactual = date("d/m/Y");
        $añoactual = date("Y");

        /*----------------------------------------------*/
        $fechainicio = $ajax_data['fecha_termino'];
        $diasusar = $ajax_data['diaspedidos'];

        $fechainiciomasdia = date('d-m-Y', strtotime($fechainicio . ' +1 day')); //Fecha inicio de vacaciones
        $d = new DateTime($fechainiciomasdia);
        $t = $d->getTimestamp();

        // loop for X days
        for($i=0; $i<$diasusar; $i++){
            // add 1 day to timestamp
            $addDay = 86400;
            // modify timestamp, add 1 day
            $t = $t+$addDay;
        }

        $d->setTimestamp($t);
        $fechafinal = $d->format( 'd-m-Y' ); //Fecha termino de vacaciones
        $fechafinal = date('d-m-Y', strtotime($fechafinal . ' -1 day')); //Aqui falta arreglar, falta verificar si la fecha final cae en fin de semana
        $fechainiciotrabajo = date('d-m-Y', strtotime($fechafinal . ' +1 day')); //Fecha inicio de trabajo
        /*-----------------------------------------------*/

        $stylesheet = file_get_contents(base_url().'assets/login/diseño/bootstrap/css/bootstrap.min.css');

        $html = "<blockquote class='blockquote text-center'>";
        $html .= "<p class='mb-0'>Comprobante de vacaciones</p>";
        $html .= "<footer class='blockquote-footer'>Fecha: ".$fechaactual." </footer>";
        $html .= "</blockquote>";
        $html .= "En cumplimiento a las disposiciones legales vigentes se deja constacia que el/la trabajador(a): ".$nombre[0]['nombrecompleto'];
        $html .= " Rut: ".$nombre[0]['rut']." Hara uso de dias habiles de feriado anual con remuneracion integra.";
        $html .= "<br>";
        $html .= " Esto se hará efectivo a partir del dia ".(string)$fechainiciomasdia." hasta el dia ".$fechafinal.". Retornando a trabajar a partir del dia ".$fechainiciotrabajo." y corresponde al periodo ".$añoactual.".";
        $html .= "<br>";
        $html .= "<br>";
        $html .= "<div class='table-responsive'>";
        $html .="<TABLE BORDER class='table table-bordered' id='tabla_vacaciones'>";
        $html .="<TR>";
        $html .="<TD>Vacaciones legales acumuladas:</TD>";
        $html .="<TH>".$diasacumulados."</TH>";
        $html .="</TR>";
        $html .="<TR>";
        $html .="<TD>Dias progresivos pendientes</TD>";
        $html .="<TH>".$diasprogresivos."</TH>";
        $html .="</TR>";
        $html .="<TR>";
        $html .="<TD>Subtotal vacaciones acumuladas</TD>";
        $html .="<TH>".$subtotalacumulado."</TH>";
        $html .="</TR>";
        $html .="<TR>";
        $html .="<TD>Dias proporcionales a la fecha</TD>";
        $html .="<TH>".$diasproporcionales."</TH>";
        $html .="</TR>";
        $html .="<TR>";
        $html .="<TD>Total vacaciones pendientes</TD>";
        $html .="<TH>".$totalvacaciones."</TH>";
        $html .="</TR>";
        $html .="<TR>";
        $html .="<TD>Dias normales a usar</TD>";
        $html .="<TH>".$diasausar."</TH>";
        $html .="</TR>";
        $html .="<TR>";
        $html .="<TD>Saldo remamente a la fecha</TD>";
        $html .="<TH>".$saldoremamente."</TH>";
        $html .="</TR>";
        $html .="</TABLE>";
        $html .= "</div>";
        $html .= "<br>";
        $html .= "<br>";
        $html .= "<br>";
        $html .= "<p align='right'>____________________________</p>";
        $html .= "<p align='right'>Firma trabajador</p>";

        //this the the PDF filename that user will get to download
        $pdfFilePath = "cipdf_".$hoy.".pdf";
 
        //load mPDF library
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY,true, false);
        $mpdf->Output($pdfFilePath, "D");
    }

    public function obtenerdetalleVacaciones(){
		$ajax_data = $this->input->post(); //Datos que vienen por POST

        $diaspedidos = $ajax_data['dias_pedidos'];
        $fechainiciotrabajo = $ajax_data['fecha_contrato'];
        $fechasolicitud = $ajax_data['fecha_solicitud'];

        //echo"INICIO TRABAJO: ".$fechainiciotrabajo."\n";
        //echo"TERMINO TRABAJO: ".$fechaterminotrabajo."\n";
        
        //Paso de string a fecha
        $d1 = new DateTime($fechainiciotrabajo);
        $d2 = new DateTime($fechasolicitud);

        $interval = $d1->diff($d2);

        $diasTotales    = $interval->d; 
        $mesesTotales  = $interval->m;
        $añosTotales  = $interval->y;
        if($añosTotales > 0){

            $diaslegales = 15 * $añosTotales; //Vacaciones legales
            //echo "Tienes: ".$añosTotales;
            //echo"Dias totales: ".$diasTotales."\n";
            //echo"Meses totales: ".$mesesTotales."\n";

            //$diashabiles = 15/12; //1,25
            //$diashabiles2 = ($diashabiles / 30) * $diasTotales; //0,04167
            //echo"DIAS HABILES: ".$diashabiles2."\n";

            //$diasmeses = (float)$diashabiles * $mesesTotales; //7,5

            //$diasindemnizar = (float)$diasmeses + (float) $diashabiles2;
            //$diasindemnizarround = round($diasindemnizar);
            //echo"Dias indemnizar ROUND: ".$diasindemnizarround."\n";
            

            /*
            //Dias y meses dentro de la fecha
            $diasindemnizar = (float)$diashabiles * $mesesTotales; //10
            $diasindemnizar2 = (float)$diashabiles2 * $diasTotales; //0,0833
            //Suma total
            $diashabilesindemnizar = $diasindemnizar + $diasindemnizar2; //10,08
            */


            //Sumar 1 dia a la fecha de termino de contrato
            $fechasolicitudmasdia = date('d-m-Y', strtotime($fechasolicitud . ' +30 day'));
            //echo"FECHA TERMINO MAS DIA: ".$fechaterminomasdia."\n";

            //Conteo de dias totales sin contar sabados y domingos
            $d = new DateTime( $fechasolicitudmasdia );
            $t = $d->getTimestamp();

            /* FOR PARA RECORRER DIAS SIN CONTAR LOS SABADOS NI DOMINGOS
            for($i=0; $i<$diasindemnizarround; $i++){
                // add 1 day to timestamp
                $addDay = 86400;

                // get what day it is next day
                $nextDay = date('w', ($t+$addDay));

                // if it's Saturday or Sunday get $i-1
                if($nextDay == 0 || $nextDay == 6) {
                    $i--;
                }

                // modify timestamp, add 1 day
                $t = $t+$addDay;
            }*/

            /*
            $d->setTimestamp($t);
            $fechafinal = $d->format( 'd-m-Y' );
            //----------------------------------------------------------------------
            $datepartida = new DateTime($fechasolicitudmasdia); //Inicio de conteo
            $datetermino = new DateTime($fechafinal); //Termino de conteo

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
            */

            //Resumen
            
            $diasprogresivos = 0;
            $subtotalacumulado = intval($diaslegales) + intval($diasprogresivos);
            $totalvacacionespendientes = (float)$subtotalacumulado;
            $saldoremamentefecha = (float)$totalvacacionespendientes - $diaspedidos;


            //echo "FECHA FINAL ".$fechafinal. "\n";


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
            
            $response = "<div class='row'>";
            $response .= "<div class='col-md-4'>";
            $response .= "<button type='submit' class='btn btn-app'>";
            $response .= "<i class='fas fa-plus'>";
            $response .= "</i>Exportar";
            $response .= "</button>";
            $response .= "</div>";
            $response .= "</div>";
            $response .= "<div class='table-responsive'>";
            $response .="<TABLE BORDER class='table table-bordered' id='tabla_vacaciones'>";
            $response .="<TR>";
            $response .="<TD>Vacaciones legales acumuladas:</TD>";
            $response .="<TH><input name='col1[]' id='diaslegales' style='border:0;outline:0;display:inline-block' value=".$diaslegales."></TH>";
            $response .="</TR>";
            $response .="<TR>";
            $response .="<TD>Dias progresivos pendientes</TD>";
            $response .="<TH><input name='col2[]' id='diasprogresivos' style='border:0;outline:0;display:inline-block' value=".$diasprogresivos."></TH>";
            $response .="</TR>";
            $response .="<TR>";
            $response .="<TD>Subtotal vacaciones acumuladas</TD>";
            $response .="<TH><input name='col3[]' style='border:0;outline:0;display:inline-block' value=".$subtotalacumulado."></TH>";
            $response .="</TR>";
            $response .="<TR>";
            $response .="<TR>";
            $response .="<TD>Total vacaciones pendientes</TD>";
            $response .="<TH><input name='col5[]' style='border:0;outline:0;display:inline-block' value=".$totalvacacionespendientes."></TH>";
            $response .="</TR>";
            $response .="<TR>";
            $response .="<TD>Dias normales a usar</TD>";
            $response .="<TH><input name='col6[]' id='diaspedidostable' style='border:0;outline:0;display:inline-block' value=".$diaspedidos."></TH>";
            $response .="</TR>";
            $response .="<TR>";
            $response .="<TD>Saldo remamente a la fecha</TD>";
            $response .="<TH><input name='col7[]' style='border:0;outline:0;display:inline-block' value=".$saldoremamentefecha."></TH>";
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
        }

		echo json_encode($data);
    }

    public function ingresoVacaciones(){
        if ($this->input->is_ajax_request()){
            $ajax_data = $this->input->post();
            $fechainicio = $ajax_data['fecha_solicitud'];
            $lista_diasusar = $ajax_data['diasusar'];
            $diasusar_limpio = 0;
            for($count = 0; $count<count($lista_diasusar); $count++){
                $diasusar_limpio = $lista_diasusar[$count];
            
            }

            $fechainiciomasdia = date('d-m-Y', strtotime($fechainicio . ' +30 day'));
            //Conteo de dias totales sin contar sabados y domingos
            $d = new DateTime($fechainiciomasdia);
            $t = $d->getTimestamp();

            // loop for X days
            for($i=0; $i<$diasusar_limpio; $i++){
                // add 1 day to timestamp
                $addDay = 86400;

                // get what day it is next day
                $nextDay = date('w', ($t+$addDay));

                // if it's Saturday or Sunday get $i-1
                if($nextDay == 0 || $nextDay == 6) {
                    $i--;
                }

                // modify timestamp, add 1 day
                $t = $t+$addDay;
            }

            $d->setTimestamp($t);
            $fechafinal = $d->format( 'd-m-Y' );
            //----------------------------------------------------------------------



            //Validaciones
            $this->form_validation->set_rules('rut', 'Rut', 'required');
            if ($this->form_validation->run() == false)
            {
                $data = array('response' => "error",'message' => validation_errors());
            }else{
                $ajax_data = $this->input->post();
                if ($this->VacacionesModel->registrarVacaciones($ajax_data,$fechainiciomasdia,$fechafinal)){
                    $data = array('response' => "success",'message' => "Vacaciones ingresadas correctamente!");
                }
                else{
                    $data = array('response' => "error",'message' => "Falló el ingreso");
                }
            }
            echo json_encode($data);
        }
        else
        {
            echo "'No direct script access allowed'";
        }

    }
}

