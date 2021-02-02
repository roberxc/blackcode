<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRCombustible extends CI_Controller {

	public function __construct(){
		parent::__construct();// you have missed this line.
		$this->load->model('Combustible');
	 }

	public function index(){
		$set_data = $this->session->all_userdata();
		if (isset($set_data['id_tipousuario']) && $set_data['id_tipousuario'] == 1) {
			$data ['activomenu'] = 20;
			$data ['activo'] = 95;
			$this->load->view('layout/nav');
			$this->load->view('menu/menu_supremo',$data);
			$this->load->view('Administracion/VRCombustible');
			$this->load->view('layout/footer');
		}
	}


	public function fetch_data()
    {
        $this->load->model('Combustible', 'combustible');

        $fetch_data = $this->combustible->make_datatables_cvehiculo();
        $data = array();
        foreach ($fetch_data as $value) {

            $sub_array      = array();
            $sub_array[]    = $value->id_combustible;
            $sub_array[]    = $value->fecha;
            $sub_array[]    = $value->patente;
            $sub_array[]    = $value->conductor;
            $sub_array[]    = $value->estacion;
            $sub_array[]    = $value->litros;
			$sub_array[]    = $value->valor;
           
			//$sub_array[]	= '<a href="#" class="fas fa-eye" style="font-size: 20px;" data-toggle="modal" data-target="#myModalVerMas" onclick="vermas('.$value['id_material'].');" ></a>';
           // <a href="#" class="fas fa-edit" style="font-size: 20px;"></a> EN CASO DE QUERER EDITAR LOS REGISTROS
            $data[]         = $sub_array;
        }
        $output = array(
			"draw"                =>     intval($_POST["draw"]),
            "recordsTotal"        =>     $this->combustible->get_all_data_cvehiculo(),
            "recordsFiltered"     =>     $this->combustible->get_filtered_data_cvehiculo(),
            "data"                =>     $data
        );
		echo json_encode($output);
		
    }
}