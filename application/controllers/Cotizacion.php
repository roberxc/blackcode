<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cotizacion extends CI_Controller
{

    public function __construct()
    {
        parent::__construct(); // you have missed this line.
        //$this->load->model('FacturaModel');
        $this->load->model('CotizacionesModel');
        $this->load->model('ProveedoresModel');
    }

    public function index(){
        $data['activomenu'] = 15;
        $data['activo'] = 19;
        $data['lista_proveedores'] = $this->ProveedoresModel->listaProveedores();
        $this->load->view('layout/nav');
        $this->load->view('menu/menu_supremo', $data);
        $this->load->view('Administracion/Cotizacion');
        $this->load->view('layout/footer');
    }

    public function obtenerCotizaciones()
    {
        $fetch_data = $this->CotizacionesModel->make_datatables_cotizaciones();
        $data = array();
        foreach ($fetch_data as $value){
            $sub_array = array();
            $sub_array[] = '<input type="text" value='.$value->id_cotizacion.' class="name-file" disabled/>';
            $sub_array[] = $value->nombre;
            $sub_array[] = $value->fecha;
            $sub_array[] = '<a href="#" class="fas fa-eye" id="detalle_asistencia" data-toggle="modal"data-target="#modal-detalle-asistencia">';
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]) ,
            "recordsTotal" => $this->CotizacionesModel->get_all_data_cotizaciones(),
            "recordsFiltered" => $this->CotizacionesModel->get_filtered_data_cotizaciones(),
            "data" => $data
        );
        echo json_encode($output);

    }

    
}

