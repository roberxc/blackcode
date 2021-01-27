<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Factura extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        $this->load->model('OrdenesModel');
    }

    public function index(){
        $data['lista_ordenes'] = $this->OrdenesModel->listaOrdenes();
        $data['activomenu'] = 15;
        $data['activo'] = 18;
        $this->load->view('layout/nav');
        $this->load->view('menu/menu_supremo', $data);
        $this->load->view('Administracion/Facturas',$data);
        $this->load->view('layout/footer');
    }

    
}

