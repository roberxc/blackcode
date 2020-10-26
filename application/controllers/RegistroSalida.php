<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class RegistroSalida extends CI_Controller
{


    public function index()
    {
        //$data['include_js'] = array("historial_reajustar_stock.js");  #este te indica que js esta usando el modulo* 
        $data ['activo'] = 2;
        $this->load->view('menu/menu_bodeguero',$data);
        //$this->load->view('Bodega/Superior/Header');
		$this->load->view('Bodega/Salida');
		$this->load->view('layout/footer');
    }
}