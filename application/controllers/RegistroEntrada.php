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
		//$this->load->helper(array('form', 'url'));
	}

    public function index()
    {
        //$data['include_js'] = array("entrada_producto.js");  #este te indica que js esta usando el modulo* 
		$data ['activo'] = 1;
		$data['categorias'] = $this->Bodega->verCategorias();
		$data['usuarios'] = $this->Bodega->verPersonal();
		$data['centrocosto'] = $this->Bodega->verCentroCostos();
        $this->load->view('menu/menu_bodeguero',$data);
		$this->load->view('Bodega/Entrada', $data);
		$this->load->view('layout/footer');
    }
	
    public function registrarproductoentrada(){
        if($_POST){
			$this->Bodega->registrarEntradaProducto($_POST);
		}
	}
	
	public function registrarCategoria(){
		if($_POST){
			$this->Bodega->registrarCateg($_POST);
		}
	}



    
}