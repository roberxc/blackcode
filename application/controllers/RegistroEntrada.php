<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class RegistroEntrada extends CI_Controller
{

    function __construct(){
		parent::__construct();
		$this->load->model('Bodega');
	}

    public function index()
    {
		$data ['activo'] = 1;
		$data['categorias'] = $this->Bodega->verCategorias();
		$data['usuarios'] = $this->Bodega->verPersonal();
        $data['centrocosto'] = $this->Bodega->verCentroCostos();
        $data['tipobodega'] = $this->Bodega->verBodega();
        $data['material'] = $this->Bodega->verMateriales();
        $data ['activo'] = 2;
        $this->load->view('layout/nav');
        $this->load->view('menu/menu_bodeguero',$data);
		$this->load->view('Bodega/Entrada', $data);
		$this->load->view('layout/footer');
    }
    //REGISTRAR EN MODEL DE PRODUCTO
    
    public function registrarproductoentrada(){
        if($_POST){
            if($this->Bodega->insertarEntradaProducto($_POST))
            $this->Bodega->insertarMaterial($_POST);   
		}
    }
    
    //REGISTRAR EN MODEL AGREGAR STOCK
    public function agregarstockaproducto(){
        if($_POST){
            $this->Bodega->agregarStockProducto($_POST);
        }
    }
    
    //REGISTRAR EN MODEL CATEGORIA
	public function registrarCategoria(){
		if($_POST){
			$this->Bodega->registrarCateg($_POST);
		}
	}

   //MOSTRAR TODOS LOS DATOS PRINCIPAL

   public function fetch_data()
    {
        $this->load->model('Bodega', 'bodega');

        $fetch_data = $this->bodega->make_datatables_entrada();
        $data = array();
        foreach ($fetch_data as $value) {

            $sub_array      = array();
            $sub_array[]    = $value->ID_Material;
            $sub_array[]    = $value->NombreMaterial;
            $sub_array[]    = $value->NombreTipoMaterial;
            $sub_array[]    = $value->NombreProyecto;
            $sub_array[]    = $value->FechaEntrada;
			$sub_array[]    = $value->CantidadIngresada;
			$sub_array[]	= $value->NombreTipoBodega;
			$sub_array[]	= '<a href="#" class="fas fa-eye" style="font-size: 20px;" data-toggle="modal" data-target="#myModalVerMas" onclick="vermas('.$value->ID_Material.');" ></a> <a href="#" class="fas fa-edit" style="font-size: 20px;"></a>';
           
            $data[]         = $sub_array;
        }
        $output = array(
			"draw"                =>     intval($_POST["draw"]),
            "recordsTotal"        =>     $this->bodega->get_all_data_entrada(),
            "recordsFiltered"     =>     $this->bodega->get_filtered_data_entrada(),
            "data"                =>     $data
        );
		echo json_encode($output);
		
    }
    

    public function fetch_vermas()
    {
        $this->load->model('Bodega', 'bodega');

        $fetch_data = $this->bodega->make_model_vermas($this->input->get('id'))[0];
        echo json_encode($fetch_data);
    }
	
}