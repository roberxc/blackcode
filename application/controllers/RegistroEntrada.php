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
        $this->load->helper(array('notificacion','url'));
	}

    public function index()
    {
		//$data ['activo'] = 1;
		$data['categorias'] = $this->Bodega->verCategorias();
		$data['usuarios'] = $this->Bodega->verPersonal();
        $data['centrocosto'] = $this->Bodega->verCentroCostos();
        $data['tipobodega'] = $this->Bodega->verBodega();
        $data['material'] = $this->Bodega->verMateriales();
        $data ['activo'] = 5;
        
        setNotificacionesBodega($this->Bodega);
        $stock = $this->Bodega->getStockMateriales();
        $contador_materiales = 0;
        $flag_stock = false;
        if($stock){
            foreach($stock as $row){
                if($row->stock <=10){
                    $flag_stock = true;
                    $contador_materiales = $contador_materiales + 1;
                }
            }
        }
        $data ['total_materiales_no_stock'] = $contador_materiales;
        $data ['flag_stock'] = $flag_stock;
        $this->load->view('menu/menu_bodeguero',$data);
		$this->load->view('Bodega/Entrada', $data);
		$this->load->view('layout/footer');
    }
    //REGISTRAR EN MODEL DE PRODUCTO
    
    public function registrarproductoentrada(){
        if($_POST){
            $this->Bodega->insertarEntradaProducto($_POST);
            $ruta = base_url('RegistroEntrada');
            echo "<script>window.location = '{$ruta}'</script>";
		}
        
    }
    
    //REGISTRAR EN MODEL AGREGAR STOCK
    public function agregarstockaproducto(){
        if($_POST){
            $this->Bodega->actualizarStockProducto($_POST);
            $ruta = base_url('RegistroEntrada');
            echo "<script>window.location = '{$ruta}'</script>";
        }
    }
    
    //REGISTRAR EN MODEL CATEGORIA
	public function registrarCategoria(){
		if($_POST){
			$this->Bodega->registrarCateg($_POST);
            $ruta = base_url('RegistroEntrada');
            echo "<script>window.location = '{$ruta}'</script>";
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
            $sub_array[]    = $value->id_entrada;
            $sub_array[]    = $value->nombrematerial;
            $sub_array[]    = $value->id_material;
            $sub_array[]    = $value->nombretipomaterial;
            $sub_array[]    = $value->nombreproyecto;
            $sub_array[]    = $value->fechaentrada;
			$sub_array[]    = $value->cantidadingresada;
            $sub_array[]	= $value->nombretipobodega;
            $sub_array[]	= $value->detalle;
			//$sub_array[]	= '<a href="#" class="fas fa-eye" style="font-size: 20px;" data-toggle="modal" data-target="#myModalVerMas" onclick="vermas('.$value['id_material'].');" ></a>';
           // <a href="#" class="fas fa-edit" style="font-size: 20px;"></a> EN CASO DE QUERER EDITAR LOS REGISTROS
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
    
    /*
    public function fetch_vermas()
    {
        $this->load->model('Bodega', 'bodega');

        $fetch_data = $this->bodega->make_model_vermas($this->input->get('id'))[0];
        echo json_encode($fetch_data);
    }
	*/
}