<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Proyecto extends CI_Controller
{
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
}
