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
        $data ['activo'] = 4;
        $this->load->view('layout/nav');
        $this->load->view('menu/menu_proyecto',$data);
		$this->load->view('Proyecto/ProyectoE');
		$this->load->view('layout/footer');
    }
    public function Planilla_Proyecto($idproyecto)
    {
        $data ['activo'] = 4;
        $data ['codigo'] = $idproyecto;
        //$data['Listado_materiales'] = $this->Proyecto_model->obtenrmateriales();
        $this->load->view('menu/menu_proyecto',$data);
		$this->load->view('Proyecto/PlanillasPro',$data);
		$this->load->view('layout/footer');
    }
    public function Evaluacion_proyecto()
    {
        // $data[ es lo que lleva en la vista foreach($partidas as $i)]combobox
        $data['partidas'] = $this->Proyecto_model->Mostrarpartidas();
        
        $data ['activo'] = 4;
        //$this->load->view('layout/nav');
        $this->load->view('menu/menu_proyecto',$data);
		$this->load->view('Proyecto/Evaluacion');
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
            $data = array('response' => "error", 'message' => $res);
           
        }else{
            $data = array('response' => "success", 'message' => "Guardado exitosamente!");
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
        $response ="<TABLE BORDER class='table table-bordered'>";
        $subtotal = 0;
        foreach($lista_etapas as $row){
            $subtotal = intval($row->SubTotal);
            $response .="<TR>";
            $response .="<TH>Subtotal por partida</TH>";
            $response .="<TD>".$subtotal."</TD>";
        }
            $response .="</TR>";
        $imprevisto = 0;
        foreach($lista_imprevistos as $row){
            $imprevisto = $subtotal * (float)$row->imprevisto;
            $response .="<TR>";
            $response .="<TH>Imprevistos</TH>";
            $response .="<TD>".$imprevisto."</TD>";
            $response .="</TR>";
        }

        $costomaterial = intval($subtotal)+intval($imprevisto);
            $response .="<TR>";
            $response .="<TH>Costo materiales</TH>";
            $response .="<TD>".$costomaterial."</TD>";
            $response .="</TR>";

        $instalacion=0;
        foreach($lista_instalacion as $row){
            $response .="<TR>";
            $response .="<TH>Instalación</TH>";
            $response .="<TD>".$row->instalacion."</TD>";
            $response .="</TR>";
        }
        $supervision=0;
        foreach($lista_supervision as $row){
            $response .="<TR>";
            $response .="<TH>Supervisión</TH>";
            $response .="<TD>".$row->supervision."</TD>";
            $response .="</TR>";
        }
        $valorEquipamiento = intval($costomaterial)+intval($instalacion)+intval($supervision);
            $response .="<TR>";
            $response .="<TH>Valor equipamiento instalado</TH>";
            $response .="<TD>".$valorEquipamiento."</TD>";
            $response .="</TR>";
        
        $valor=0;
        foreach($lista_fletetraslado as $row){
            $response .="<TR>";
            $response .="<TH>Flete traslado </TH>";
            $response .="<TD>".$row->valor."</TD>";
            $response .="</TR>";
        }
        $generales=0;
        $comision=0;
        $ingenieria=0;
        $utilidades=0;

        foreach($lista_porcentaje as $row){
            $generales=(float)$row ->gasto_generales*100;
            $response .="<TR>";
            $response .="<TH>Gastos generales </TH>";
            $response .="<TD>".$generales."%</TD>";
            $response .="</TR>";

            $comision=(float)$row ->comisiones*100;
            $response .="<TR>";
            $response .="<TH>Comisiones </TH>";
            $response .="<TD>".$comision."%</TD>";
            $response .="</TR>";

            $ingenieria=(float)$row ->ingenieria*100;
            $response .="<TR>";
            $response .="<TH>Ingeniería </TH>";
            $response .="<TD>".$ingenieria."%</TD>";
            $response .="</TR>";

            $utilidades=(float)$row ->utilidades*100;
            $response .="<TR>";
            $response .="<TH>Utilidades </TH>";
            $response .="<TD>".$utilidades."%</TD>";
            $response .="</TR>";
        }
        $Preciosugerido = intval($valorEquipamiento)+intval($valor)+intval($generales)+intval($comision)+intval($ingenieria)+intval($utilidades);  
            $response .="<TR>";
            $response .="<TH>Precio sugerido venta </TH>";
            $response .="<TD>".$Preciosugerido."</TD>";
            $response .="</TR>";
        
        $response .="</TABLE>";
		$data = array('response' => 'success', 'detalle' => $response);


		echo json_encode($data);
   

}

   


}