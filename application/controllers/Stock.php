<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Stock extends CI_Controller
{


    public function index()
    {
        $data ['activo'] = 4;
        $this->load->view('layout/nav');
        $this->load->view('menu/menu_bodeguero',$data);
		$this->load->view('Bodega/Stock');
		$this->load->view('layout/footer');
    }

    public function stockAdministracion()
    {
        $data ['activo'] = 9;
		$this->load->view('layout/nav');
		$this->load->view('menu/menu_supremo',$data);
		$this->load->view('Bodega/Stock');
		$this->load->view('layout/footer');
    }

    public function stockTrabajador()
    {
        $data ['activo'] = 9;
        $this->load->view('layout/nav');
		$this->load->view('menu/menu_trabajador',$data);
		$this->load->view('Bodega/Stock');
		$this->load->view('layout/footer');
    }

    
    //MOSTRAR TODOS LOS DATOS PRINCIPAL

   public function fetch_data()
   {
       $this->load->model('Bodega', 'bodega');

       $fetch_data = $this->bodega->make_datatables_stock();
       $data = array();
       foreach ($fetch_data as $value) {

           $sub_array      = array();
           $sub_array[]    = $value->ID_Material;
           $sub_array[]    = $value->NombreMaterial;
           $sub_array[]    = $value->NombreTipoMaterial;
           $sub_array[]    = $value->Stock;
           $sub_array[]	   = $value->NombreTipoBodega;
           $sub_array[]	= '<a href="#" class="fas fa-eye" style="font-size: 20px;" data-toggle="modal" data-target="#myModalVerMas" >';
          
           $data[]         = $sub_array;
       }
       $output = array(
           "draw"                =>     intval($_POST["draw"]),
           "recordsTotal"        =>     $this->bodega->get_all_data_stock(),
           "recordsFiltered"     =>     $this->bodega->get_filtered_data_stock(),
           "data"                =>     $data
       );
       echo json_encode($output);
       
   }
}
