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
    public function Planilla_Proyecto()
    {
        $data ['activo'] = 4;
        $this->load->view('menu/menu_proyecto',$data);
		$this->load->view('Proyecto/PlanillasPro');
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
    
    //Mostrar estado de todos los proyectos en ejecución a la vista de todos los usuarios

   public function fetch_data()
   {
       $this->load->model('Proyecto_model', 'proyecto_modal');

       $fetch_data = $this->proyecto_modal->make_datatables_estado();
       $data = array();
       foreach ($fetch_data as $value) {

           $sub_array      = array();
           $sub_array[]    = $value->id_proyecto;
           $sub_array[]    = $value->nombreproyecto;
           $sub_array[]    = $value->montototal;
           $sub_array[]    = $value->Fecha_inicio;
           $sub_array[]	   = $value->Fecha_termino;
           $sub_array[]	= '<a href="#" class="fas fa-eye" style="font-size: 20px;" data-toggle="modal" data-target="#myModalVerMas" >';
           $sub_array[]	= '<a href="#" class="fas fa-eye" style="font-size: 20px;" data-toggle="modal" data-target="#myModalVerMas" >';
          
           $data[]         = $sub_array;
       }
       $output = array(
           "draw"                =>     intval($_POST["draw"]),
         //"recordsTotal"        =>     $this->proyecto_estado->get_all_data_estado(),
          // "recordsFiltered"     =>     $this->proyecto_estado->get_filtered_data_estado(),
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
        $res = $this->Proyecto_model->ingresarEvaluacion($ajax_data);
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

public function registroSupervision(){
		
    if ($this->input->is_ajax_request()) {
        $ajax_data = $this->input->post();
        $res = $this->Proyecto_model->ingresarEvaluacion($ajax_data);
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

   


}