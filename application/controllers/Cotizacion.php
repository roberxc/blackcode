<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cotizacion extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        //$this->load->model('FacturaModel');
    }

    public function index(){
        $data['activomenu'] = 15;
        $data['activo'] = 19;
        $this->load->view('layout/nav');
        $this->load->view('menu/menu_supremo', $data);
        $this->load->view('Administracion/Cotizacion');
        $this->load->view('layout/footer');
    }

    
}

