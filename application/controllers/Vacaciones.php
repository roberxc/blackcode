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
            $sub_array[] = $value->id_vacaciones;
            $sub_array[] = $value->rut;
            $sub_array[] = $value->nombrecompleto;
            $sub_array[] = $value->fechainicio;
            $sub_array[] = $value->fechatermino;
            $sub_array[] = $value->diasausar;
            $sub_array[] = '<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-confirmacion" onclick="setIDVacaciones(this)"><i class="fas fa-trash"></i></button>';

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
        
        //Paso de string a fecha
        $d1 = new DateTime($fechainiciotrabajo);
        $d2 = new DateTime($fechasolicitud);

        $interval = $d1->diff($d2);

        $diasTotales    = $interval->d; 
        $mesesTotales  = $interval->m;
        $añosTotales  = $interval->y;
        //Solo por 2 años  o mas se pueden acumular vacaciones
        if($añosTotales >2){
            $añosTotales = 3;
        }

        //1 año menos para saber la cantidad de dias que se pidio en el periodo anterior
        $datequery = strtotime($fechasolicitud.' -1 year');
        $periodoanterior = date('Y', $datequery);
        $diasusados = $this->VacacionesModel->obtenerDiasUsados($ajax_data['rut_personal'],$periodoanterior);
        if(count($diasusados) > 0){
            $diaslegales = (15 * $añosTotales) - intval($diasusados[0]['diasausar']);    
        }else{
            $diaslegales = (15 * $añosTotales); //Vacaciones legales
        }

        //Resumen
        
        $diasprogresivos = 0;
        $subtotalacumulado = intval($diaslegales) + intval($diasprogresivos);
        $totalvacacionespendientes = (float)$subtotalacumulado;
        $saldoremamentefecha = (float)$totalvacacionespendientes - $diaspedidos;
        
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

    //Eliminar un registro de vacaciones
	public function deleteRegVacaciones(){
		$ajax_data = $this->input->post();
		$nroreg = $ajax_data['id_vacaciones'];
		$res = $this->VacacionesModel->deleteRegVacaciones($nroreg);
        if($res){
            $data = array('response' => 'success', 'message' => 'Exito');
        }else{
            $data = array('response' => 'error', 'message' => $res);
        }
		echo json_encode($data);

	}
}

