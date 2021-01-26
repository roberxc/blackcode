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
           $sub_array[]    = $value->id_material;
           $sub_array[]    = $value->nombrematerial;
           $sub_array[]    = $value->nombretipomaterial;
           $sub_array[]    = $value->stock;
           $sub_array[]	   = $value->nombretipobodega;
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
