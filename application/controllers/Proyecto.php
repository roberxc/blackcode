<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Proyecto extends CI_Controller
{
    function __construct(){
		parent::__construct();
        $this->load->model('Proyecto_model');
        $this->load->helper(array('form', 'url'));
    }
    public function registroTrabajador(){
		$data ['activo'] = 6;
		$data ['activomenu'] = 2;
		$this->load->view('layout/nav');
		$this->load->view('menu/menu_proyecto',$data);
		$this->load->view('Proyecto/GestionTrabajador');
		$this->load->view('layout/footer');
	}
    public function Estado_proyecto()
    {
        $data ['activo'] = 4;
        $this->load->view('layout/nav');
        $this->load->view('menu/menu_proyecto',$data);
		$this->load->view('Proyecto/Estado');
		$this->load->view('layout/footer');
    }
    public function Proyecto_ejecucion()
    {
        $data ['activo'] = 5;
        $this->load->view('layout/nav');
        $this->load->view('menu/menu_proyecto',$data);
		$this->load->view('Proyecto/ProyectoE');
		$this->load->view('layout/footer');
    }
    public function Planilla_Proyecto($idproyecto)
    {
        $data ['activo'] = 6;
        $data ['codigo'] = $idproyecto;

       $data ['Monto_total'] = $this->Proyecto_model->obtenerTotalFactura($data['codigo']);
       $data ['Monto_balanceProyecto'] = $this->Proyecto_model->TotalBalanceProyecto($data['codigo']);
       $data ['Monto_TotalProyecto'] = $this->Proyecto_model->MostrarTotalProyecto($data['codigo']);
       $data ['Monto_presupuesto'] = $this->Proyecto_model->obtenerTotalPresupuesto($data['codigo']);
       $data ['Monto_balance'] = $this->Proyecto_model->TotalBalance($data['codigo']);
        $data['Monto_proyecto'] = $this->Proyecto_model->obtenerMontoProyecto($data['codigo']);
        $this->load->view('menu/menu_proyecto',$data);
		$this->load->view('Proyecto/PlanillasPro',$data);
		$this->load->view('layout/footer');
    }

    

    public function Evaluacion_proyecto()
    {
        // $data[ es lo que lleva en la vista foreach($partidas as $i)]combobox
        $data['partidas'] = $this->Proyecto_model->Mostrarpartidas();
        $data ['activo'] = 4;
        $this->load->view('layout/nav-proyecto');
        $this->load->view('menu/menu_proyecto',$data);
		$this->load->view('Proyecto/Evaluacion');
        $this->load->view('layout/footer');
    }
    public function Registro_proyecto()
    {      
        $data ['activo'] = 4;
        $this->load->view('layout/nav-proyecto');
        $this->load->view('menu/menu_proyecto',$data);
		$this->load->view('Proyecto/RegistroProyecto');
        $this->load->view('layout/footer');
    }
    public function obtenerDetalleDespiece(){
		$ajax_data = $this->input->post(); //Datos que vienen por POST
		$lista_etapas = $this->Proyecto_model->MostrarpartidasEtapas($ajax_data['id_partida']);
		$response = "<div class='table-responsive'>";
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
		foreach($lista_etapas as $row){ 
            $response .= "<tr>";
            $response .= "<td>";
			$response .= $row->id;
			$response .= "</td>";
			$response .= "<td>";
			$response .= $row->nombreetapa;
			$response .= "</td>";
            $response .= "<td>";
            if($row->estado == 0){
                $response .= '<span class="badge badge-danger">No registrado</span>';
            }else{
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

		$data = array('response' => 'success', 'detalle' => $response);


		echo json_encode($data);
	}
    
    //Mostrar estado de todos los proyectos en ejecución a la vista de todos los usuarios

   public function fetch_data()
   {
       $this->load->model('Proyecto_model', 'proyecto_modal');

       $fetch_data = $this->proyecto_modal->make_datatables_EstadoProyecto();
       $data = array();
       foreach ($fetch_data as $value) {

           $sub_array      = array();
           $sub_array[]    = $value->id_proyecto;
           $sub_array[]    = $value->nombreproyecto;
           $sub_array[]    = $value->nombreusuario;
           $sub_array[]    = $value->fecha_inicio;
           $sub_array[]	   = $value->fecha_termino;
           if($value->estado == 0){
            $sub_array[]= '<span class="badge badge-danger">En proceso</span>';
        }else{
            $sub_array[]= '<span class="badge badge-success">Terminado</span>';
        }
           $sub_array[]	= '<a href="#" class="fas fa-eye" style="font-size: 20px;" data-toggle="modal" data-target="#myModalVerMas" >';
          
           $data[]         = $sub_array;
       }
       $output = array(
           "draw"                =>     intval($_POST["draw"]),
            "recordsTotal"        =>     $this->Proyecto_model->get_all_data_EstadoProyecto(),
          "recordsFiltered"     =>     $this->Proyecto_model->get_filtered_data_EstadoProyecto(),
           "data"                =>     $data
       );
       echo json_encode($output);  
   }
   public function fetch_ProyectoEjecutados()
   {
       $this->load->model('Proyecto_model', 'proyecto_modal');

       $fetch_data = $this->proyecto_modal->make_datatables_ProyectoEjecutados();
       $data = array();
       foreach ($fetch_data as $value) {

           $sub_array      = array();
           $sub_array[]    = $value->id_proyecto;
           $sub_array[]    = $value->nombreproyecto;
           $sub_array[]    = $value->fecha_inicio;
           $sub_array[]	   = $value->fecha_termino;
           if($value->estado == 0){
            $sub_array[]= '<span class="badge badge-danger">En proceso</span>';
        }else{
            $sub_array[]= '<span class="badge badge-success">Terminado</span>';
        }
           $sub_array[]	= '<a href="#" class="fas fa-eye" style="font-size: 20px;" onclick="detalleProyecto(this)" >';
           $sub_array[]	= '<a href="#" class="fas fa-eye" style="font-size: 20px;" data-toggle="modal" data-target="#myModalVerMas" >';
           $data[]         = $sub_array;
       }
       $output = array(
           "draw"                =>     intval($_POST["draw"]),
            "recordsTotal"        =>     $this->Proyecto_model->get_all_data_EstadoProyecto(),
          "recordsFiltered"     =>     $this->Proyecto_model->get_filtered_data_EstadoProyecto(),
           "data"                =>     $data
       );
       echo json_encode($output);  
   }
  

public function GuardarProyectos(){
    if ($this->input->is_ajax_request()) {
        //Validaciones
        $this->form_validation->set_rules('nombreProyecto', 'nombreProyecto', 'required');
        $this->form_validation->set_rules('fechaInicio', 'fechaInicio', 'required');
        $this->form_validation->set_rules('fechaTermino', 'fechaTermino', 'required');
        $this->form_validation->set_rules('monto', 'monto', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array('response' => "error", 'message' => validation_errors());
        } else {
            $ajax_data = $this->input->post();
            
            if (!$this->Proyecto_model->ingresoProyecto($ajax_data)) {
                $data = array('response' => "success", 'message' => "Proyecto Registrado");
                
            }else{
                $data = array('response' => "error", 'message' => "Falló el registro");
            }

        }

        echo json_encode($data);
    } else {
        echo "'No direct script access allowed'";
    }

}

public function registroPersonal(){
    if ($this->input->is_ajax_request()) {
        //Validaciones
        echo "Llego aqui";
        $this->form_validation->set_rules('name', 'Nombre completo', 'required');
        $this->form_validation->set_rules('rut', 'Rut', 'required');
        $this->form_validation->set_rules('telefono', 'Telefono', 'required');
        $this->form_validation->set_rules('email', 'Correo', 'required|valid_email');
        $this->form_validation->set_rules('cargo', 'Cargo', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array('response' => "error", 'message' => validation_errors());
        } else {
            $ajax_data = $this->input->post();
            
            if (!$this->Proyecto_model->registroPersonal($ajax_data)) {
                $data = array('response' => "success", 'message' => "Proyecto Registrado");
                
            }else{
                $data = array('response' => "error", 'message' => "Falló el registro");
            }

        }

        echo json_encode($data);
    } else {
        echo "'No direct script access allowed'";
    }	
}

public function registroPartidas(){
		
    if ($this->input->is_ajax_request()) {
        $ajax_data = $this->input->post();
        $res = $this->Proyecto_model->registrarPartidasModels($ajax_data);
        if ($res) {
            $data = array('response' => "success", 'message' => "Guardado exitosamente!");
        }else{
            $data = array('response' => "error", 'message' => $res);
        }
        echo json_encode($data);
    } else {
        echo "'No direct script access allowed'";
    }
}

public function GuardarPorcentaje(){
    if ($this->input->is_ajax_request()) {
        $ajax_data = $this->input->post();
        $res = $this->Proyecto_model->ingresoPorcentaje($ajax_data);
        if ($res) {
            $data = array('response' => "error", 'message' => $res);
           
        }else{
            $data = array('response' => "success", 'message' => "Guardado exitosamente!");
        }
        echo json_encode($data);
    } else {
        echo "'No direct script access allowed'";
    }
}



public function registroSupervision(){
		
    if ($this->input->is_ajax_request()) {
        $ajax_data = $this->input->post();
        $res = $this->Proyecto_model->ingresarSupervision($ajax_data);
        if ($res) {
            $data = array('response' => "success", 'message' => "Guardado exitosamente!");
        }else{
            $data = array('response' => "error", 'message' => $res);
        }
        echo json_encode($data);
    } else {
        echo "'No direct script access allowed'";
    }
}
public function registroInstalacion(){
		
    if ($this->input->is_ajax_request()) {
        $ajax_data = $this->input->post();
        $res = $this->Proyecto_model->ingresarInstalacion($ajax_data);
        if ($res) {
            $data = array('response' => "success", 'message' => "Guardado exitosamente!");
        }else{
            $data = array('response' => "error", 'message' => $res);
        }
        echo json_encode($data);
    } else {
        echo "'No direct script access allowed'";
    }
}

public function registroEtapas(){
		
    if ($this->input->is_ajax_request()) {
        $ajax_data = $this->input->post();
        $res = $this->Proyecto_model->ingresarEtapas($ajax_data);
        if ($res) {
            $data = array('response' => "success", 'message' => "Guardado exitosamente!");
        }else{
            $data = array('response' => "error", 'message' => $res);
        }
        echo json_encode($data);
    } else {
        echo "'No direct script access allowed'";
    }
}

public function registroDespiece(){
		
    if ($this->input->is_ajax_request()) {
        $ajax_data = $this->input->post();
        $res = $this->Proyecto_model->ingresarDespiece($ajax_data);
        if ($res) {
            $data = array('response' => "success", 'message' => "Guardado exitosamente!");
        }else{
            $data = array('response' => "error", 'message' => $res);
        }
        echo json_encode($data);
    } else {
        echo "'No direct script access allowed'";
    }
}
public function Guardarflete(){
    if ($this->input->is_ajax_request()) {
        //Validaciones
        $this->form_validation->set_rules('id_etapa', 'id_etapa', 'required');
        $this->form_validation->set_rules('valor', 'valor', 'required');
       

        if ($this->form_validation->run() == FALSE) {
            $data = array('response' => "error", 'message' => validation_errors());
        } else {
            $ajax_data = $this->input->post();
            
            if (!$this->Proyecto_model->ingresoflete($ajax_data)) {
                $data = array('response' => "success", 'message' => "Proyecto Registrado");
                
            }else{
                $data = array('response' => "error", 'message' => "Falló el registro");
            }

        }

        echo json_encode($data);
    } else {
        echo "'No direct script access allowed'";
    }

}
public function GuardarFleteTraslado(){
    if ($this->input->is_ajax_request()) {
        $ajax_data = $this->input->post();
        $res = $this->Proyecto_model->ingresoFleteTraslado($ajax_data);
        if ($res) {
            $data = array('response' => "success", 'message' => $res);
           
        }else{
            $data = array('response' => "error", 'message' => "ERRRROR!");
        }
        echo json_encode($data);
    } else {
        echo "'No direct script access allowed'";
    }
}


public function obtenerResumenProyecto(){
        $ajax_data = $this->input->post(); //Datos que vienen por POST
        $lista_etapas = $this->Proyecto_model->obtenerResumen($ajax_data);
        $lista_imprevistos = $this->Proyecto_model->obtenerImprevisto($ajax_data);
        $lista_instalacion = $this->Proyecto_model->obtenerInstalacion($ajax_data);
        $lista_supervision = $this->Proyecto_model->obtenerSupervision($ajax_data);
        $lista_porcentaje = $this->Proyecto_model->obtenerPorcentaje($ajax_data);
        $lista_fletetraslado = $this->Proyecto_model->obtenerFleteTraslado($ajax_data);
        $lista_gastoGeneral = $this->Proyecto_model->totalGastoGeneral($ajax_data);
        $lista_comisiones = $this->Proyecto_model->totalComisiones($ajax_data);
        $lista_ingenieria = $this->Proyecto_model->totalIngenieria($ajax_data);
        $lista_utilidades = $this->Proyecto_model->totalUtilidades($ajax_data);
        $response ="<TABLE BORDER class='table table-bordered'>";
        $subtotal = 0;
        foreach($lista_etapas as $row){
            $subtotal = intval($row->SubTotal);
            $response .="<TR>";
            $response .="<TH>Subtotal por partida</TH>";
            $response .="<TD>$".$subtotal."</TD>";
        }
            $response .="</TR>";
        $imprevisto = 0;
        foreach($lista_imprevistos as $row){
            $imprevisto = $subtotal * (float)$row->imprevisto;
            $response .="<TR>";
            $response .="<TH>Imprevistos</TH>";
            $response .="<TD>$".$imprevisto."</TD>";
            $response .="</TR>";
        }

        $costomaterial = intval($subtotal)+intval($imprevisto);
            $response .="<TR>";
            $response .="<TH>Costo materiales</TH>";
            $response .="<TD>$".$costomaterial."</TD>";
            $response .="</TR>";

        $instalacion=0;
        foreach($lista_instalacion as $row){
            $instalacion = $row->instalacion;
            $response .="<TR>";
            $response .="<TH>Instalación</TH>";
            $response .="<TD>$".$row->instalacion."</TD>";
            $response .="</TR>";
        }
        $supervision=0;
        foreach($lista_supervision as $row){
            $supervision = $row->supervision;
            $response .="<TR>";
            $response .="<TH>Supervisión</TH>";
            $response .="<TD>$".$row->supervision."</TD>";
            $response .="</TR>";
        }
        //echo"Costo material: ".$costomaterial."\n";
        //echo"Instalacion: ".$instalacion."\n";
        //echo"Supervision: ".$supervision."\n";

        $valorEquipamiento = intval($costomaterial)+intval($instalacion)+intval($supervision);

            $response .="<TR>";
            $response .="<TH>Valor equipamiento instalado</TH>";
            $response .="<TD>$".$valorEquipamiento."</TD>";
            $response .="</TR>";
        
        $valor=0;
        foreach($lista_fletetraslado as $row){
            $valor=intval($row->valor);
            $response .="<TR>";
            $response .="<TH>Flete traslado </TH>";
            $response .="<TD>$".$row->valor."</TD>";
            $response .="</TR>";
        }
            $response .="<TR>";
            $response .="<TH>Gastos generales </TH>";
            $response .="<TD>$".$lista_gastoGeneral."</TD>";
            $response .="</TR>";
        $comisiones=0;
        
            $response .="<TR>";
            $response .="<TH>Comisiones </TH>";
            $response .="<TD>$".$lista_comisiones."</TD>";
            $response .="</TR>";
        $ingenieria=0;
        
           
            $response .="<TR>";
            $response .="<TH>Ingeniería </TH>";
            $response .="<TD>$".$lista_ingenieria."</TD>";
            $response .="</TR>";
            
        
        $utilidades=0;
            
            $response .="<TR>";
            $response .="<TH>Utilidades </TH>";
            $response .="<TD>$".$lista_utilidades."</TD>";
            $response .="</TR>";
            
    
        $Preciosugerido = intval($valorEquipamiento)+intval($valor)+(float)$lista_gastoGeneral+(float)$lista_comisiones+(float)$lista_ingenieria+(float)$lista_utilidades;  
            $response .="<TR>";
            $response .="<TH>Precio sugerido venta </TH>";
            $response .="<TD>$".$Preciosugerido."</TD>";
            $response .="</TR>";
        
        $response .="</TABLE>";
		$data = array('response' => 'success', 'detalle' => $response);


		echo json_encode($data);
   

}
public function obtenerPrecioVenta(){

    $PreciosugeridoVenta = $this->Proyecto_model->obtenerPrecioSugeridoProyecto();

    $response ="<TABLE BORDER class='table table-bordered'>";
    $response .="<TR>";
    $response .="<TD class='bg-info'><h5>Precio sugerido Proyecto</h5></TD>"; 
    $response .="</TR>";


    foreach($PreciosugeridoVenta as $row){
    $response .="<TR>";
    $response .="<TD scope='col'>$".$row->PrecioSugerido."</TD>"; 
    $response .="</TR>";
    }
    $response .="</TABLE>";
    
    $data = array('response' => 'success', 'detalle' => $response);

    echo json_encode($data);
}

public function obtenerTrabajoDiario(){

    $ajax_data = $this->input->post();
    $codigo = $ajax_data['codigo'];
    $lista_trabajo = $this->Proyecto_model->obtenerTrabajoDiario($codigo);
    
    $response ="<table id='example1' class='table table-bordered table-striped'>";
    $response .=" <thead>";
    $response .=" <tr>"; 
    $response .="<th>ID</th>";
    $response .="<th>Fecha</th>";
    $response .=" <th>Detalle</th>";
    $response .="<th>Codigo de servicio</th>"; 
    $response .="<th>Personal</th>";
    $response .="<th>Registro fotográfico</th>";
    $response .="</tr>";
    $response .="</thead>";
    $response .="<tbody>";

    foreach($lista_trabajo as $row){
    $response .="<tr>";
    $response .="<td>".$row->id."</td>";
    $response .="<td>".$row->fecha_inicio."</td>";
    $response .="<td>".$row->detalle."</td>";
    $response .="<td>".$row->codigoservicio."</td>";
    $response .="<td> <button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#personal' onclick='generarTablaPersonalQueAsiste(this)'><i class='far fa-eye'></i></button></td>";
    $response .="<td> <button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#modal-detalle-orden' onclick=''><i class='far fa-eye'></i></button></td>";
    $response .=" </tr>";
    }
    $response .="</tfoot>";
    $response .=" </table>";


    $data = array('response' => 'success', 'detalle' => $response);

    echo json_encode($data);

}

public function obtenerRegistroMaterial(){

    $ajax_data = $this->input->post();
    $codigo = $ajax_data['codigo'];

    $lista_monto = $this->Proyecto_model->MostrarMaterialesProyecto($codigo);
    $lista_factura = $this->Proyecto_model-> obtenerTotalFactura($codigo);
    $lista_presupuesto = $this->Proyecto_model->obtenerTotalPresupuesto($codigo);
    $lista_balance = $this->Proyecto_model->TotalBalance($codigo);

    $response ="<table id='example1' class='table table-bordered table-striped'>";
    $response .=" <thead>";
    $response .=" <tr>"; 
    $response .="<th>ID</th>";
    $response .=" <th>Monto</th>";
    $response .="<th>Detalle</th>"; 
    $response .=" <th>Presupuesto</th>";
    $response .="<th>Balance por item</th>";
    $response .="<th>Facturas</th>";
    $response .="</tr>";
    $response .="</thead>";
    $response .="<tbody>";
    $balance=0;
    foreach($lista_monto as $row){
    $balance = intval($row->monto)-intval($row->presupuesto);
        $response .="<tr>";
        $response .="<td>".$row->id."</td>";
        $response .="<td>$".$row->monto."</td>";
        $response .="<td>".$row->detalle."</td>";
        $response .="<td>$".$row->presupuesto."</td>";
        $response .="<td>$".$balance."</td>";
        $response .="<td> <button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#MostrarFacturas' onclick='setTablaFacturas(this)'><i class='fas fa-download'></i></button></td>";
        $response .=" </tr>";
    }
    $response .="</tfoot>";
    $response .="<tr>";
    $response .="<th>Total: </th>";
    $factura=0;
    foreach($lista_factura as $row){
        $factura= $row->totalMonto;
         $response .="<th>$".$factura."</th>";
    }
    $response .="<th></th>";
    $presupuesto=0;
    foreach($lista_presupuesto as $row){
        $presupuesto=$row->totalpresupuesto;
        $response .="<th>$ ".$presupuesto."</th>";
    }
    $response .="<th>$ ".$lista_balance."</th>";
    $response .=" </tr>";
    $response .="</tfoot>";
    $response .=" </table>";

    $data = array('response' => 'success', 'detalle' => $response);

    echo json_encode($data);

}

public function obtenerManoDeObra(){

    //$PreciosugeridoVenta = $this->Proyecto_model->obtenerPrecioSugeridoProyecto();
    $ajax_data = $this->input->post();
    $codigo = $ajax_data['codigo'];
    $lista_monto = $this->Proyecto_model->MostrarTotalManoObra($codigo);
    
    $response ="<table id='example1' class='table table-bordered table-striped'>";
    $response .=" <thead>";
    $response .=" <tr>"; 
    $response .="<th>Rut</th>";
    $response .="<th>Nombre Completo</th>";
    $response .=" <th>Total horas</th>";
    $response .="<th>Hora trabajador</th>"; 
    $response .="<th>Costo total</th>";
    $response .="</tr>";
    $response .="</thead>";
    $response .="<tbody>";
    $valorhora = 20000;
    $totalhora = 0;
    $totalproyecto = 0;
    foreach($lista_monto as $row){
        $totalhora = intval($row->horastrabajadas) * $valorhora;
        $response .="<tr>";
        $response .="<td>".$row->rut."</td>";
        $response .="<td>".$row->nombrecompleto."</td>";
        $response .="<td>".$row->horastrabajadas."</td>";
        $response .="<td>".$valorhora."</td>";
        $response .="<td>".$totalhora."</td>";
        $response .="</tr>";
        $totalproyecto += $totalhora;
    }
    $response .="<tr>";
    $response .="<th></th>";
    $response .="<th></th>";
    $response .="<th></th>";
    $response .="<th>Total: </th>";
    $response .="<th>".$totalproyecto."</th>";
    $response .=" </tr>";
    $response .="</tfoot>";
    $response .=" </table>";


    $data = array('response' => 'success', 'detalle' => $response);

    echo json_encode($data);

    
}

public function obtenerPersonalQueAsiste(){
    $ajax_data = $this->input->post();
    $codigo = $ajax_data['codigo'];
    $lista_personal = $this->Proyecto_model->MostrarPersonal($codigo);
    
    $response ="<table id='example1' class='table table-bordered table-striped'>";
    $response .=" <thead>";
    $response .=" <tr>"; 
    $response .="<th>Personal</th>";
    $response .="<th>Horas</th>";
    $response .="</tr>";
    $response .="</thead>";
    $response .="<tbody>";
    foreach($lista_personal as $row){
    $response .="<tr>";
    $response .="<td>".$row->nombre."</td>";
    $response .="<td>".$row->hora."</td>";
    $response .=" </tr>";
    }
    $response .="</tfoot>";
    $response .=" </table>";


    $data = array('response' => 'success', 'detalle' => $response);

    echo json_encode($data);
    
}
public function obtenerFacturas(){
    $ajax_data = $this->input->post();
    $codigo = $ajax_data['idtrabajodiario'];
    
    $lista_documento = $this->Proyecto_model->MostrarDocumento($codigo);
    
    $response ="<table id='' class='table table-bordered table-striped'>";
    $response .=" <thead>";
    $response .=" <tr>"; 
    $response .="<th>Nro Factura</th>";
    $response .="<th>Nombre Factura</th>";
    $response .="<th>Descargar</th>";
    $response .="</tr>";
    $response .="</thead>";
    $response .="<tbody>";
    foreach($lista_documento as $row){
    $response .="<tr>";
    $response .="<td>".$row->id."</td>";
    $response .="<td>".$row->documento."</td>";
    $response .="<td><button class='btn btn-primary btn-sm' onclick='descargarFactura(this)'><i class='fas fa-download'></i></button></td>";
    $response .=" </tr>";
    }
    $response .="</tfoot>";
    $response .=" </table>";


    $data = array('response' => 'success', 'detalle' => $response);

    echo json_encode($data);
    
}
public function descargaFactura($id){
    if(!empty($id)){
        //load download helper
        $this->load->helper('download');
        
        //get file info from database
        $fileInfo = $this->Proyecto_model->getRows(array('id' => $id));
        
        //file path
        $file ='ArchivosSubidos/'.$fileInfo['ubicaciondocumento'];
    
        
        //download file from directory
        force_download($file, NULL);
    }
}
}