<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class RegistroSalida extends CI_Controller
{

    function __construct(){
		parent::__construct();
		$this->load->model('Bodega');
	}

    public function index()
    {
        $data ['activo'] = 3;
        $data['categorias'] = $this->Bodega->verCategorias();
		$data['usuarios'] = $this->Bodega->verPersonal();
        $data['centrocosto'] = $this->Bodega->verCentroCostos();
        $data['tipobodega'] = $this->Bodega->verBodega();
        $data['material'] = $this->Bodega->verMaterialesDisponiblesBodega();
        $this->load->view('layout/nav');
        $this->load->view('menu/menu_bodeguero',$data);
		$this->load->view('Bodega/Salida');
		$this->load->view('layout/footer');
    }


    //REGISTRAR EN MODEL DE PRODUCTO Y CATEGORIA
    
    public function registrarproductosalida(){
        if($_POST){
			$this->Bodega->insertarSalidaProducto($_POST);
		}
	}
	
    
    //MOSTRAR TODOS LOS DATOS PRINCIPAL SALIDA

   public function fetch_data()
   {
       $this->load->model('Bodega', 'bodega');

       $fetch_data = $this->bodega->make_datatables_salida();
       $data = array();
       foreach ($fetch_data as $value) {

           $sub_array      = array();
           $sub_array[]    = $value->id_salida;
           $sub_array[]    = $value->nombrematerial;
           $sub_array[]    = $value->id_material;
           $sub_array[]    = $value->nombretipomaterial;
           $sub_array[]    = $value->nombreproyecto;
           $sub_array[]    = $value->fechasalida;
           $sub_array[]    = $value->cantidadsalida;
           $sub_array[]	=   $value->nombretipobodega;
           $sub_array[]	= '<a href="#" class="fas fa-eye" style="font-size: 20px;" data-toggle="modal" data-target="#myModalVerMas" onclick="vermas('.$value->id_material.');" ></a>';
            //<a href="#" class="fas fa-edit" style="font-size: 20px;"></a> EN CASO DE QUERER EDITAR
           $data[]         = $sub_array;
       }
       $output = array(
           "draw"                =>     intval($_POST["draw"]),
           "recordsTotal"        =>     $this->bodega->get_all_data_salida(),
           "recordsFiltered"     =>     $this->bodega->get_filtered_data_salida(),
           "data"                =>     $data
       );
       echo json_encode($output);
       
   }
}