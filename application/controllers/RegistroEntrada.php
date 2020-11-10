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
		$data ['activo'] = 1;
		$data['categorias'] = $this->Bodega->verCategorias();
		$data['usuarios'] = $this->Bodega->verPersonal();
		$data['centrocosto'] = $this->Bodega->verCentroCostos();
        $data ['activo'] = 2;
        $this->load->view('layout/nav');
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